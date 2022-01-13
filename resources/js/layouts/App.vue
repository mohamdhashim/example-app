<template>
    <div id="nav">
        <sidebar />
        <p></p>
        <router-view />
    </div>
</template>

<script>
import sidebar from "../components/SideBar.vue";
export default {
    components: { sidebar },

    methods: {},
};
</script>
<style>
#nav {
    position: float;
    margin-left: 50px;
    padding-left: 100px;
}
</style>
