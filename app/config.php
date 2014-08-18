<?php // установить имя сайта
$arr_uri=explode("/",$_SERVER['REQUEST_URI']);
define('SITE_NAME',$arr_uri[1]);
$url_segments=array_slice($arr_uri,2);