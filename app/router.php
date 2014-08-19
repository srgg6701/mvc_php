<?php
// создать путь подключения файлов
$droot = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR;
$key_site_name = array_search(SITE_NAME,$arr_uri); //echo "key_site_name = $key_site_name"; die();
if($key_site_name==2)
    $droot.= 'projects' . DIRECTORY_SEPARATOR;
$droot.=SITE_NAME . DIRECTORY_SEPARATOR;

// получить сегменты URL
$url_segments=array_slice($arr_uri,$uri_index+1);
$static_path='http://'.$_SERVER['SERVER_NAME'] ;
/*  echo "<pre>"; var_dump($_SERVER); echo "</pre>"; //die();
    echo('static_path = ' . $static_path . "<hr>"); //http://127.0.0.1/
    die('HOST_NAME = ' . $_SERVER['HOST_NAME']); */
if(strstr($_SERVER['HTTP_HOST'], ':'.$_SERVER['SERVER_PORT']))
    $static_path.= ':' . $_SERVER['SERVER_PORT'] . '/';
$static_path.='/';

if(strstr($_SERVER['REQUEST_URI'], '/projects/'))
    $static_path.='projects/';

$static_path.= SITE_NAME . '/static/';
// authors/         - список
// authors/[id]     - данные сущности по id
// authors/create   - форма добавления сущности
//echo "<pre>"; var_dump($url_segments); echo "</pre>";
if(!empty($url_segments)
    && isset($url_segments[0])){
     //die();
    $entity=$url_segments[0]; echo "<h3>".ucfirst($entity)."</h3>";
    // назначить опцию по умолчанию (если второго сегмента нет)
    if(isset($url_segments[1])){
        if(!$option=trim($url_segments[1])) // /[authors/articles/readers]/
            $option='read';
        // проверить, есть ли в адресе id
        if(!preg_match('/[^\d]/',$option)) { // получили id cущности
            $entity_id=$option;
            $option='read';
        } echo "<div>option = $option</div>";
        // проверить является ли полученное значение option валидным
        if( $option!=='read' && $option!=='create'){
            $option='wrong';
        }
    }else
        $option=false;
}