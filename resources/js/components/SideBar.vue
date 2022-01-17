
<template>
  <aside class="sidebar">
    <font-awesome-icon icon="bars" class = "bars" />
    <ul class="nav_list">
      <router-link to="./newaddress"
        ><li onclick="this.style.backgroundColor = '#000'" class="link">
          New Address
        </li></router-link
      >
      <router-link to="./"><li>AddressTable</li></router-link>
    </ul>
  </aside>
</template>

<script>
export default {
  name: "sidebar",
};
</script>

<style scoped>
.sidebar {
  display: inline;
  color: rgb(0, 0, 0);
  background-color: rgb(15, 15, 15);
  float: left;
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  transition: 0.3s ease;
  flex-direction: column;
  height: 100%;
}
.nav_list {
  display: flex;
  flex-direction: column;
  list-style: none;
  align-items: center;
  justify-content: center;
}
.nav_list li {
  position: relative;
  top: 5px;
  right: 37px;
  padding-bottom: 5px;
  padding-top: 10px;
  color: white;
  justify-content: start;
  font-size: 10px;
  text-decoration: none;

}
.nav_list li::after {
  content: "";
  position: absolute;
  left: -10px;
  bottom: -3px;
  right: -37px;
  border-bottom: 0.5px solid rgba(255, 255, 255, 0.384);
  color: white;
}

li:hover {
  color: #ffffff94;
  text-decoration: none;
  }

.bars{
  color:rgb(0, 0, 0);
  position: absolute;
  left: 105px;
  top: 8px;
  
}
</style>