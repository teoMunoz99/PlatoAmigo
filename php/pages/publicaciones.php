<?php
$ruta = '../../';
$color = '#0d6efd';
//$color = '#f9e6df';
require_once 'components/encabezado.php';
?>

<body class='bg-color'>
    <header>
        <?php require_once 'components/navbar.php'; ?>
    </header>
    <main class='container'>
        <!--Saludo de usuario-->
        <?php
        if (isset($_SESSION['user'])) {
            echo 'Hola: ' . $_SESSION['user'] . '';
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
        if (!isset($_SESSION['user'])) {
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
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </fieldset>
                    <button type="submit" class="btn btn-primary rounded-pill px-4"><i class="bi bi-search"></i></button>
                </form>
            </section>
        <?php } ?>
        <!--Agregar platos-->
        <?php
        if (isset($_SESSION['user'])) {
            ?>
            <section class="d-flex justify-content-center mt-3">
                <a href="error404.php" class='text-center text-decoration-none text-dark fw-bold'>
                    <div class='btn btn-success m-1 btn-p rounded-4 d-flex justify-content-center align-items-center'>
                        <i class="bi bi-plus icono-btn"></i>
                    </div>
                    Agregar
                </a>
            </section>
        <?php } ?>
        <!--Publicaciones-->
        <section class='mt-4'>
            <section>
                <?php require_once 'components/cardPlatos.php'; ?>
            </section>
        </section>
    </main>
    <?php
    require_once 'components/pie.php';
    ?>