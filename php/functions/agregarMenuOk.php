<?php
session_start();
if (!empty($_POST['nombrePlato']) && !empty($_POST['descripcion'])) {
    include 'conexion.php';
    $conexion = conectar();
    if ($conexion) {
        //guardo los datos en variables
        $nombrePlato = $_POST['nombrePlato'];
        $descripcion = $_POST['descripcion'];
        $id_localP = $_SESSION['id_local'];
        // Establezco la zona horaria de Buenos Aires
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fecha = date('Y-m-d H:i:s');
        //armo la consulta y guardo en la db
        $consulta = 'INSERT INTO platos(nombre, descripcion, fecha, id_localP) VALUES (?,?,?,?)';
        $sentencia = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($sentencia, 'sssi', $nombrePlato, $descripcion, $fecha, $id_localP);
        $q = mysqli_stmt_execute($sentencia);
        desconectar($conexion);
        if ($q) {
            header("refresh:1;url=../pages/publicaciones.php");
            $msj = '¡Plato cargado!';
            include '../pages/exito.php';
        } else {
            header("refresh:1;url=../pages/publicaciones.php");
            $msj = 'Fallo al cargar el plato, intente mas tarde.';
            include '../pages/fallo.php';
        }
    } else {
        //error en la conexion a la db
        header("refresh:1;url=../pages/publicaciones.php");
        $msj = 'Fallo al cargar el plato, intente mas tarde.';
        include '../pages/fallo.php';
    }
} else {
    header("refresh:0;url=../pages/agregarPlato.php");
}
?>