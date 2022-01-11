<template>
    <div>
        <label>{{label_text}}</label>
        <input :value="modelValue" @input="$emit('update:modelValue',$event.target.value)">
    </div>
</template>


<script>
export default {
    name : 'inputlabel',
    props:{
        label_text : String,
        modelValue:String
    }
}

    // props: ['label_text', 'type'],

</script>

<style scoped>
div{
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