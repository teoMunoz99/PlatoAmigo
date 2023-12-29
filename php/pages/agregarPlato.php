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
    <main class='container d-flex justify-content-center align-items-center'>
        <!--Formulario de registro-->
        <article class="container mb-4">
            <form class="bg-light border rounded-5 p-3" action="../functions/agregarPlatoOk.php" method="post">
                <fieldset>
                    <legend class="text-center mb-4 fw-bold">Cargar nuevo plato</legend>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre del plato</label>
                        <input type="text" class="form-control rounded-pill py-3" name="nombrePlato" id="name"
                            minlength="3" maxlength="30">
                    </div>
                    <div class="mb-3">
                        <label class='form-label' for="floatingTextarea2">Descripción</label>
                        <textarea class="form-control rounded-5" name="descripcion" placeholder="Eje: 3 porciones de pizza muzarella"
                            id="floatingTextarea2" style="height: 100px" maxlength='100'></textarea>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-success rounded-pill py-3">Agregar!</button>
            </form>
        </article>
    </main>
    <?php
    require_once 'components/pie.php';
    ?>