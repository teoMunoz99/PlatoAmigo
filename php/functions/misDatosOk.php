<?php
session_start();
if (!isset($_SESSION['user']) || empty($_POST)) {
  header('refresh:0;url=../index.php');
} else {
  include 'conexion.php';
  $conexion = conectar();
  if ($conexion) {
    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];
    $tipo = $_POST['tipo'];
    $consulta = 'UPDATE usuario SET usuario = ?, pass = ?, tipo = ? WHERE id_usuario = ?';
    $sentencia = mysqli_prepare($conexion, $consulta);
    mysqli_stmt_bind_param($sentencia, 'sssi', $usu, $pass, $tipo, $id);
    $estado = mysqli_stmt_execute($sentencia);
    if ($estado) {
      echo '<h3Actualizacion exitosa</h3>';
    }
  } else
    echo '<h1 class="text-center fs-3 fw-bold text-bg-danger py-3">Faltan datos del formulario</h1>';
  header('refresh:5, url=');
}