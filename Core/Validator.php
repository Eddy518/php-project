<?php
namespace Core;
class Validator{
    public static function string($value,$min=1,$max=INF){
        //pure function not dependent on any internal state of object or class. Does not reference  this-> . It is considered to be static
        //string() only interacts with the given parameters and returns results
        $value =  trim($value); //Trim the spaces to prevent user from submitting space separated blanks
        return  strlen($value) >= $min && strlen($value) <= $max ;
    }
    public static function email($value){
        //Validator::email('john@example.com') Validates if value takes the form of an email
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
