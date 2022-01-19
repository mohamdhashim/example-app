<?php

namespace App\Http\Livewire;

use Livewire\Component;


class Validation
{

    public static function validateEmail($email)
    {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    public static function isName($name)
    {

        if (!preg_match("/^[a-zA-z0-9-' ]*$/", $name)) {
            return false;
        } else {
            return true;
        }
    }



    public static function isNumeric($num)
    {
        if (!preg_match("/^[0-9]*$/", $num)) {
            return false;
        } else {
            return true;
        }
    }

    public static function validField($name, $value = "")
    {
        if ($name == "email" || $name == "button")
            if (!self::validateEmail($value)) return false;

        if ($name == "apartment" || $name == "button")
            if ($value < 0 || $value > 1000 || !self::isName($value)) return false;

        if ($name == "floor" || $name == "button")
            if (
                ($value != "") &
                ($value < -2 || $value > 180 || !self::isNumeric($value))
            )
                return false;

        if ($name == "street" || $name == "button")
            if ($value == "" || !self::isName($value)) return false;

        if ($name == "area_$name" || $name == "button")
            if ($value == "" || !self::isName($value)) return false;

        if ($name == "building" || $name == "button")
            if ($value == "") return false;

        return true;
    }
}
