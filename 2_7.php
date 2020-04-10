<?php

 class User {

   // Properties
   public $name;
   public $age;
   // Static element will remain the same throughout.
   // This can be grabbed throughout this file with the self:: keyword.
   public static $min_pass_length = 6;

   // Methods
   public static function validate_pass($password) {
     if(strlen($password) >= self::$min_pass_length) :
       return true;
     else :
       return false;
     endif;
   }

 }

 $password = "Hello"; // Is lower than 6, so invalid
 if(User::validate_pass($password)) :
   echo "Password valid!";
 else :
   echo "Password invalid!";
 endif;
