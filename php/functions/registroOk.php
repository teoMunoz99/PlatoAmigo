<?php
if (!empty($_POST['nombre']) && !empty($_POST['direccion']) && !empty($_POST['localidad']) && !empty($_POST['telefono']) && !empty($_POST['email']) && !empty($_POST['password'])) {

    //guardo los datos en la bd
    include 'conexion.php';
    $conexion = conectar();
    if ($conexion) {
        //guardo los datos que llegaron
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $localidad = $_POST['localidad'];
        $cel = $_POST['telefono'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $consulta = 'INSERT INTO locales(nombre, direccion, localidad, cel, correo, pass) VALUES(?,?,?,?,?,?)';
        $sentencia = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($sentencia, 'ssssss', $nombre, $direccion, $localidad, $cel, $email, $pass);
        $q = mysqli_stmt_execute($sentencia);
        if ($q) {
            header('refresh:1;url=../pages/publicaciones.php');
            require_once '../pages/exito.php';
        } else {
            header('refresh:1;url=../../index.php');
            require_once 'fallo.php';
        }
    } else {
        header('refresh:1;url=../../index.php');
        require_once 'fallo.php';
    }
} else {
    header('refresh:1;url=../../index.php');
    require_once 'fallo.php';
}
