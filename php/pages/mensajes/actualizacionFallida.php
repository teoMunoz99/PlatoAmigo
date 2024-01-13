<?php
$ruta = '../../';
$color = '#f9e6df';
require_once __DIR__ . '/../components/encabezado.php'; // Usar __DIR__ para obtener la ruta actual del archivo
?>
<body class="bg-color">
    <main class="d-flex justify-content-center align-items-center container">
        <section class="text-center">
            <i class="bi bi-x-circle-fill icono-check text-danger"></i>
            <h1>Fallo al actualizar datos, intente mas tarde</h1>
            <p class="text-secondary">(Espere a ser redireccionado...)</p>
        </section>
    </main>
</body>
<?php
include __DIR__ . '/../components/pie.php'; // Usar __DIR__ para obtener la ruta actual del archivo
?>
