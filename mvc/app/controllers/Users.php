<?php
  class Users extends Controller {
    public function __construct() {
      // Check models folder for User.php model file.
      $this->userModel = $this->model('User');
    }

    // Handles GET/POST for registration form
    public function register() {
      // Check the request method
      if($_SERVER['REQUEST_METHOD'] == 'POST') :
        // Process form

        // Sanitize post data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Get post data
        $data = [
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'name_error' => '',
          'email_error' => '',
          'password_error' => '',
          'confirm_password_error' => ''
        ];

        // Validate email
        if(empty($data['email'])) :
          $data['email_error'] = "Please enter email";
        else :
          // Check existing email
          if($this->userModel->findUserByEmail($data['email'])) {
            $data['email_error'] = "That email is already registered";
          }
        endif;

        // Validate name
        if(empty($data['name'])) :
          $data['name_error'] = "Please enter name";
        endif;

        // Validate password
        if(empty($data['password'])) :
          $data['password_error'] = "Please enter password";
        elseif(strlen($data['password']) < 6) :
          $data['password_error'] = "Password must be at least 6 characters";
        endif;

        // Validate confirm password
        if(empty($data['confirm_password'])) :
          $data['confirm_password_error'] = "Please confirm password";
        else:
          if($data['password'] !== $data['confirm_password']) :
            $data['confirm_password_error'] = "Passwords do not match";
          endif;
        endif;

        // Make sure there are no errors
        if(empty($data['email_error']) && empty($data['name_error']) && empty($data['password_error']) && empty($data['confirm_password_error'])) :
          // All valid!

          // Hash password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          // Register user
          if($this->userModel->register($data)) :
            // User registered - redirect to login
            flash('register_success', 'You have successfully registered');
            redirect("users/login");
          else :
            // Uh-oh!
            die("Something went wrong");
          endif;

        else :
          // Load view with errors
          $this->view('users/register', $data);
        endif;

      else :
        // Init data
        $data = [
          'name' => '',
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          'name_error' => '',
          'email_error' => '',
          'password_error' => '',
          'confirm_password_error' => ''
        ];

        // Load view
        $this->view('users/register', $data);
      endif;
    }

    // Handles GET/POST for login form
    public function login() {
      // Check the request method
      if($_SERVER['REQUEST_METHOD'] == 'POST') :
        // Process form

        // Sanitize post data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Get post data
        $data = [
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_error' => '',
          'password_error' => ''
        ];

        // Validate email
        if(empty($data['email'])) :
          $data['email_error'] = "Please enter email";
        else :
          // Check existing email
          if(!$this->userModel->findUserByEmail($data['email'])) :
            $data['email_error'] = "No account for that email";
          endif;
        endif;

        // Validate password
        if(empty($data['password'])) :
          $data['password_error'] = "Please enter password";
        endif;

        // Make sure there are no errors
        if(empty($data['email_error']) && empty($data['password_error'])) :
          // Validated
          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);

          if($loggedInUser) :
            // Create session
            $this->createUserSession($loggedInUser);
          else :
            // Incorrect password
            $data['password_error'] = "Password incorrect";
            $this->view('users/login', $data);
          endif;
        else :
          // Load view with errors
          $this->view('users/login', $data);
        endif;

      else :
        // Init data
        $data = [
          'email' => '',
          'password' => '',
          'email_error' => '',
          'password_error' => '',
        ];

        // Load view
        $this->view('users/login', $data);
      endif;
    }

    public function createUserSession($user) {
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_name'] = $user->name;
      redirect('posts');
    }

    public function logout() {
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('users/login');
    }
  }
