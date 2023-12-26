<?php
$ruta = '../';
$color = '#f9e6df';
require_once 'encabezado.php';
?>

<body class="bg-color">
    <main class="d-flex flex-column justify-content-center align-items-center container">
        <section class="text-center">
            <figure class='container'>
                <img src="../img/otros/error.png" class="w-100" alt="">
                <p class="text-secondary">Estamos trabajando en esto...</p>
            </figure>
        </section>
        <section class='text-center mt-5'>
            <a href="../php/publicaciones.php"><i class="bi bi-arrow-left-circle-fill icono-check text-primary"></i></a>
            <p class='text-secondary'>Voler a navegar</p>
        </section>
    </main>
</body>
<?php
include 'pie.php';
?>