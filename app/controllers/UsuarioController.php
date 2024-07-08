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

        try {
            #Validación de campos obligatorios
            if ($nombres=="" || $apellidos=="" || $usuario==""){
                return Response::errorResponse('No has rellenado los campos requeridos');
            }

            #Validación de claves
            if ($clave_1 != $clave_2){
                return Response::errorResponse("Las claves no coinciden");
            }else{
                #Encriptando la contraseña o clave
                $clave = password_hash($clave_1,PASSWORD_BCRYPT, ["cost"=>10]);
            }

            #Validación con Expresiones regulares
            if ($this->verificarDatos("[a-zA-Z0-9.-]{3,50}",$clave_1) || $this->verificarDatos("[a-zA-Z0-9.-]{3,50}",$clave_2)){
                return Response::errorResponse("La clave no coincide con el formato correcto ");
            }

            #Validación de Email
            if($email != ""){
                if (filter_var($email,FILTER_VALIDATE_EMAIL)){
                    $validaEmail = $this->usuarioModel->validarEmail($email);
                    if ($validaEmail){
                        return Response::errorResponse("El Email ya existe");
                    }
                }
            }

            # Directorio de imagenes #
            $img_dir = "../views/img/fotos/";
            # Comprobar si se selecciono una imagen #
            if ($_FILES['usuario_foto']['name'] != "" && $_FILES['usuario_foto']['size'] > 0) {

                # Creando directorio #
                if (!file_exists($img_dir)) {
                    if (!mkdir($img_dir, 0777)) {
                        return Response::errorResponse("Error al crear el directorio");
                    }
                }

                # Verificando formato de imagenes #
                if (mime_content_type($_FILES['usuario_foto']['tmp_name']) != "image/jpeg" && mime_content_type($_FILES['usuario_foto']['tmp_name']) != "image/png") {
                    return Response::errorResponse("La imagen que ha seleccionado es de un formato no permitido");
                }

                # Verificando peso de imagen #
                if (($_FILES['usuario_foto']['size'] / 1024) > 5120) {
                    return Response::errorResponse("La imagen que ha seleccionado supera el peso permitido");
                }

                    # Nombre de la foto #
                $foto = str_ireplace(" ", "_", $nombres);  //nombr edel usuario
                $foto = $foto . "_" . rand(0, 100);

                # Extension de la imagen #
                switch (mime_content_type($_FILES['usuario_foto']['tmp_name'])) {
                    case 'image/jpeg':
                        $foto = $foto . ".jpg";
                        break;
                    case 'image/png':
                        $foto = $foto . ".png";
                        break;
                }
                chmod($img_dir, 0777);

                # Moviendo imagen al directorio #
                if (!move_uploaded_file($_FILES['usuario_foto']['tmp_name'], $img_dir . $foto)) {
                    return Response::errorResponse("No podemos subir la imagen al sistema en este momento");
                }
            } else {
                $foto = "";
            }

            $resultado = $this->usuarioModel->regisrarUsuario($nombres,
                $apellidos, $email, $clave,$usuario,$foto);
            if ($resultado){
                return Response::successResponse("El usuario ".$nombres." se ha registrado correctamente");
            }else{
                return Response::errorResponse("El usuario ".$nombres." no se ha registrado");
            }
        }catch (Exception $e){
            return Response::errorResponse($e->getMessage());
        } finally {
            ConexionDB::disconnect();
        }
    }
}