import Vue from 'vue';
import VueRouter from 'vue-router';

import AddressTable from './pages/AddressTable.vue';
import NewAddress from './pages/NewAddress.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'addresstable',
            component: AddressTable
        },
        {
            path: '/newaddress',
            name: 'newaddress',
            component: NewAddress
        },
    ]
});

export default router;