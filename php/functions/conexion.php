<?php

function conectar()
{
    $servidor = 'localhost';
    $usuario = 'root';
    $clave = '';
    $bd = 'platoamigo';
    /*$servidor = 'localhost';
    $usuario = 'id21681721_root';
    $clave = 'Ejemplo123-';
    $bd = 'id21681721_labo2';*/

    set_error_handler(function() 
    {   throw new Exception("Error");
    });

    try {
        $conexion = mysqli_connect($servidor, $usuario, $clave, $bd);
    } catch(Exception $e) {
        $conexion = false;
        echo '<p>Error en la conexión, comuníquese con su Administrador.</p>';
    }

    return $conexion;
}

function desconectar($conexion) 
{
    if ($conexion) {
        mysqli_close($conexion);
    } else {
        echo '<p>No se pudo desconectar porque no hay conexión abierta.</p>';
    }
    
}

?>