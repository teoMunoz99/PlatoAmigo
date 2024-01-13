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
        mysqli_stmt_bind_result($sentencia, $nombrePlato);
        mysqli_stmt_fetch($sentencia);
        desconectar($conexion);
    }
    ?>
    <body class='bg-color'>
    <main class="container d-flex justify-content-center align-items-center">
        <section class='border border-3 rounded-5 p-3 bg-white'>
            <h5 class="mb-5 m-2">¿Desea eliminar: "<span class='text-danger'><?php echo $nombrePlato;?></span>" ?</h5>
            <section class="m-3 d-flex justify-content-center">
                <a class="btn btn-danger m-1" href="../functions/eliminarPOk.php?id=<?php echo $id;?>">Aceptar</a>
                <a class="btn btn-warning m-1" href="miPerfil.php">Cancelar</a>     
            </section>
        </section>
    </main>
    <?php
}
require_once 'components/pie.php';
?>