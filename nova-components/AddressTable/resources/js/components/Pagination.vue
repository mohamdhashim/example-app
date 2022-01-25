<template>
    <div>
        <button @click="handleNextPage"><==</button>
        {{ pageNum }}
        <button @click="handlePrePage">==></button>
    </div>
</template>

<script>
import { mapState, mapActions, Store, mapMutations } from "vuex";

export default {
    
    name: "pagination",
    computed: {
        ...mapState("store/", {
            pageNum: state => state.pagination
        })
    },
    methods: {
        ...mapActions("store/", ["updateData", "getMail"]),

        ...mapMutations("store/", ["nextPage", "prePage"]),
        handleNextPage() {
            this.nextPage();
            this.updateData();
        },
        handlePrePage() {
            this.prePage();
            this.updateData();
        }
    }
};
</script>
