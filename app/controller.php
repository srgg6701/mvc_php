<?php

if($_POST){
    echo "<pre>" . __FILE__ . ':' . __LINE__ . '<br>';
    var_dump($_POST);
    echo "</pre>";
}
require_once  'controllers'. DIRECTORY_SEPARATOR . 'Controller.php';

if(!empty($url_segments)){
    // вызвать нужный контроллер
    if(isset($entity)){
        echo "<div>entity = $entity</div>";
        $controller_name = ucfirst($entity) . 'Controller';
        $filename='controllers'. DIRECTORY_SEPARATOR . $controller_name . '.php';
        if(!file_exists($filename)){
            $controller=false;
            $filename='404.php';
        }
        else
            $controller=new $controller_name();
        require_once $filename;
    }
    if(isset($option)){
        echo "<div>option = $option</div>";
    }
    if(isset($entity_id)){
        echo "<div>entity_id = $entity_id</div>";
    }
}