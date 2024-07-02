<?php

namespace app\controllers;

use app\db\ConexionDB;
use app\common\Response;
use app\models\UsuarioModel;
use Exception;


class UsuarioController
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


}