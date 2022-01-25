const store = {
    namespaced: true,

    state: {
        toggle: true,
        addresses: ["no", "city"],
        apartment: "hello",
        building: "hello",
        floor: "hello",
        street: "",
        area_name: "",
        email: "",
        message: "",
        button: false,
        pagination: 1,
        perPage: 25,
        user: { email: "" },
        id: Nova.config.userId,
        searchArea: [{ 'name': "", 'id': "" }]
    },
    mutations: {
        setData(state, { addresses: addresses }) {
            state.addresses = addresses;
        },
        updateEmail(state, email) {
            state.email = email;
        },
        updateBuilding(state, building) {
            state.building = building;
        },
        updateFloor(state, floor) {
            state.floor = floor;
        },
        updateStreet(state, street) {
            state.street = street;
        },
        updateAreaName(state, areaName) {
            state.area_name = areaName;
        },
        updateApartment(state, apartment) {
            state.apartment = apartment;
        },
        updateMessage(state, value) {
            state.message = value;
            return value;
        },
        nextPage(state) {
            state.pagination++;
        },
        prePage(state) {
            state.pagination--;
        },
        udateMail(state, { user: user }) {
            state.user = user;
        },
        updateSearchArea(state, { areas: areas }) {
            state.searchArea = areas;
        }
    },
    actions: {
        updateData({ commit, state }) {
            var filter_encode = [
                { class: "App\\Nova\\Filters\\ByName", value: state.user.email }
            ];
            var filter_encode = JSON.stringify(filter_encode);
            var filter_encode = btoa(filter_encode);
            Nova.request()
                .get(
                    "http://localhost/nova-api/addresses?&page=" +
                        state.pagination +
                        "&filters=" +
                        filter_encode+
                        "&perPage="+
                        state.perPage
                )
                .then(data => {
                    //resourcs -> "fields" -> for [] => {attribute = value }
                    var result = [];
                    for (var index in data["data"]["resources"]) {
                        var field = {};
                        var resource = data["data"]["resources"][index];
                        for (var index2 in resource["fields"]) {
                            var attribute = resource["fields"][index2];
                            field[attribute["attribute"]] = attribute["value"];
                        }

                        result.push(field);
                    }
                    commit({
                        type: "setData",
                        addresses: result
                    });
                })
                .catch(err => console.log(err.message));
        },
        submitData({ commit, state }) {
            var area_id = ""
            var areas = state.searchArea;
            for(var index in areas){
                if(areas[index].name==state.area_name){
                    area_id = areas[index].id;
                    break;
                }
            }
            var address = {
                floor: state.floor,
                building: state.building,
                street: state.street,
                apartment: state.apartment,
                Area: area_id,
                user: state.id
            };
            Nova.request()
                .post(
                    "http://localhost/nova-api/addresses?editing=true&editMode=create",
                    address
                )
                .then(data => {
                    console.log(
                        "Message",
                        commit({
                            type: "updateMessage",
                            value: data.status
                        })
                    );
                })
                .catch(error => {
                    console.error(
                        "Error:",
                        commit({
                            type: "updateMessage",
                            value: error.response.status
                        })
                    );
                });
        },
        getMail({ commit, state }) {
            Nova.request()
                .get("http://localhost/nova-api/users/" + state.id)
                .then(data => {
                    //resourcs -> "fields" -> for [] => {attribute = value }
                    var resource = data["data"]["resource"];
                    var field = {};
                    for (var index2 in resource["fields"]) {
                        var attribute = resource["fields"][index2];
                        field[attribute["attribute"]] = attribute["value"];
                    }

                    commit({
                        type: "udateMail",
                        user: field
                    });
                })
                .catch(err => console.log(err.message));
        },
        searchArea({ commit, state },text) {
            Nova.request()
                .get("http://localhost/nova-api/search?search="+text)
                .then(data => {
                    //resourcs -> "fields" -> for [] => {attribute = value }
                    var resources = data["data"];
                    var areas = [];
                    for (var index in resources) {
                        var area = {};
                        if (resources[index]["resourceName"] == "areas") {
                            area["name"] = resources[index]["title"];
                            area["id"] = resources[index]["resourceId"];
                            areas.push(area);
                        }
                    }
                    commit({
                        type: "updateSearchArea",
                        areas: areas
                    });
                })
                .catch(err => console.log(err.message));
        }
    }
};

export default store;
