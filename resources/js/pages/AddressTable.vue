<template>
    <div id="address">
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
                    <td>{{ address.area_name }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import { mapState, mapActions, Store } from "vuex";

export default {
    computed: {
        ...mapState({
            Addresses: (state) => state.addresses,
        }),
    },
    methods: {
        ...mapActions(["updateData"]),
    },
    mounted() {
        this.updateData();
    },
};
</script>
<style scoped>
* {
    font-family: sans-serif;
}
#address {
    border-radius: 5px;
}
.address_table {
    margin: 1em;
    border-radius: 5px 5px;
    box-shadow: 2px 2px 6px 4px #d1d1d1;
    border-top-left-radius: 50px 20px;
}

.head {
    background-color: rgb(31, 158, 126);
    color: white;
    font-weight: bold;
    font-size: 20px;
    border-radius: 10px;
    border-top: solid;
    color: rgb(31, 158, 126);
}
.head td {
    background-color: rgb(31, 158, 126);
    color: white;
    font-weight: bold;
    font-size: 15px;
}
td {
    padding-left: 20px;
    padding-bottom: 15px;
    font-weight: bold;
    font-size: 10px;
}
tr:hover {
    color: rgb(31, 158, 126);
    background-color: rgba(241, 241, 241, 0.76);
}

tr {
    margin-bottom: 10px;
}
</style>
