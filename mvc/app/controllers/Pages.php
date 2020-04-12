<?php
  class Pages extends Controller {
    public function __construct() {
    }

    // Must have the index function as it's default for /libraries/Core.php
    public function index() {
      // View data
      $data = [
        'title' => 'Welcome'
      ];
      // View template
      $this->view('pages/index', $data);
    }

    public function about() {
      $data = [
        'title' => 'About'
      ];
      $this->view('pages/about', $data);
    }
  }
