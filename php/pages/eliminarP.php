<?php
session_start();
if (!isset($_SESSION['user']) || empty($_GET['id'])) {
    include 'error404.php';
    header('refresh:0;url=miPerfil.php');
} else {
    $id = $_GET['id'];
    $ruta = '../../';
    require_once 'components/encabezado.php';
    
    include '../functions/conexion.php';
    $conexion = conectar();
    if($conexion){
        $consulta = 'SELECT nombre FROM platos WHERE id_plato = ?';
        $sentencia = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($sentencia, 'i', $id);
        mysqli_stmt_execute($sentencia);
        mysqli_stmt_bind_result($sentencia, $usu);
        mysqli_stmt_fetch($sentencia);
        desconectar($conexion);
    }
    ?>
    <main class="d-flex justify-content-center align-items-center">
        <section class='border border-3 rounded'>
            <h5 class="mb-5 m-2">Esta apunto de ELIMINAR a: <?php echo $usu;?> </h5>
            <section class="m-3 d-flex justify-content-center">
                <a class="btn btn-danger m-1" href="../functions/eliminarPOk.php?id=<?php echo $id;?>">aceptar</a>
                <a class="btn btn-success m-1" href="miPerfil.php">cancelar</a>     
            </section>
        </section>
    </main>
    <?php
}
require_once 'components/pie.php';
?>