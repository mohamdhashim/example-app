export default class Validate {
    //input Validation Methods
    static validateEmail(value) {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value)) {
            return true;
        } else {
            return false;
        }
    }
    static isNumeric(val) {
        //to Check if the String is an Integer number or not
        return /^-?\d+$/.test(val);
    }

    static isName(val) {
        //to Check if the String is a vaild Area or Street Name[assumed that ['-', '_' , ',' , '.'] is common used in Street Naming]
        return /[`!@#$%^&*()+\=\[\]{};':"\\|<>\/?~]/.test(val);
    }

    static validField(name, value = "") {

        if (name == "apartment" || name == "button")
            if (value < 0 || value > 1000 || this.isName(value)) return false;

        if (name == "floor" || name == "button")
            if (
                (value != "") &
                (value < -2 || value > 180 || !this.isNumeric(value))
            )
                return false;

        if (name == "street" || name == "button")
            if (value == "" || this.isName(value)) return false;

        if (name == "area_name" || name == "button")
            if (value == "" || this.isName(value)) return false;

        if (name == "building" || name == "button")
            if (value == "") return false;

        return true;
    }
}
