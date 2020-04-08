<?php
  // User class
  class User {
    // Properties (private)
    private $name;
    private $age;
    // Constructor
    public function __construct($name, $age) {
      echo "<p>Constructor for ". __CLASS__ ." ran successfully.</p>";
      $this->name = $name;
      $this->age = $age;
    }
    // Methods

    // GETTERS - Get particular information from private properties
    public function GetName() {
      return "<p><strong>Name:</strong> ". $this->name ."</p>";
    }
    public function GetAge() {
      return "<p><strong>Age:</strong> ". $this->age ."</p>";
    }
    // __get - Magic method
    public function __get($property) {
      if(property_exists($this, $property)) :
        return "<p><strong>$property:</strong> ". $this->$property ."</p>";
      endif;
    }

    // SETTERS - Allows private properties to be changed safely
    public function SetName($name) {
      $this->name = $name;
      return "<p>Set name to ". $this->name ."</p>";
    }
    public function SetAge($age) {
      $this->name = $name;
      return "<p>Set age to ". $this->age ."</p>";
    }
    // __set - Magic method
    public function __set($property, $value) {
      if(property_exists($this, $property)) :
        $this->$property = $value;
      endif;
      return $this;
    }

    // Destructor
    public function __destruct() {
      echo "<p>Destructor for ". __CLASS__ ." ran successfully.</p>";
    }
  }

  // Instantiate new user object
  $user1 = new User("Simon", 28);

  echo $user1->GetName(); // Usual get method
  echo $user1->__get('name'); // Magic get method

  echo $user1->SetName('Johnny'); // Usual set method
  echo $user1->__get('name');

  $user1->__set('age', 31); // Usual set method
  echo $user1->__get('age');
