<?php
session_start();

ini_set("display_errors","1");
error_reporting(E_ALL);



require "library.php";

$erreur = null;
$flash = null;
if(isset($_SESSION['flash']) ){
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
}

$config = require "config.php";

spl_autoload_register(function ($class_name) {
    require_once 'Classes/'.$class_name.'.php' ;
});