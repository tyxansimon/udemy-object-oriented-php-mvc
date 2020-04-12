<?php
  /**
    * PDO database class - Used by the model
    * Connect to database, create prepared statements
    * Bind values, return rows and results
    */
    class Database {
      private $host = DB_HOST;
      private $user = DB_USER;
      private $pass = DB_PASS;
      private $dbname = DB_NAME;

      private $dbh; // Database handler - Used whenever we prepare statement
      private $stmt; // Statement handler
      private $err; // Error handler

      public function __construct() {
        // Set DSN
        $dsn = "mysql:host=$this->host;dbname=$this->dbname;";
        $options = [
          PDO::ATTR_PERSISTENT => true, // Increase performance. Check if existing connection is already open
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // More elegant way to handle errors
        ];
        // Create new PDO instance
        try{
          $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOException $e) {
          // Echo any error messages
          $this->error = $e->getMessage();
          echo $this->error;
        }
      }

      // Prepare statement with query
      public function query($sql) {
        $this->stmt = $this->dbh->prepare($sql);
      }
      // Bind values
      public function bind($param, $value, $type = null) {
        if(is_null($type)) {
          // Switch case to determine and set PDO value type
          switch(true) {
            case is_int($value):
              $type = PDO::PARAM_INT;
              break;
            case is_bool($value):
              $type = PDO::PARAM_BOOL;
              break;
            case is_null($value):
              $type = PDO::PARAM_NULL;
              break;
            default:
              $type = PDO::PARAM_STR;
              break;
          }
        }

        $this->stmt->bindvalue($param, $value, $type);
      }

      // Execute the prepared statement
      public function execute() {
        return $this->stmt->execute();
      }

      // Get result set as array of objects
      public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
      }

      // Get single result as object
      public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
      }

      // Get row count
      public function rowCount() {
        return $this->stmt->rowCount();
      }

    }
