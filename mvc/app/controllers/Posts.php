<?php
  class Posts extends Controller {
    public function __construct() {
      if(!isLoggedIn()) :
        redirect('users/login');
      endif;

      $this->postModel = $this->model('Post');
    }

    public function index() {
      // Get posts
      $posts = $this->postModel->getPosts();

      $data = [
        'title' => 'Posts',
        'posts' => $posts
      ];

      $this->view('posts/index', $data);
    }

    public function add() {

    $data = [
      'title' => '',
      'body' => ''
    ];

    $this->view('posts/add', $data);

    }

  }
