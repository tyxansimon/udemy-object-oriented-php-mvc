<?php
  class Pages extends Controller {
    public function __construct() {

    }

    // Must have the index function as it's default for /libraries/Core.php
    public function index() {
      $this->view('hello');
    }

    public function about($id) {
      echo "ID: $id requested";
    }
  }
