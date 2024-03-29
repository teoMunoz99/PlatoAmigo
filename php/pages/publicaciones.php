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
$current_page = 'publicaciones';
require_once 'components/encabezado.php';
?>

<body class='bg-color'>
    <header>
        <?php require_once 'components/navbar.php'; ?>
    </header>
    <main class='container'>
        <!--Saludo al user-->
        <?php
        include '../functions/conexion.php';
        if(!$bandera){
            $conexion1 = conectar();
            if ($conexion1) {
                // Recolecto los datos del usuario
                $consulta = "SELECT nombre FROM locales WHERE id_local=?";
                $sentencia = mysqli_prepare($conexion1, $consulta);
                mysqli_stmt_bind_param($sentencia, 'i', $_SESSION['id_local']);
                $q = mysqli_stmt_execute($sentencia);
                mysqli_stmt_bind_result($sentencia, $nombre);
                if ($q) {
                    mysqli_stmt_fetch($sentencia);
                    desconectar($conexion1);
                    // Muestro el formulario
                    echo '<p>Hola:'. $nombre.'</p>';
                }
            }
        }
        ?>
        <!--Banner-->
        <section class='mt-3'>
            <?php require_once 'components/banner.php'; ?>
        </section>
        <!--Botones principales-->
        <section class="mt-3">
            <?php require_once 'components/botonesPrincipales.php'; ?>
        </section>
        <!--Objetivo semanal-->
        <section class='mt-3'>
            <?php require_once 'components/objetivosSemanales.php'; ?>
        </section>
        <!--Titulo-->
        <h2 class='text-center fs-1 fw-bold mt-4'>Platos disponibles</h2>
        <!--Filtros (no mostrar si esta logueado)-->
        <?php
        /*if (!isset($_SESSION['user'])) {
            ?>
            <section class='mt-3'>
                <h5 class="fw-bold"><i class="bi bi-geo-alt-fill"></i> Filtrar por ubicacion</h5>
                <form class="d-flex" action="" method="get">
                    <fieldset>
                        <div class="me-2">
                            <select class="form-select rounded-pill py-3" id="ubi" name="zona"
                                aria-label="Default select example">
                                <option value="1">San Miguel de Tucumán</option>
                                <option value="2">Yerba Buena</option>
                                <option value="Aguilares">Aguilares</option>
                                <option value="Alderetes">Alderetes</option>
                                <option value="Banda del Río Salí">Banda del Río Salí</option>
                                <option value="Bella Vista">Bella Vista</option>
                                <option value="Burruyacú">Burruyacú</option>
                                <option value="Concepción">Concepción</option>
                                <option value="Famaillá">Famaillá</option>
                                <option value="Graneros">Graneros</option>
                                <option value="Juan Bautista Alberdi">Juan Bautista Alberdi</option>
                                <option value="La Cocha">La Cocha</option>
                                <option value="Las Talitas">Las Talitas</option>
                                <option value="Lules">Lules</option>
                                <option value="Monteros">Monteros</option>
                                <option value="Simoca">Simoca</option>
                                <option value="Tafí del Valle">Tafí del Valle</option>
                                <option value="Tafí Viejo">Tafí Viejo</option>
                                <option value="Trancas">Trancas</option>
                            </select>
                        </div>
                    </fieldset>
                    <button type="submit" class="btn btn-primary rounded-pill px-4"><i class="bi bi-search"></i></button>
                </form>
            </section>
        <?php }*/?>

        <!--Publicaciones-->
        <section class=''>
            <?php
            //include '../functions/conexion.php';

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