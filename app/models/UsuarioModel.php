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

    public function validarEmail($email){
        try {
            $sql = "select email from usuario where email = :email";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            throw new Exception("Error al optener el email " .$e->getMessage() );
        }
    }

    public function regisrarUsuario($nombres, $apellidos,
                                    $email, $clave, $usuario,
                                    $foto)
    {
        try {
            $sql = "insert into usuario 
                    (nombres, apellidos, email, clave, usuario, foto) 
                    values(:nombres, :apellidos, :email, :clave, :usuario, :foto)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':nombres', $nombres);
            $stmt->bindParam(':apellidos', $apellidos);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':clave', $clave);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':foto', $foto);
            return $stmt->execute();
        }catch (PDOException $e){
            throw new Exception("Error al registrar usuario " .$e->getMessage() );
        }
    }
}