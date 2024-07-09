<?php
    require_once "./autoload.php";
    require_once "./config/app.php";
    require_once "./config/server.php";
    require_once "./app/views/inc/sessionStart.php";

    if (isset($_GET['url'])){ //usuario/actualizar_usuario/1
        //$url_vista = $_GET['url'];
        $url_vista = explode("/",$_GET['url']);
    }else{
        $url_vista = ['login','login'];
    }

    //var_dump($url_vista);

?>
<!doctype html>
<html lang="en" data-theme="light">
<head>
    <?php include("./app/views/inc/head.php")?>
</head>
<body>

    <?php
    use app\controllers\ViewsController;

    $viewsController = new ViewsController();
    $url = $viewsController->obtenerVistaController($url_vista[0]."/".$url_vista[1]);
    if ($url == 'login/login' || $url == 'pages/404'){
        require_once "./app/views/pages/".$url.".php";
    }else{
        include_once("./app/views/inc/nav.php");
        include_once("./app/views/inc/aside.php");
        ?>
        <div class="main-content pt-6 mt-4">
            <main>
                <div class="container is-fluid ">
                    <?php
                        require_once $url;
                    ?>
                </div>
            </main>
        </div>
        <?php
    }
    ?>
</body>
</html>
<?php require_once "./app/views/inc/script.php";?>