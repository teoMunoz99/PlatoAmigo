<?php
session_start();
if (!isset($_SESSION['user']) || empty($_POST['nombrePlato']) || empty($_POST['descripcion'])) {
  include '../pages/error404.php';
  header('refresh:0;url=../pages/editarPlato.php');
} else {
  $id_plato = $_POST['id_plato'];
  include 'conexion.php';
  $conexion = conectar();
  if ($conexion) {
    $nombre = $_POST['nombrePlato'];
    $descripcion = $_POST['descripcion'];
    $consulta = 'UPDATE platos SET nombre = ?, descripcion = ?  WHERE id_plato = ?';
    $sentencia = mysqli_prepare($conexion, $consulta);
    mysqli_stmt_bind_param($sentencia, 'ssi', $nombre, $descripcion, $id_plato);
    $estado = mysqli_stmt_execute($sentencia);
    if ($estado) {
      header('refresh:1;url=../pages/miPerfil.php');
      include '../pages/mensajes/actualizacionExitosa.php';
    }
  } else {
    header('refresh:5;url=../pages/miPerfil.php');
    include '../pages/mensajes/actualizacionFallida.php';
  }
}
?>