<?php

namespace app\controllers;

use app\models\ViewsModel;

class ViewsController extends ViewsModel
{
    public function obtenerVistaController($url)
    {
        if ($url != ""){
            $respuesta = $this->obtenerVista($url);
        }else{
            $respuesta = 'login/login';
        }
        return $respuesta;
    }
}