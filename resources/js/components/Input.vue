<template>
    <div>
        <div class="error" v-if="!validateField(fieldName, text)">
            {{message}}
        </div>
        <label>{{ labelText }}</label>
        <input @input="getInput(text)" v-model="text" />
    </div>
</template>

<script>
import Validate from '../validation.js'

export default {
    name: "input-label",
    data() {
        return {
            text: "",
        };
    },
    props: {
        labelText: String,
        modelValue: String,
        getInput: { type: Function },
        fieldName: "",
        message: ""
    },
    methods:{
        validateField(fieldName,value){
            return Validate.validField(fieldName,value)
        }
    },
    mounted() {
        this.getInput(this.text);
    },
};
</script>

<style scoped>
div {
    margin-bottom: 8px;
}
input {
    width: 250px;
    text-align: start;
    border-radius: 7px;
    border: 1px solid rgba(88, 88, 88, 0.514);
}
label {
    color: #585d59;
    width: 130px;
}

.error {
  color: red;
  font-weight: 10px;
  font-size: 10px;
  margin-bottom: -5px;
  border: 1px solid red;
  width: fit-content;
  border-radius: 2px 5px;
  font-size: 7px;
  background-color: rgba(255, 0, 0, 0.096);
  padding-left: 1px;
  padding-right: 1px;
}
</style>
