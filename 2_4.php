<?php
  // User class
  class User {
    // Properties
    public $name;
    public $age;

    // Constructor
    // Used when an object is created
    public function __construct($name, $age) {
      // __CLASS__ and __LINE__ are magic constants (https://www.php.net/manual/en/language.constants.predefined.php)
      echo "<p>Class <em>". __CLASS__ ."</em> instantiated on line ". __LINE__ ."</p>";
      $this->name = $name;
      $this->age= $age;
    }

    // Method
    public function SayHello() {
      return "<p>". $this->name ." says hello!</p>";
    }

    // Destructor
    // Called when no other references to a certain object
    // Used for cleanup, closing connections, etc.
    public function __destruct() {
      echo "<p>Class <em>". __CLASS__ ."</em> destroyed on line ". __LINE__ ."</p>";
    }
  }

  // Instanciate new user objects
  $user1 = new User("Stan", 19);
  echo "<p>". $user1->name ." is ". $user1->age . " years old.</p>";
  echo $user1->SayHello();

  $user2 = new User("Sarah", 35);
  echo "<p>". $user2->name ." is ". $user2->age . " years <em>young</em>.</p>";
  echo $user2->SayHello();
