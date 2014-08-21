<?php
if(isset($_GET['show'])){
    $show=$_GET['show'];
    if($show=='server'){
        echo "<pre>";
        var_dump($_SERVER);
        echo "</pre>";
    }
}
if(strstr($_SERVER['REQUEST_URI'],'mvc_php')) $sitename='mvc_php';
elseif(strstr($_SERVER['REQUEST_URI'],'temp_mvc')) $sitename='temp_mvc';
// установить имя сайта
define('SITE_NAME',$sitename);
require_once "router.php";
