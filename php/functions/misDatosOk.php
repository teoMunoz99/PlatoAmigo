<?php
session_start();
if (!isset($_SESSION['user']) || empty($_POST)) {
  header('refresh:0;url=../index.php');
} else {
  $id_local = $_SESSION['id_local'];
  include 'conexion.php';
  $conexion = conectar();
  if ($conexion) {
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $localidad = $_POST['localidad'];
    $cel = $_POST['telefono'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $consulta = 'UPDATE locales SET nombre = ?, direccion = ?, localidad = ?, cel = ?, correo = ?, pass = ?  WHERE id_local = ?';
    $sentencia = mysqli_prepare($conexion, $consulta);
    mysqli_stmt_bind_param($sentencia, 'ssssssi', $nombre, $direccion, $localidad, $cel, $email, $pass, $id_local);
    $estado = mysqli_stmt_execute($sentencia);
    if ($estado) {
      header('refresh:1;url=../pages/publicaciones.php');
      $msj = '¡Datos actualizados!';
      include '../pages/exito.php';
    }
  } else {
    header('refresh:5;url=../pages/misDatos.php');
    $msj = 'Fallo al actualizar datos, intente mas tarde';
    include '../pages/fallo.php';
  }
}
?>