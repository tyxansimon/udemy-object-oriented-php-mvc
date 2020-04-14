<?php
  /**
    * Model for controlling data flow to/form users db table
    */

    class User {
      private $db;

      public function __construct() {
        $this->db = new Database;
      }

      // Register user account
      public function register($data) {
        $this->db->Query("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        // Bind values
        $this->db->bind(":name", $data['name']);
        $this->db->bind(":email", $data['email']);
        $this->db->bind(":password", $data['password']);
        // Execute query
        if($this->db->execute()) :
          return true;
        else :
          return false;
        endif;
      }

      // Find user by email
      public function findUserByEmail($email) {
        // Prepare query and bind info
        $this->db->query("SELECT * FROM users WHERE email = :email");
        // Bind values
        $this->db->bind(":email", $email);
        // Grab single result
        $this->db->single();
        // Check if a row exists
        if($this->db->rowCount() > 0) :
          return true;
        else:
          return false;
        endif;
      }
    }
