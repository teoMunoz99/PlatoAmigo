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
            <h2 class='fw-bold text-center'>Mis publicaciones</h2>
            <!--Publicaciones-->
            <section class='container'>
                <?php
                include '../functions/conexion.php';

                $conexion = conectar();

                if ($conexion) {
                    $consultaP = 'SELECT id_plato, nombre, descripcion, fecha, id_localP FROM platos WHERE id_localP = ?';
                    $sentenciaP = mysqli_prepare($conexion, $consultaP);
                    mysqli_stmt_bind_param($sentenciaP, 'i', $_SESSION['id_local']);
                    $qP = mysqli_stmt_execute($sentenciaP);

                    if ($qP) {
                        mysqli_stmt_bind_result($sentenciaP, $id_plato, $nombreP, $descripcionP, $fecha, $id_localP);
                        mysqli_stmt_store_result($sentenciaP);

                        $cantidadP = mysqli_stmt_num_rows($sentenciaP);

                        if ($cantidadP > 0) {
                            while (mysqli_stmt_fetch($sentenciaP)) {
                                $consultaL = 'SELECT nombre, direccion, localidad FROM locales WHERE id_local = ?';
                                $sentenciaL = mysqli_prepare($conexion, $consultaL);

                                mysqli_stmt_bind_param($sentenciaL, 'i', $id_localP);
                                $qL = mysqli_stmt_execute($sentenciaL);

                                if ($qL) {
                                    mysqli_stmt_store_result($sentenciaL);

                                    $cantL = mysqli_stmt_num_rows($sentenciaL);

                                    if ($cantL > 0) {
                                        mysqli_stmt_bind_result($sentenciaL, $nombreL, $direccionL, $localidadL);
                                        mysqli_stmt_fetch($sentenciaL);
                                        ?>
                                        <article class="card rounded-5 p-2 my-3">
                                            <div class="card-body d-flex">
                                                <div class='w-100 me-4'>
                                                    <h5 class="card-title">
                                                        <?php echo $nombreP; ?>
                                                    </h5>
                                                    <p class="card-text">
                                                        <?php echo $descripcionP; ?>
                                                    </p>
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item"><span class='text-secondary'>Local:</span>
                                                            <?php echo $nombreL; ?>
                                                        </li>
                                                        <li class="list-group-item"><span class='text-secondary'>Direccion:</span>
                                                            <?php echo $direccionL . ', ' . $localidadL; ?>
                                                        </li>
                                                        <li class="list-group-item"><span class='text-secondary'>Hora:</span>
                                                            <?php echo $fecha; ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class='d-flex'>
                                                    <a href="eliminarP.php?id=<?php echo $id_plato; ?>" class=""><i
                                                            class="bi bi-x-circle-fill fs-1 me-2 text-danger"></i></a>
                                                    <a href="editarPlato.php?id=<?php echo $id_plato; ?>" class=""><i class="bi bi-pencil-square fs-1 text-warning"></i></a>
                                                </div>
                                            </div>
                                        </article>
                                        <?php
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
}
require_once 'components/pie.php';
?>