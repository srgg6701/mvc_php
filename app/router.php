<?php
// путь подключения статических файлов (js,css,images)
$static_path='http://'.$_SERVER['SERVER_NAME'] ;
//echo "<pre>"; var_dump($_SERVER); echo "</pre>"; //die();
//echo('static_path = ' . $static_path . "<hr>"); //http://127.0.0.1/
//die('HOST_NAME = ' . $_SERVER['HOST_NAME']);
if(strstr($_SERVER['HTTP_HOST'], ':'.$_SERVER['SERVER_PORT']))
    $static_path.= ':' . $_SERVER['SERVER_PORT'] . '/';
$static_path.='/';
if(strstr($_SERVER['REQUEST_URI'], '/projects/')){
    $static_path.='projects/';
    $segment_index='1';
}else
    $segment_index='0';
$static_path.= SITE_NAME . '/static/';
//die('static_path = ' . $static_path);
// authors/         - список
// authors/[id]     - данные сущности по id
// authors/create   - форма добавления сущности
if(!empty($url_segments)
    &&isset($url_segments[$segment_index])){
    echo "<pre>"; var_dump($url_segments); echo "</pre>"; //die();
    $entity=$url_segments[$segment_index];
    // назначить опцию по умолчанию (если второго сегмента нет)
    if(!$option=trim($url_segments[$segment_index+1])) // /[authors/articles/readers]/
        $option='read';
    // проверить, есть ли в адресе id
    if(!preg_match('/[^\d]/',$option)) { // получили id cущности
        $entity_id=$option;
        $option='read';
    }
    // проверить является ли полученное значение option валидным
    if( $option && $option!=='read' && $option!=='create'){
        $option='wrong';
    }
}