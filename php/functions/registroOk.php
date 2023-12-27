<?php
if (!empty($_POST['nombre']) && !empty($_POST['direccion']) && !empty($_POST['localidad']) && !empty($_POST['telefono']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    header('refresh:1;url=../pages/publicaciones.php');
    require_once '../pages/exito.php';
} else {
    header('refresh:1;url=../../index.php');
    require_once 'fallo.php';
}
