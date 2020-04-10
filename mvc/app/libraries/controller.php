<?php
  /**
    * Main controller file, load models and views for child controllers.
    */
    class Controller {
      // Load model
      public function model($model) {
        // Require model file
        require_once "../app/models/$model.php";

        // Instantiate model
        return new $model();
      }
      // Load view
      public function view($view, $data = []) {
        // Check the view file exists
        if(file_exists("../app/views/$view.php")) :
          require_once "../app/views/$view.php";
        else :
          // View does not exists
          die("View \"$view\" doesn't exist");
        endif;
      }
    }
