<template>
   <div id = "address" >
            <table class="table table-bordered" >
                <tr style="color: brown; font-weight: bold;">
                    <td>Apartment</td>
                    <td>Floor</td>
                    <td>Building</td>
                    <td>Street</td>
                    <td>Area Name</td>

                </tr>

                
                <tbody v-for = "address in Addresses" v-bind:key="address.id">
                    <tr style="font-size:small;">
                        <td>{{address.apartment}}</td>
                        <td>{{address.floor}}</td>
                        <td>{{address.building}}</td>
                        <td>{{address.street}}</td>
                        <td>{{address.area_name}}</td>

                    </tr>

                </tbody>
            </table>
        </div>
</template>

<script>
export default {
    data(){
        return{
            Addresses : "Addresses"
    }},
    mounted() {
        fetch('http://localhost/api/user_addresses/20')
        .then(res => res.json())
        .then(data => this.Addresses = data['addresses'])
        .catch(err => console.log(err.message))
    },
}
</script>