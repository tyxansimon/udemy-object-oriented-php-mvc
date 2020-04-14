<?php
  /**
    * User session helper
    */

    // Start the session
    session_start();

    // Flash messaging
    // EXAMPLE - flash('register_success', 'You are now registered', 'alert alert-info');
    // DISPLAY IN VIEW - <?= flash('register_success'); ?\>
    function flash($name = "", $message = "", $class = "alert alert-success") {
      // If alert name is set.
      if(!empty($name)) :
        // If vars set, remove existing and values and replace
        if(!empty($message) && empty($_SESSION[$name])) :
          if(!empty($_SESSION[$name])) :
            unset($_SESSION[$name]);
          endif;

          if(!empty($_SESSION[$name .'_class'])) :
            unset($_SESSION[$name .'_class']);
          endif;

          $_SESSION[$name] = $message;
          $_SESSION[$name .'_class'] = $class;
        // If vars are not set and session name exists, print it.
        elseif(empty($message) && !empty($_SESSION[$name])) :
          $class = !empty($_SESSION[$name .'_class']) ? $_SESSION[$name .'_class'] : "";
          echo "<div class='$class' id='msg-flash'>$_SESSION[$name]</div>";
          unset($_SESSION[$name]);
          unset($_SESSION[$name .'_class']);
        endif;
      endif;
    }
