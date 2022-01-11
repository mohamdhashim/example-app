<template>
  <div class="home">

    <form @submit.prevent= "handleSubmit" >

      <inputlabel label_text="Building" v-model="building"/>
      <inputlabel label_text="Apartment" v-model="apartment"/>
      <inputlabel label_text="Floor" v-model="floor"/>
      <inputlabel label_text="Street" v-model="street"/>
      <inputlabel label_text="Email" v-model="email"/>
      <inputlabel label_text="Area name" v-model="area_name"/>
      <div class = "submit">
        <button>POST Data</button>
      </div>
    </form>
    
  </div>
</template>

<script>
import inputlabel from '../components/Input.vue'
    
  export default {
  components: { inputlabel },
    name: 'NewAddress',
    data(){
      return {
        apartment: '',
        building: '',
        floor: '',
        street: '',
        area_name:'',
        email: '',
        message:''
      }
    },methods: {
      handleSubmit(){
        var address = {
            floor: this.floor,
            building: this.building,
            street: this.street,
            apartment: this.apartment,
            area: this.area_name,
            email: this.email
        }
        
        axios.post('http://localhost/api/new_address',address)
          .then(data => {console.log('Message', data);})
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