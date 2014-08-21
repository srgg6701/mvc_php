<?php
if($_POST){
    echo "<pre>" . __FILE__ . ':' . __LINE__ . '<br>';
    var_dump($_POST);
    echo "</pre>";
}else{
    // переходим к сути
    $entity = $entity_id=NULL;
    if(!empty($url_segments) && isset($url_segments[0])){
        $entity=$url_segments[0];
        // назначить опцию по умолчанию (если второго сегмента нет)
        if(!isset($url_segments[1]))
            $option='read';
        else{
            if(!$option=trim($url_segments[1])) // /[authors/articles/readers]/
            $non_digital=preg_match("/\D/i",$option);
            // проверить, есть ли в адресе id
            if(!$non_digital) { // получили id cущности
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
        $controller_name = ucfirst($entity) . 'Controller';
        $content = "<h1>Entity: " . $entity."</h1>"; //<h2>Calling controller: $controller_name<h2>
        // файл подключения выбранного контроллера
        $filename='app' . DIRECTORY_SEPARATOR .'controllers'. DIRECTORY_SEPARATOR . $controller_name . '.php';
        // нет такого файла
        if(!file_exists($droot.$filename)){
            $content.="<div class='orange'>Неправильный путь подключения файла контроллера: "
                 . $droot.$filename . "</div>";
            $controller=false;
            $filename=false;
        }
        $option_state=false;
        if($option){
            if($option=='wrong')
                $filename=false;
            elseif($option)
                $option_state = "<h2>option = $option</h2>";
        }

        if($option_state) $content.= $option_state;

        if(isset($entity_id)){
            $content.=  "<h3>entity_id = $entity_id</h3>";
        }

        if($filename===false)
            $filename=$droot.'404.php';
        require_once $filename;

        // контроллер существует
        if(class_exists($controller_name)){
            // СОЗДАТЬ ЭКЗЕМПЛЯР КОНТРОЛЛЕРА
            $controller=new $controller_name($option,$entity_id);
            $content.=$controller->content;
        }else
            $content.= "<h3>Контроллер $controller_name не найден</h3>";

    }else{
        $content = "<h1>No entity</h1>";
    }
}
