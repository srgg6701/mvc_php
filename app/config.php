<?php
<<<<<<< HEAD
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
=======
// установить имя сайта
define('SITE_NAME','mvc_php');
require_once "router.php";
>>>>>>> 5ed26bc7b7288d9d7962a2f31ba4d76b8514e7cc
