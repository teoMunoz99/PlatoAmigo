<?php
session_start();
if (!empty($_POST['nombrePlato']) && !empty($_POST['descripcion']) && !empty($_POST['precio'])) {
    include 'conexion.php';
    $conexion = conectar();
    if ($conexion) {
        //guardo los datos en variables
        $nombre = $_POST['nombrePlato'];
        $descripcion = $_POST['descripcion'];
        $precio = floatval($_POST['precio']);;
        $id_local = $_SESSION['id_local'];
        $estado = 'D'; // disponible
        //armo la consulta y guardo en la db
        $consulta = 'INSERT INTO menu_locales(id_local, nombre, descripcion, precio, estado) VALUES (?,?,?,?,?)';
        $sentencia = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($sentencia, 'issds', $id_local, $nombre, $descripcion, $precio, $estado);
        $q = mysqli_stmt_execute($sentencia);
        desconectar($conexion);
        if ($q) {
            header("refresh:1;url=../pages/miMenu.php");
            $msj = '¡Menu cargado!';
            include '../pages/exito.php';
        } else {
            header("refresh:1;url=../pages/publicaciones.php");
            $msj = 'Fallo al cargar el menu, intente mas tarde.';
            include '../pages/fallo.php';
        }
    } else {
        //error en la conexion a la db
        header("refresh:1;url=../pages/agregarMenu.php");
        $msj = 'Fallo al cargar el plato, intente mas tarde.';
        include '../pages/fallo.php';
    }
} else {
    header("refresh:0;url=../pages/agregarPlato.php");
}
?>