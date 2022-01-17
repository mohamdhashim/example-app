import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        toggle: true,
        addresses: ["no", "city"],
        apartment: "",
        building: "",
        floor: "",
        street: "",
        area_name: "",
        email: "",
        message: "",
        button: false,


    },
    mutations: {
        setData(state, { addresses: addresses }) {
            state.addresses = addresses;
        },
        updateEmail (state, email) {
            state.email = email
        },
        updateBuilding (state, building) {
            state.building = building
        },
        updateFloor (state, floor) {
            state.floor = floor
        },
        updateStreet (state, street) {
            state.street = street
        },
        updateAreaName (state, areaName) {
            state.area_name = areaName
        },
        updateApartment (state, apartment) {
            state.apartment = apartment
        },
        updateMessage(state,value){
            state.message = value
            console.log(state.message)    
            return value;
        }
    },
    actions: {
        updataData({ commit }) {
            axios
                .get("http://localhost/api/user_addresses/18")
                .then((data) =>
                    commit({
                        type: "setData",
                        addresses: data["data"]["addresses"],
                    })
                )
                .catch((err) => console.log(err.message));
        },
        submitData({commit}){
            var address = {
                floor: this.state.floor,
                building: this.state.building,
                street: this.state.street,
                apartment: this.state.apartment,
                area: this.state.area_name,
                email: this.state.email,
            };
            axios
                .post("http://localhost/api/new_address", address)
                .then((data) => {
                    console.log("Message", commit({
                        type: "updateMessage",
                        value: data.status}));
                })
                .catch((error) => {
                    console.error("Error:", commit({
                        type: "updateMessage",
                        value: error.response.status}));
                });
        }
    },
});

export default store;
