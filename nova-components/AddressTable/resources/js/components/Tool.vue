<template>
    <div id="address">
        <pagination />
        <button @click="updateData">filter</button>
        <table class="address_table">
            <tr class="head">
                <td>Apartment</td>
                <td>Floor</td>
                <td>Building</td>
                <td>Street</td>
                <td>Area Name</td>
            </tr>

            <tbody v-for="address in Addresses" v-bind:key="address.id">
                <tr style="font-size: small">
                    <td>{{ address.apartment }}</td>
                    <td>{{ address.floor }}</td>
                    <td>{{ address.building }}</td>
                    <td>{{ address.street }}</td>
                    <td>{{ address.Area }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { mapState, mapActions, Store, mapMutations } from "vuex";

export default {
    computed: {
        ...mapState('store/',{
            Addresses: (state) => state.addresses,
            pageNum: (state)=> state.pagination,
            user:(state)=> state.user
        }),

    },
    methods: {
        ...mapActions('store/',['updateData','getMail']),
    },
    created() {
        this.getMail();
        this.updateData();
    },
};
</script>

