<?php
$ruta = '../../';
$color = '#f9e6df';
require_once 'components/encabezado.php';
?>

<body class="bg-color">
    <main class="d-flex justify-content-center align-items-center container">
        <section class="text-center">
            <i class="bi bi-x-circle-fill icono-check text-danger"></i>
            <h1>
                <?php echo $msj; ?>
            </h1>
            <p class="text-secondary">(Espere a ser redireccionado...)</p>
        </section>
    </main>
</body>
<?php
include 'components/pie.php';
?>