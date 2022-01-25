<template>
  <div class="form">
    <form @submit.prevent="handleSubmit">
      <input-label
        labelText="Building"
        :getInput="updateBuilding"
        fieldName="building"
        message="* enter a vaild value"
      />

      <input-label
        labelText="Apartment"
        :getInput="updateApartment"
        fieldName="apartment"
        message="* enter a vaild value"
      />

      <input-label
        labelText="Floor"
        :getInput="updateFloor"
        fieldName="floor"
        message="* enter a vaild integer in range [-2 : 180]"
      />

      <input-label
        labelText="Street"
        :getInput="updateStreet"
        fieldName="street"
        message="* enter a vaild name"
      />

      <input-label
        labelText="Email"
        :getInput="updateEmail"
        fieldName="email"
        message="*e-mail isn't valid"
      />

      <input-label
        labelText="Area name"
        :getInput="updateAreaName"
        fieldName="area_name"
        message="* enter a vaild name"
      />

    <button class="submit">Submit Data</button>

      <div class="message" v-if="message.value == 201">
        Address submitted successfully
      </div>

      <div
        class="error"
        v-else-if="message.value >= 400"
        style="color: red; font-size: 10px"
      >
        Faild to submit: please check your data again
      </div>
    </form>
  </div>
</template>

<script>
import { mapMutations, mapState, mapActions, Store } from "vuex";
import Validate from "../validation";
import Input from './Input.vue'


export default {
    components: { 'input-label': Input },
  name: "NewAddress",
  data() {
    return {
      apartment: "",
      building: "",
      floor: "",
      street: "",
      area_name: "",
      email: "",
    };
  },
  computed: {
    ...mapState('store/',{
      message: (state) => state.message,
    }),
  },
  methods: {
    ...mapMutations('store/',{
      emailMutation: "updateEmail",
      buildingMutation: "updateBuilding",
      streetMutation: "updateStreet",
      apartmentMutation: "updateApartment",
      areaNameMutation: "updateAreaName",
      floorMutation: "updateFloor",
      messageMutation:'messageMutation',

    }),
    ...mapActions('store/',["submitData","getMail"]),

    //update methods used to retreive data from child components & update it's States
    updateApartment(valueFromChild) {
      this.apartmentMutation(valueFromChild);
      this.apartment = valueFromChild;
    },
    updateBuilding(valueFromChild) {
      this.buildingMutation(valueFromChild);
      this.building = valueFromChild;
    },
    updateFloor(valueFromChild) {
      this.floorMutation(valueFromChild);
      this.floor = valueFromChild;
    },
    updateStreet(valueFromChild) {
      this.streetMutation(valueFromChild);

      this.street = valueFromChild;
    },
    updateAreaName(valueFromChild) {
      this.areaNameMutation(valueFromChild);
      this.area_name = valueFromChild;
    },
    updateEmail(valueFromChild) {
      this.emailMutation(valueFromChild);
      this.email = valueFromChild;
    },

    handleSubmit() {
      if (
        !this.validField("building", this.building) ||
        !this.validField("floor", this.floor) ||
        !this.validField("apartment", this.apartment) ||
        !this.validField("street", this.street) ||
        !this.validField("email", this.email) || 
        !this.validField('area_name', this.area_name)
      ){
        this.messageMutation({value:400});
      }else
        this.submitData();
    },

    validField(name,value) {
      return Validate.validField(name,value);
    }, 
  },
  mounted(){
    this.getMail();
  }
};
</script>
