<template>
    <div>
        <form @submit.prevent="handleSubmit">
            <input-label label_text="Building" :method="update_building" />
            <input-label label_text="Apartment" :method="update_apartment" />
            <input-label label_text="Floor" :method="update_floor" />
            <input-label label_text="Street" :method="update_street" />

            <div style="color: red" v-if="validateEmail()">
                *E-mail not Valid
            </div>
            <input-label label_text="Email" :method="update_email" />

            <input-label label_text="Area name" :method="update_area_name" />
            <div class="submit">
                <button>POST Data</button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "NewAddress",
    data() {
        return {
            apartment: "",
            building: "",
            floor: "",
            street: "",
            area_name: "",
            email: "",
            message: "",
        };
    },

    methods: {
        //update methods used to retreive data from child components
        update_apartment(valueFromChild) {
            this.apartment = valueFromChild;
        },
        update_building(valueFromChild) {
            this.building = valueFromChild;
        },
        update_floor(valueFromChild) {
            this.floor = valueFromChild;
        },
        update_street(valueFromChild) {
            this.street = valueFromChild;
        },
        update_area_name(valueFromChild) {
            this.area_name = valueFromChild;
        },
        update_email(valueFromChild) {
            this.email = valueFromChild;
        },

        handleSubmit() {
            var address = {
                floor: this.floor,
                building: this.building,
                street: this.street,
                apartment: this.apartment,
                area: this.area_name,
                email: this.email,
            };

            axios
                .post("http://localhost/api/new_address", address)
                .then((data) => {
                    console.log("Message", data);
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        },

        validateEmail() {
            if (
                /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email)
            ) {
                return false;
            } else {
                return true;
            }
        },
    },
};
</script>
<style scoped>
input-label {
    margin-bottom: 15px;
    padding: 10px 100px;
    text-align: center;
    text-anchor: none;
}
form {
    display: inline-block;
}
</style>
