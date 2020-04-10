<?php
  class Pages extends Controller {
    public function __construct() {

    }

    // Must have the index function as it's default for /libraries/Core.php
    public function index() {
      $data = [
        'title' => 'Welcome'
      ];
      $this->view('pages/index', $data);
    }

    public function about() {
      $this->view('pages/about');
    }
  }
