<?php

  session_start();

  unset($_SESSION['no_control']);
  session_destroy();

 
  echo 1;

?>