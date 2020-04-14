<?php
  class Posts extends Controller {
    public function __construct() {
      if(!isLoggedIn()) :
        redirect('users/login');
      endif;
    }

    public function index() {
      // View data
      $data = [
        'title' => 'Posts'
      ];

      $this->view('posts/index', $data);
    }

  }
