<?php

namespace app\models;
use PDO;
use Exception;
use PDOException;
use app\common\Response;

class UsuarioModel
{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function listarUsuarios()
    {
        try {
            $sql = "select * from usuario";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            throw new Exception("Error al listar los usuarios" .$e->getMessage() );
        }
    }

}