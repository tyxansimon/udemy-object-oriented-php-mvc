<?php
  class Pages extends Controller {
    public function __construct() {
    }

    // Must have the index function as it's default for /libraries/Core.php
    public function index() {
      if(isLoggedIn()) {
        redirect('posts');
      }

      // View data
      $data = [
        'title' => 'Share posts',
        'description' => 'Welcome to the OOP PHP MVC demo!'
      ];
      // View template
      $this->view('pages/index', $data);
    }

    public function about() {
      $data = [
        'title' => 'About',
        'description' => 'Learn more about OOP PHP MVC.'
      ];
      $this->view('pages/about', $data);
    }
  }
