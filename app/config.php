<?php
if(isset($_GET['show'])){
    $show=$_GET['show'];
    if($show=='server'){
        echo "<pre>";
        var_dump($_SERVER);
        echo "</pre>";
    }
}
// установить имя сайта
define('SITE_NAME','mvc_php');
require_once "router.php";
