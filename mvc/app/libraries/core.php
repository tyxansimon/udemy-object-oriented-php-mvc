<?php
  /**
    * Used to draw in information, figure out what controllers need
    * to be used, what properties and what methods will be needed.
    * As the name suggests, it sits at the core of our project, bringing
    * all our different files together.
    */

  /**
    * App core class
    * Creates URL and core controller
    * URL format - /controller/method/params
    */
  class Core {
    // -- Properties
    protected $currentController = "Pages";
    protected $currentMethod = "Index";
    protected $pararms = [];
    // -- Construct
    public function __construct() {
      //print_r(self::getURL());
      $url = self::getURL();

      // Check our app controllers to see if a file exists for first chunk of parsed URL
      if(file_exists('../app/controllers/'. ucwords($url[0]) .'.php')) :
        // If exists, set as controller
        $this->currentController = ucwords($url[0]);
        // Unset 0 index of URL array
        unset($url[0]);
      endif;

      // Require the requested controller
      require_once '../app/controllers/'. $this->currentController .'.php';

      // Instantiate controller class
      $this->currentController = new $this->currentController;
    }
    // -- Methods
    public static function getURL() {
      if(isset($_GET['url'])) :
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      endif;
    }
  }
