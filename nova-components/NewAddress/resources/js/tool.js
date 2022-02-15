Nova.booting((Vue, router, Store) => {
    router.addRoutes([
        {
            name: "new-address",
            path: "/new-address",
            component: require("./components/Tool"),
        },
    ]);
});
