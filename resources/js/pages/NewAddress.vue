<template>
  <div class="home">
    <form @submit.prevent= "handleSubmit" >
      <input placeholder="Building" class = "form-control" v-model="building">
      <input placeholder="Apartment" class = "form-control" v-model="apartment">
      <input placeholder="Floor" class = "form-control" v-model="floor">
      <input placeholder="Street" class = "form-control" v-model="street">
      <input placeholder="Email" class = "form-control" v-model="email">
      <input placeholder="Area name" class = "form-control" v-model="area_name">
      <div class = "submit">
        <button>POST Data</button>
      </div>
    </form>
    

    {{apartment}}
    {{building}}
  </div>
</template>

<script>

export default {
  name: 'NewAddress',
  data(){
    return {
      apartment: '',
      building: '',
      floor: '',
      street: '',
      area_name:'',
      email: ''
    }
  },methods: {
    handleSubmit(){
      console.log('form submitted')
      var address = {
          floor: this.floor,
          building: this.building,
          street: this.street,
          apartment: this.apartment,
          area: this.area_name,
          email: this.email
      }
      
      address = JSON.stringify(address);
      fetch('http://localhost/api/new_address', {
        method: 'POST', // or 'PUT'
        headers: {'Content-Type': 'application/json',}
        ,body:  address}).then(Response => Response.json())
        .then(data => {console.log('Message', data['messages']);})
        .catch((error) => {
        console.error('Error:', error);
        });

    }
  }
}
</script>

<style scoped>
  input{
    margin-bottom: 15px ;
    padding: 10px 100px;
    text-align:center;
    text-anchor: none;
  }
  form{
    display: inline-block;
  }
</style>