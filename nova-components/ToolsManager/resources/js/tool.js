import store from "./store/store.js";

Nova.booting((Vue, router, Store) => {
    Vue.component("input-label", require("./components/Input.vue"));
    Vue.component("pagination", require("./components/Pagination.vue"));
    Vue.component("tools-manager", require("./components/Tool"));
    Store.registerModule("store", store);
});
