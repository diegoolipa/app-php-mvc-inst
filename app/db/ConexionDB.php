<?php

namespace app\db;
require_once __DIR__."/../../config/server.php";

use app\common\Response;
use PDO;
use PDOException;
class ConexionDB
{
    private static $cont = null;

    public static function connect()
    {
        if (self::$cont == null){
            try {
                self::$cont = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
                self::$cont = exec("SET CHARACTER SET utf8");
            }catch (PDOException $e){
                return Response::errorResponse("Error en la conexión ". $e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }
}