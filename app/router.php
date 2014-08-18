<?php
// путь подключения статических файлов (js,css,images)
$static_path='http://'.$_SERVER['SERVER_NAME'] . '/' . SITE_NAME . '/static/';
// authors/         - список
// authors/[id]     - данные сущности по id
// authors/create   - форма добавления сущности
if(!empty($url_segments)){
    $entity=$url_segments[0];
    // назначить опцию по умолчанию (если второго сегмента нет)
    if(!$option=trim($url_segments[1])) // /[authors/articles/readers]/
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