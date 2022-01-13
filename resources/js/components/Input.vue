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
  margin-bottom: 5px;
}
input {
  padding-left: 80px;
}
label {
  color: #43c45f;
  width: 130px;
}
</style>
