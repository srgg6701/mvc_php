<?php
$content='';
// установить имя сайта
require_once 'app/config.php';
require_once 'app/controller.php';
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
            </section>
        </main>
    </div>
    <footer>
        <div id="footer">Footer</div>
    </footer>
</div>
</body>
</html>