<?php // установить имя сайта
$arr_uri=explode("/",$_SERVER['REQUEST_URI']); //echo "<pre>"; var_dump($arr_uri); echo "</pre>"; die();
$uri_index=(strstr($_SERVER['REQUEST_URI'], '/projects/'))? 2:1;
define('SITE_NAME',$arr_uri[$uri_index]); //mvc_php
require_once "router.php";