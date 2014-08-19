<?php

if($_POST){
    echo "<pre>" . __FILE__ . ':' . __LINE__ . '<br>';
    var_dump($_POST);
    echo "</pre>";
}
require_once  'controllers'. DIRECTORY_SEPARATOR . 'Controller.php';

if(!empty($url_segments)){
    $filename=NULL;
    // вызвать нужный контроллер
    if($entity){
        //echo "<div>entity = $entity</div>";
        $controller_name = ucfirst($entity) . 'Controller';
        $content = "<h1>Entity: " . $entity."</h1><HR>";
        // файл подключения
        $filename='app' . DIRECTORY_SEPARATOR .'controllers'. DIRECTORY_SEPARATOR . $controller_name . '.php';
        // нет такого файла
        if(!file_exists($droot.$filename)){
            $controller=false;
            $filename=$droot.'404.php';
        }
        if(class_exists($controller_name)){
            $controller=new $controller_name();
            $content.= "<h3>Controller: $controller_name</h3>";
        }
    }else{
        $content = "<h1>No entity</h1>";
    }
    if(isset($option)){
        if($option=='wrong')
            $filename=$droot.'404.php';
        elseif($option)
            $content.= "<h4>option = $option</h4><hr/>";
    }
    if(isset($entity_id)){
        $content.=  "<div>entity_id = $entity_id</div>";
    }
    if($filename)
        require_once $filename;
}
