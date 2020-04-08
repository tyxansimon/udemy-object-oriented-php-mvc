<?php

  // Define a class
  class User {
    // Properties (attributes)
    public $name;
    // Methods (functions)
    public function SayHello() {
      // $this can be used to grab information from within the class
      return $this->name . " says Hello";
    }
  }

  // Instantiate a user object from the user class
  $user1 = new User();
  $user1->name = "Simon"; // As User $name is public, we can set outside of class
  echo $user1->SayHello();

  echo "<br>";

  // Create new user (instantiate a new User object)
  $user2 = new User();
  $user2->name = "James";
  echo $user2->sayHello();
