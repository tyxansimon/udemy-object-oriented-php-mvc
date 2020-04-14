<?php
  class Users extends Controller {
    public function __construct() {

    }

    // Handles GET/POST for registration form
    public function register() {
      // Check the request method
      if($_SERVER['REQUEST_METHOD'] == 'POST') :
        // Process form
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
  }
