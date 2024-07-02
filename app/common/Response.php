<?php

namespace app\common;

class Response
{
    public static function errorResponse($sms)
    {
        $response=[
            'alert' => 'Json',
            'tipo' => 'simple',
            'titulo' => 'Ocurrió un error inesperado',
            'texto' => $sms,
            'icono' => 'error'
        ];
        return json_encode($response);
    }

    public static function successResponse($sms)
    {
        $response=[
            'alert' => 'Json',
            'tipo' => 'simple',
            'titulo' => 'Operación exitosa',
            'texto' => $sms,
            'icono' => 'success'
        ];
        return json_encode($response);
    }
}