<?php
header('Content-Type: charset=utf-8');
$content='';
// установить имя сайта
require_once 'app/config.php';
require_once 'app/controller.php'; //
?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link media="screen, projection" rel="stylesheet" type="text/css" href="<?php echo $static_path;?>css/default.css">
    <!--<script src="/.js"></script>-->
</head>
<body>
<div id="container">
    <div id="main">
        <nav>
            <div id="nav">Navigation</div>
        </nav>
        <main>
            <section>
                <?php echo $content;?>
<?php
                $controller=new $controller_name();
                //==================================================
                $content.= "<h3>Controller: $controller_name</h3>";
                echo "<div class='info'>Вызов статического метода через экземпляр класса: <div>";
                $controller->testStatic();
                echo "OK</div></div>";
                echo "<div class='info'>Вызов статической переменной через экземпляр класса: ";
                echo "<div>state: ".$controller->state."</div>";
                echo "</div>";
                echo "<div>state: ".TestController::$state."</div>";
?>
            </section>
        </main>
    </div>
    <footer>
        <div id="footer">Footer</div>
    </footer>
</div>
</body>
</html>