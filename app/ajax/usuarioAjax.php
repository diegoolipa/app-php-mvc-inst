<?php
require_once "../../config/app.php";
require_once "../../autoload.php";

use app\controllers\UsuarioController;

if (isset($_POST['modulo_usuario'])){
    $usuarioController = new UsuarioController();

    if ($_POST['modulo_usuario'] == 'registrar'){
        echo $usuarioController->registrarUsuario();
    }

}