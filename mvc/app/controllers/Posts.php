<?php
  class Posts extends Controller {
    public function __construct() {
      if(!isLoggedIn()) :
        redirect('users/login');
      endif;

      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
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

    public function show($id) {
      // Get posts
      $post = $this->postModel->getPostById($id);
      $user = $this->userModel->getUserById($post->user_id);

      $data = [
        'post' => $post,
        'user' => $user
      ];
      $this->view('posts/show', $data);
    }

    public function add() {

      if($_SERVER['REQUEST_METHOD'] == "POST") :

        // Sanitize the post
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],
          'title_error' => "",
          'body_error' => ""
        ];

        // Validate title
        if(empty($data['title'])) :
          $data['title_error'] = "Please enter title";
        endif;

        // Validate body
        if(empty($data['body'])) :
          $data['body_error'] = "Please enter body";
        endif;

        // Check for errors
        if(empty($data['title_error']) && empty($data['body_error'])) :
          // Validated
          if($this->postModel->addPost($data)) :
            flash("post_message", "Post added");
            redirect("posts");
          else :
            die("Something went wrong");
          endif;
        else:
          // Load view with errors
          $this->view('posts/add', $data);
        endif;

      else :

        $data = [
          'title' => '',
          'body' => ''
        ];

        $this->view('posts/add', $data);

      endif;

    }

  }
