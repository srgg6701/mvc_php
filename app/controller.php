<?php

if($_POST){
    echo "<pre>" . __FILE__ . ':' . __LINE__ . '<br>';
    var_dump($_POST);
    echo "</pre>";
}
require_once  'controllers'. DIRECTORY_SEPARATOR . 'Controller.php';

if(!empty($url_segments)){
    require_once 'router.php'; /*echo "<pre>" . __FILE__ . ':' . __LINE__ . '<br>';var_dump($url_segments);echo "</pre>"; */
    // вызвать нужный контроллер
    if(isset($entity)){
        $controller_name = ucfirst($entity) . 'Controller';
        require_once  'controllers'. DIRECTORY_SEPARATOR . $controller_name . '.php';
        $controller=new $controller_name();
    }
    if(isset($option)){
        echo "<div>option = $option</div>";
    }
    if(isset($entity_id)){
        echo "<div>entity_id = $entity_id</div>";
    }
}