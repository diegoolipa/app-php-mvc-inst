<?php

namespace app\controllers;

use app\db\ConexionDB;
use app\common\Response;
use app\models\MainModel;
use app\models\UsuarioModel;
use Exception;


class UsuarioController extends MainModel
{
    private $pdo;
    private $usuarioModel;

    public function __construct(){
        $this->pdo = ConexionDB::connect();
        $this->usuarioModel = new UsuarioModel($this->pdo);
    }

    public function listarUsuarios()
    {
        try {
            return $this->usuarioModel->listarUsuarios();
        }catch (Exception $e){
            return Response::errorResponse($e->getMessage());
        } finally {
            ConexionDB::disconnect();
        }
    }

    public function registrarUsuario()
    {
        $nombres = $this->limpiarCadena($_POST['usuario_nombre']);
        $apellidos = $this->limpiarCadena($_POST['usuario_apellido']);
        $usuario = $this->limpiarCadena($_POST['usuario_usuario']);
        $email = $this->limpiarCadena($_POST['usuario_email']);
        $clave_1 = $this->limpiarCadena($_POST['usuario_clave_1']);
        $clave_2 = $this->limpiarCadena($_POST['usuario_clave_2']);

        var_dump($nombres, $apellidos, $usuario, $email);

/*        return compact($nombres, $apellidos, $usuario, $email);*/

    }



}