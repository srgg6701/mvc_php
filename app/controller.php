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
        echo "doc_root = " . $_SERVER['DOCUMENT_ROOT']."<HR>";
        $droot = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'projects' . DIRECTORY_SEPARATOR . SITE_NAME . DIRECTORY_SEPARATOR;
        $filename='app' . DIRECTORY_SEPARATOR .'controllers'. DIRECTORY_SEPARATOR . $controller_name . '.php';
        //echo "<div>filename = $filename</div>";
        //require_once $filename;
        if(!file_exists($droot.$filename)){
            $controller=false;
            $filename=$droot.'404.php';
        }
        //echo "<div>filename = $filename</div>";
        require_once $filename;

        if(class_exists($controller_name))
            $controller=new $controller_name();
    }
    if(isset($option)){
        echo "<div>option = $option</div>";
    }
    if(isset($entity_id)){
        echo "<div>entity_id = $entity_id</div>";
    }
}