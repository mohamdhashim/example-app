<template>
    <div id="nav">
        <sidebar />
        <router-view />
    </div>
</template>

<script>
import sidebar from "../components/SideBar.vue";
export default {
    components: { sidebar },
};
</script>
<style>
#nav {
    position: float;
    margin-left: 50px;
    padding-left: 100px;
}
</style>
