<template>
    <div>
        <button @click="nextPage()"><==</button>
        {{ currPage }}
        <button @click="prePage()">==></button>
    </div>
</template>

<script>

export default {

    name: "pagination",
    props: {
        currPage : 0,
        nextPage: { type: Function },
        prePage: {type: Function},
    },

};
</script>
