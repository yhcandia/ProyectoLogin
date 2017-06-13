<?php

include '../librerias.php';
session_start();

$oUsu=new Usuario($_REQUEST["nomusuario"],$_REQUEST["clave"]);

if ($oUsu->VerificaUsuarioClave()){
    echo "Todo bien";
     $_SESSION["usuarioSession"]=$oUsu->nombre;
}else{
    echo "<b>Todo mal</b>";
}
