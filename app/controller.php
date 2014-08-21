<?php
if($_POST){
    echo "<pre>" . __FILE__ . ':' . __LINE__ . '<br>';
    var_dump($_POST);
    echo "</pre>";
}else{
    // переходим к сути
    $entity=NULL;
    if(!empty($url_segments)
        && isset($url_segments[0])){
        //die();
        $entity=$url_segments[0];
        // назначить опцию по умолчанию (если второго сегмента нет)
        if(!isset($url_segments[1]))
            $option='read';
        else{
            if(!$option=trim($url_segments[1])) // /[authors/articles/readers]/
            // проверить, есть ли в адресе id
            if(!preg_match('/[^\d]/',$option)) { // получили id cущности
                $entity_id=$option;
                $option='read';
            }
            // проверить является ли полученное значение option валидным
            if( $option!=='read' && $option!=='create'){
                $option='wrong';
            }
        }
    }
}
require_once  'controllers'. DIRECTORY_SEPARATOR . 'Controller.php';

if(!empty($url_segments)){
    $filename=NULL;
    // вызвать нужный контроллер
    if($entity){
        //echo "<div>entity = $entity</div>";
        $controller_name = ucfirst($entity) . 'Controller';
        $content = "<h1>Entity: " . $entity . "<hr/>"; //</h1>controller: $controller_name<HR>";
        // файл подключения выбранного контроллера
        $filename='app' . DIRECTORY_SEPARATOR .'controllers'. DIRECTORY_SEPARATOR . $controller_name . '.php';
        // нет такого файла
        if(!file_exists($droot.$filename)){
            $controller=false;
            $filename=false;
        }
        $option_state=false;
        if($option){
            if($option=='wrong')
                $filename=false;
            elseif($option)
                $option_state = "<h4>option = $option</h4><hr/>";
            $content.= $option_state;
        }

        if($filename===false)
            $filename=$droot.'404.php';
        require_once $filename;

        // контроллер существует
        if(class_exists($controller_name)){
            //$controller=new $controller_name();
            //==================================================
            //$content.= "<h3>Controller: $controller_name</h3>";

        }else
            $content.= "<h3>Контроллер $controller_name не найден</h3>";

    }else{
        $content = "<h1>No entity</h1>";
    }
    if(isset($entity_id)){
        $content.=  "<div>entity_id = $entity_id</div>";
    }
}
