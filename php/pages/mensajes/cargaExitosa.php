<?php
$ruta = '../../';
$color = '#f9e6df';
require_once __DIR__ . '/../components/encabezado.php'; // Usar __DIR__ para obtener la ruta actual del archivo
?>
<body class="bg-color">
    <main class="d-flex justify-content-center align-items-center container">
        <section class="text-center">
            <i class="bi bi-check-circle-fill icono-check text-success"></i>
            <h1>¡Plato agregado!</h1>
            <p class="text-secondary">(Espere a ser redireccionado...)</p>
        </section>
    </main>
</body>
<?php
include __DIR__ . '/../components/pie.php'; // Usar __DIR__ para obtener la ruta actual del archivo
?>
