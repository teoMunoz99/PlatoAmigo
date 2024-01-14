<?php
session_start();
//verifico si el usuario esta logueado o no para mostrar las opciones en el navbar
if (isset($_SESSION['user'])) {
    $bandera = false;
} else {
    $bandera = true;
}
$ruta = '../../';
$color = '#0d6efd';
//$color = '#f9e6df';
$current_page = 'localesDisponibles';
require_once 'components/encabezado.php';
?>

<body class='bg-color'>
    <header>
        <?php require_once 'components/navbar.php'; ?>
    </header>
    <main class='container'>
        <!--Titulo-->
        <h2 class='text-center fs-1 fw-bold mt-4'>Locales disponibles</h2>
        <!--Agregar platos-->
        <?php
        if (isset($_SESSION['user'])) {
            ?>
            <section class="d-flex justify-content-center mt-3">
                <a href="agregarPlato.php" class='text-center text-decoration-none text-dark fw-bold'>
                    <div class='btn btn-success m-1 btn-p rounded-4 d-flex justify-content-center align-items-center'>
                        <i class="bi bi-plus icono-btn"></i>
                    </div>
                    Agregar
                </a>
            </section>
        <?php } ?>
        <!--Publicaciones-->
        <section class=''>
            <?php
            include '../functions/conexion.php';
            $conexion = conectar();

            if ($conexion) {
                $consultaP = 'SELECT id_plato, nombre, descripcion, fecha, id_localP FROM platos';
                $sentenciaP = mysqli_prepare($conexion, $consultaP);

                $qP = mysqli_stmt_execute($sentenciaP);

                if ($qP) {
                    mysqli_stmt_bind_result($sentenciaP, $id_plato, $nombreP, $descripcionP, $fecha, $id_localP);
                    mysqli_stmt_store_result($sentenciaP);

                    $cantidadP = mysqli_stmt_num_rows($sentenciaP);

                    if ($cantidadP > 0) {
                        while (mysqli_stmt_fetch($sentenciaP)) {
                            $consultaL = 'SELECT nombre, direccion, localidad, tipo FROM locales WHERE id_local = ?';
                            $sentenciaL = mysqli_prepare($conexion, $consultaL);

                            mysqli_stmt_bind_param($sentenciaL, 'i', $id_localP);
                            $qL = mysqli_stmt_execute($sentenciaL);

                            if ($qL) {
                                mysqli_stmt_store_result($sentenciaL);

                                $cantL = mysqli_stmt_num_rows($sentenciaL);

                                if ($cantL > 0) {
                                    mysqli_stmt_bind_result($sentenciaL, $nombreL, $direccionL, $localidadL, $tipo);
                                    mysqli_stmt_fetch($sentenciaL);
                                    include 'components/cardPlatos.php';
                                }

                                mysqli_stmt_free_result($sentenciaL);
                            }
                        }
                    } else {
                        echo '<p>No hay platos disponibles</p>';
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
    require_once 'components/pie.php';
    ?>