<?php
$arr_uri=explode("/",$_SERVER['REQUEST_URI']); //echo "<pre>"; var_dump($arr_uri); echo "</pre>"; die();
// создать путь подключения файлов
$droot = "c:/WebServers/home/localhost/www/";

//$_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR;

//echo "<div>droot = $droot</div>"; //die();echo "<div>SITE_NAME = ".SITE_NAME."</div>";
//echo "<pre>" . __FILE__ . ':' . __LINE__ . '<br>';var_dump($arr_uri);echo "</pre>";
$key_site_name = array_search(SITE_NAME,$arr_uri); //echo "key_site_name = $key_site_name"; die();
if($key_site_name>1){
    $addUrlSegments=array(); // то, что будем добавлять к Url, если между HTTP_HOST и именем сайта есть ещё что-то
    $cnt=$key_site_name-1;
    while($cnt){
        $droot.= $arr_uri[$cnt] . DIRECTORY_SEPARATOR;
        $addUrlSegments[]=$arr_uri[$cnt];
        $cnt--;
    }
}
$droot.=SITE_NAME . DIRECTORY_SEPARATOR;
// получить сегменты URL
$url_segments=array_slice($arr_uri,$key_site_name+1);
//echo "<pre>" . __FILE__ . ':' . __LINE__ . '<br>';
//var_dump($url_segments);echo "</pre>";
// удалить все параметры GET
foreach ($url_segments as $i=>$segment) {
    if(strstr($segment,"?")||strstr($segment,"&")){
        $sep=strstr($segment,"?")? "?":"&";
        $s=explode($sep,$segment);
        unset($s[1]); // удалить всё после разделителя параметров
        $url_segments[$i]=$s[0]; // оставить то, что осталось слева (имеет смысл, если перед разделителем не было слэша)
        if($url_segments[$i]=='') // если осталась пустая строка (был слэш) - удалить элемент
            unset($url_segments[$i]);
    }
} // echo "<pre>"; var_dump($url_segments); echo "</pre>";
// создадим статический путь подключения файлов по http
$static_path='http://'.$_SERVER['SERVER_NAME'] ;
/*  echo "<pre>"; var_dump($_SERVER); echo "</pre>"; //die();
    echo('static_path = ' . $static_path . "<hr>"); //http://127.0.0.1/
    die('HOST_NAME = ' . $_SERVER['HOST_NAME']); */
// если в адресе есть порт, добавим его
if(strstr($_SERVER['HTTP_HOST'], ':'.$_SERVER['SERVER_PORT']))
    $static_path.= ':' . $_SERVER['SERVER_PORT'] . '/';
$static_path.='/';
if(isset($addUrlSegments))
    $static_path.=implode("/",$addUrlSegments).'/';
// добавим к статическому адресу имя сайта
$static_path.= SITE_NAME . '/static/';