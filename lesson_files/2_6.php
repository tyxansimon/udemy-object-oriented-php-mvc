<?php

  class User {

    // Properties
    protected $name;
    protected $age;

    // Constructor
    public function __construct($name, $age) {
      $this->name = $name;
      $this->age = $age;
    }

  }

  class Customer extends User {

    // Properties
    private $balance;

    // Constructor
    public function __construct($name, $age, $balance) {
      parent::__construct($name, $age);
      $this->balance = $balance;
    }

    // Methods
    public function pay($amount) {
      return "<p>". $this->name ." paid $". $amount ."<br>";
    }
    public function get_balance() {
      return "<p>The customer has a balance of $". $this->balance ."</p>";
    }

  }

  $customer1 = new Customer("Simon", 28, 1000);

  echo $customer1->pay(100);

  echo $customer1->get_balance();
