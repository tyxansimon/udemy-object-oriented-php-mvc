<?php
  class Posts extends Controller {

    public function index() {
      // View data
      $data = [
        'title' => 'Posts'
      ];

      $this->view('posts/index', $data);
    }

  }
