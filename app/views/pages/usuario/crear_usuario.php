<?php

use app\db\ConexionDB;

$db = ConexionDB::connect();
if ($db){
    $sql = "select * from usuario";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $usuario = $stmt->fetchAll();

    var_dump($usuario);
}else{
    echo "error";
}


