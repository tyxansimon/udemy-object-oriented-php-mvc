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
    // Properties
    protected $currentController = "Pages";
    protected $currentMethod = "Index";
    protected $pararms = [];
    // Methods
    public static function getURL() {
      echo $_GET['url'] ?: '';
    }
    // Construct
    public function __construct() {
      $this->getURL;
    }
  }
