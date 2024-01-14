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
        <!--Publicaciones-->
        <section class='container'>
            <?php
            include '../functions/conexion.php';
            $conexion = conectar();

            if ($conexion) {
                $consultaL = 'SELECT id_local, nombre, direccion, localidad, cel, tipo FROM locales';
                $sentenciaL = mysqli_prepare($conexion, $consultaL);
                $q = mysqli_stmt_execute($sentenciaL);

                if ($q) {
                    mysqli_stmt_bind_result($sentenciaL, $id_local, $nombreL, $direccionL, $localidadL, $celL, $tipo);
                    mysqli_stmt_store_result($sentenciaL);
                    $cantL = mysqli_stmt_num_rows($sentenciaL);
                    if ($cantL > 0) {
                        while (mysqli_stmt_fetch($sentenciaL)) {
                            if($tipo != 'A'){
                            include 'components/cardLocales.php';
                            }
                        }
                    } else {
                        echo '<p>No hay locales disponibles</p>';
                    }

                    mysqli_stmt_free_result($sentenciaL);
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