<?php
session_start();
if(!isset($_SESSION['user']) || empty($_GET)){
    header('refresh:0;url=../index.php');
}else{
    $ruta = '../../';
    $id = $_GET['id'];
    include 'conexion.php';
    $conexion = conectar();
    if($conexion){
        $consulta = 'DELETE FROM platos WHERE id_plato = ?';
        $sentencia = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($sentencia, 'i', $id);
        $result = mysqli_stmt_execute($sentencia);
        if($result){
            $resultado = 'Eliminacion exitosa!';
        }else{
            $resultado = 'Fallo en la eliminacion!';
        }
        desconectar($conexion);
    }
?>
<main class='d-flex justify-content-center align-items-center'>
    <h1><?php echo $resultado; ?></h1>
    <?php
    header('refresh:1;url=../pages/miPerfil.php');
    ?>
</main>
<?php
}
?>