<?php
session_start();
//verifico si es que el usuario ya esta logueado
if (!isset($_SESSION['user'])) {
    include 'error404.php';
    header('refresh:0;url=logueo.php');
} else {
    $bandera = false;
    $ruta = '../../';
    $color = '#0d6efd';
    $current_page = 'miPerfil';
    require_once 'components/encabezado.php';
    ?>

    <body class="bg-color">
        <header>
            <?php require_once 'components/navbar.php'; ?>
        </header>
        <main class="d-flex flex-column">
            <h2 class='fw-bold text-center'>Mi menú</h2>
            <!--Agregar platos-->
            <?php
            if (isset($_SESSION['user'])) {
                ?>
                <section class="d-flex justify-content-center mt-3">
                    <a href="agregarMenu.php" class='text-center text-decoration-none text-dark fw-bold'>
                        <div class='btn btn-success m-1 btn-p rounded-4 d-flex justify-content-center align-items-center'>
                            <i class="bi bi-plus icono-btn"></i>
                        </div>
                        Agregar
                    </a>
                </section>
            <?php } ?>
            <!--Publicaciones-->
            <section class='container'>
                <?php
                include '../functions/conexion.php';

                $conexion = conectar();

                if ($conexion) {
                    $consultaP = 'SELECT nombre, descripcion, precio, estado FROM menu_locales WHERE id_local = ?';
                    $sentenciaP = mysqli_prepare($conexion, $consultaP);
                    mysqli_stmt_bind_param($sentenciaP, 'i', $_SESSION['id_local']);
                    $qP = mysqli_stmt_execute($sentenciaP);

                    if ($qP) {
                        mysqli_stmt_bind_result($sentenciaP, $nombreP, $descripcionP, $precio, $estado);
                        mysqli_stmt_store_result($sentenciaP);

                        $cantidadP = mysqli_stmt_num_rows($sentenciaP);

                        if ($cantidadP > 0) {
                            while (mysqli_stmt_fetch($sentenciaP)) {
                                ?>
                                <!--Dibujar card menu-->
                                <?php
                            }
                        } else {
                            echo '<p>No hay platos en tu menú</p>';
                        }

                        mysqli_stmt_free_result($sentenciaP);
                    }

                    mysqli_close($conexion);
                } else {
                    echo 'Error en la conexión a la base de datos';
                }
                ?>
            </section>
        </main>
        <?php
}
require_once 'components/pie.php';
?>