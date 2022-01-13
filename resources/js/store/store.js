import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        toggle: true,
        addresses: ["no", "city"],
    },
    mutations: {
        off_on(state, b) {
            state.toggle = b;
        },
        SetData(state, { addresses: addresses }) {
            state.addresses = addresses;
        },
    },
    actions: {
        UpdateData({ commit }) {
            axios
                .get("http://localhost/api/user_addresses/18")
                .then((data) =>
                    commit({
                        type: "SetData",
                        addresses: data["data"]["addresses"],
                    })
                )
                .catch((err) => console.log(err.message));
        },
    },
});

export default store;
