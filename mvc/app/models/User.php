<?php
  /**
    * Model for controlling data flow to/form users db table
    */

    class User {
      private $db;

      public function __construct() {
        $this->db = new Database;
      }

      // Find user by email
      public function findUserByEmail($email) {
        // Prepare query and bind info
        $this->db->query("SELECT * FROM users WHERE email = :email");
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
