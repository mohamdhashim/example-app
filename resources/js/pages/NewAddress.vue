<template>
  <div class="form">
    <form @submit.prevent="handleSubmit">
      <div class="error" v-if="!validField('building')">* required</div>
      <input-label label_text="Building" :method="updateBuilding" />

      <div class="error" v-if="!validField('apartment')">
        * enter a vaild value
      </div>
      <input-label label_text="Apartment" :method="updateApartment" />

      <div class="error" v-if="!validField('floor')">
        * enter a vaild integer in range [-2 : 180]
      </div>
      <input-label label_text="Floor" :method="updateFloor" />

      <div class="error" v-if="!validField('street')">* enter a vaild name</div>
      <input-label label_text="Street" :method="updateStreet" />

      <div class="error" v-if="!validField('email')">* required</div>
      <div class="error" v-else-if="!validateEmail()">*e-mail isn't valid</div>
      <input-label label_text="Email" :method="updateEmail" />

      <div class="error" v-if="!validField('area_name')">
        * enter a vaild name
      </div>
      <input-label label_text="Area name" :method="updateAreaName" />

      <div v-if="!validField('button')">
        <button disabled class="submit">Submit Data</button>
      </div>
      <div v-else>
        <button class="submit">Submit Data</button>
      </div>
      <div class="message" v-if="message.value== 201">
          Address submitted successfully
      </div>
      <div class="error" v-else-if="message.value==400" style="color:red; font-size :10px;">
            Faild to submit: please check your data again 
      </div>

    </form>
  </div>
</template>

<script>
import { mapMutations, mapState, mapActions, Store } from "vuex";


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
  computed:{
    ...mapState({
            message: (state) => state.message,
        })
  },
  methods: {
    ...mapMutations({
      EmailMutation: "updateEmail",
      BuildingMutation: "updateBuilding",
      StreetMutation: "updateStreet",
      ApartmentMutation: "updateApartment",
      AreaNameMutation: "updateAreaName",
      FloorMutation: "updateFloor",
    }),
    ...mapActions(["SumbitData"]),

    //update methods used to retreive data from child components & update it's States
    updateApartment(valueFromChild) {
      this.ApartmentMutation(valueFromChild);
      this.apartment = valueFromChild;
    },
    updateBuilding(valueFromChild) {
      this.BuildingMutation(valueFromChild);
      this.building = valueFromChild;
    },
    updateFloor(valueFromChild) {
      this.FloorMutation(valueFromChild);
      this.floor = valueFromChild;
    },
    updateStreet(valueFromChild) {
      this.StreetMutation(valueFromChild);

      this.street = valueFromChild;
    },
    updateAreaName(valueFromChild) {
      this.AreaNameMutation(valueFromChild);
      this.area_name = valueFromChild;
    },
    updateEmail(valueFromChild) {
      this.EmailMutation(valueFromChild);
      this.email = valueFromChild;
    },

    handleSubmit() {
      this.SumbitData();
    },

    //input Validation Methods
    validateEmail() {
      if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email)) {
        return true;
      } else {
        return false;
      }
    },
    isNumeric(val) {
      //to Check if the String is an Integer number or not
      return /^-?\d+$/.test(val);
    },
    isName(val) {
      //to Check if the String is a vaild Area or Street Name[assumed that ['-', '_' , ',' , '.'] is common used in Street Naming]
      return /[`!@#$%^&*()+\=\[\]{};':"\\|<>\/?~]/.test(val);
    },

    validField(name) {
      if (name == "email" || name == "button")
        if (this.email == "") return false;

      if (name == "apartment" || name == "button")
        if (
          this.apartment < 0 ||
          this.apartment > 1000 ||
          this.isName(this.apartment)
        )
          return false;

      if (name == "floor" || name == "button")
        if (
          (this.floor != "") &
          (this.floor < -2 || this.floor > 180 || !this.isNumeric(this.floor))
        )
          return false;

      if (name == "street" || name == "button")
        if (this.street == "" || this.isName(this.street)) return false;

      if (name == "area_name" || name == "button")
        if (this.area_name == "" || this.isName(this.area_name)) return false;

      if (name == "building" || name == "button")
        if (this.building == "") return false;

      if ((name == "button") & !this.validateEmail()) return false;

      return true;
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
