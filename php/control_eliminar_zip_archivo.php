<?php
session_start();

$rutaDescarga2 = "zip/". $_SESSION['no_control'];
    unlink($rutaDescarga2);

?>