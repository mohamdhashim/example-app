import store from'./store/store.js';

Nova.booting((Vue, router, Store) => {
  Vue.component("input-label", require("./components/Input"));
  router.addRoutes([
    {
      name: 'new-address',
      path: '/new-address',
      component: require('./components/Tool'),
    },
  ]);
  Store.registerModule('store',store);
})
