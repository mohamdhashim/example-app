<template>
    <div>
        <label>{{ label_text }}</label>
        <input @input="method(text)" v-model="text" />
    </div>
</template>

<script>
export default {
    name: "input-label",
    data() {
        return {
            text: "",
        };
    },
    props: {
        label_text: String,
        modelValue: String,
        method: { type: Function },
    },
    mounted() {
        this.method(this.text);
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
</style>
