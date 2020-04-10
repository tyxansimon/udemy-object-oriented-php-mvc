<?php
  class Pages {
    public function __construct() {

    }

    // Must have the index function as it's default for /libraries/Core.php
    public function index() {

    }

    public function about($id) {
      echo "ID: ". $id ." requested";
    }
  }
