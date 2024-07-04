<?php
namespace app\models;
class ViewsModel
{
    protected function obtenerVista($url)
    {
        $listaBlanca = array(
            'pages/principal',
            'usuario/crear_usuario',
            'usuario/listar_usuario',
            'usuario/buscar_usuario',
            'usuario/actualizar_usuario',
            'usuario/pdf_usuario',
            'usuario/excel_usuario',
        );
        if(in_array($url,$listaBlanca)){
            if(is_file("./app/views/pages/".$url.".php")){
                $contenido = "./app/views/pages/".$url.".php";
            }else{
                $contenido = "pages/404";
            }
        }elseif ($url == "login/login"){
            $contenido = "login/login";
        }else{
            $contenido = "pages/404";
        }
        return $contenido;
    }
}