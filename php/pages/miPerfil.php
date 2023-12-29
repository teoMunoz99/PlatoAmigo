<?php
session_start();
//verifico si es que el usuario ya esta logueado
if (!isset($_SESSION['user'])) {
    header('refresh:0;url=logueo.php');
}
$ruta = '../../';
$color = '#0d6efd';
require_once 'components/encabezado.php';
?>

<body class="bg-color">
    <main class="d-flex flex-column">
        <!--Titulo-->
        <a href="../../index.php" class='text-decoration-none'>
            <h1 class='fw-bold text-center bg-primary text-white p-3 rounded-5 rounded-top-0'><i
                    class="bi bi-suit-heart-fill text-danger"></i> PlatoAmigo</h1>
        </a>
        <h2 class='fw-bold text-center'>Mis publicaciones</h2>

    </main>
    <?php
    require_once 'components/pie.php';
    ?>