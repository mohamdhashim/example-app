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
        v-else-if="message.value == 400"
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

export default {
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
    ...mapState({
      message: (state) => state.message,
    }),
  },
  methods: {
    ...mapMutations({
      emailMutation: "updateEmail",
      buildingMutation: "updateBuilding",
      streetMutation: "updateStreet",
      apartmentMutation: "updateApartment",
      areaNameMutation: "updateAreaName",
      floorMutation: "updateFloor",
      messageMutation:'messageMutation',

    }),
    ...mapActions(["submitData"]),

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
        this.messageMutation({value:400})
      }else
        this.submitData();
    },

    validField(name,value) {
      return Validate.validField(name,value);
    },
  },
};
</script>
<style scoped>
form {
  display: inline-block;
  border: 1px solid rgba(128, 128, 128, 0.335);
  background-color: rgba(255, 255, 255, 0.541);
  border-radius: 7px;
  padding: 10px 10px;
  box-shadow: 1px 2px 5px 4px #e9e7e781;
}

.error {
  color: red;
  font-weight: 10px;
  font-size: 10px;
  margin-bottom: -5px;
  border: 1px solid red;
  width: fit-content;
  border-radius: 2px 5px;
  font-size: 7px;
  background-color: rgba(255, 0, 0, 0.096);
  padding-left: 1px;
  padding-right: 1px;
}
.message {
  color: green;
  font-weight: 10px;
  font-size: 10px;
  margin-bottom: -5px;
  border: 1px solid green;
  width: fit-content;
  border-radius: 2px 5px;
  font-size: 10px;
  background-color: rgba(0, 128, 0, 0.294);
  padding-left: 1px;
  padding-right: 1px;
}
.form {
  margin-left: 40px;
}

.submit {
  margin-top: 10px;
  margin-left: 150px;
  border: 1px solid rgba(128, 128, 128, 0.061);
  border-radius: 6px;
  color: white;
  box-shadow: 1px 1px 5px 1px #d1d1d181;
  background-color: #4b6587;
  transition: background-color 0.3s ease;
}
.submit:enabled:hover {
  background-color: #5a7daa;
  transition: background-color 0.3s ease;
}
.submit:disabled {
  background-color: #8e9aaa80;
  color: rgb(245, 238, 238);
  transition: background-color 0.6s ease;
  transform: scale() 0.6s ease;
}
</style>
