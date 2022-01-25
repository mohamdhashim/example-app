<template>
    <div>
        <div class="error" v-if="!validateField(fieldName, text)">
            {{ message }}

        </div>
        <label>{{ labelText }}</label>
        <div v-if="labelText == 'Email'">
            <p style="color: gray">{{ user.email }}</p>
        </div>
        <div v-else-if="fieldName == 'area_name'">
            <input list="areas" @input="searchArea(text); getInput(text)" v-model="text" />
            <datalist  id="areas">
                    <div  v-for="area in areas" v-bind:key="area.id">
                        <option>{{ area.name }}</option>
                    </div>
            </datalist>
        </div>
        <div v-else>
            <input @input="getInput(text)" v-model="text" />
        </div>
    </div>
</template>

<script>
import { mapState, mapActions, Store, mapMutations } from "vuex";
import Validate from "../validation.js";

export default {
    name: "input-label",
    computed: {
        ...mapState("store/", {
            user: state => state.user,
            areas: state=>state.searchArea
        })
    },
    data() {
        return {
            text: ""
        };
    },
    props: {
        labelText: String,
        modelValue: String,
        getInput: { type: Function },
        fieldName: "",
        message: ""
    },
    methods: {
        validateField(fieldName, value) {
            return Validate.validField(fieldName, value);
        },
        ...mapActions("store/", ["getMail","searchArea"])
    },
    mounted() {
        this.getInput(this.text);
    }
};
</script>
