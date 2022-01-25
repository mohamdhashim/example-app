Nova.booting((Vue, router, Store) => {
  router.addRoutes([
    {
      name : 'AddressTable',
      path : '/addresstable',
      component : require('./components/Tool'),
    },
  ]);
})
