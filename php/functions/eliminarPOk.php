<?php
session_start();
if (!isset($_SESSION['user']) || empty($_GET)) {
    header('refresh:0;url=../index.php');
} else {
    $ruta = '../../';
    $id = $_GET['id'];
    include 'conexion.php';
    $conexion = conectar();
    if ($conexion) {
        $consulta = 'DELETE FROM platos WHERE id_plato = ?';
        $sentencia = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($sentencia, 'i', $id);
        $result = mysqli_stmt_execute($sentencia);
        if ($result) {
            $resultado = 'Eliminacion exitosa!';
        } else {
            $resultado = 'Fallo en la eliminacion!';
        }
        desconectar($conexion);
    }
    ?>
    <?php
    header('refresh:1;url=../pages/miPerfil.php');
    $msj = $resultado;
    include '../pages/exito.php';
    ?>
    <?php
}
?>