<?php
if($_GET['show']){
    $show=$_GET['show'];
    if($show=='server'){
        echo "<pre>";
        var_dump($_SERVER);
        echo "</pre>";
    }
}
// установить имя сайта
$arr_uri=explode("/",$_SERVER['REQUEST_UR/+I']);
//echo "<pre>"; var_dump($arr_uri); echo "</pre>"; die();
//
$uri_index=(strstr($_SERVER['REQUEST_URI'], '/projects/'))? 2:1;
define('SITE_NAME',$arr_uri[$uri_index]);