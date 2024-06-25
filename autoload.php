<?php
<<<<<<< HEAD
spl_autoload_register(function ($clase){
    $archivo = __DIR__."/".$clase.".php" ;
    $archivo = str_replace("\\","/",$archivo);

    if (is_file($archivo)){
        require_once $archivo;
    }
});
=======
>>>>>>> bf32d17aa21d031584ac0f980c4a5a0fb813f335
