<?php
$ruta = '../';
//$color = '#0D6EFD';
$color = '#f9e6df';
require_once 'encabezado.php';
?>

<body class='bg-color'>
    <header>
        <?php require_once 'navbar.php'; ?>
    </header>
    <main class='container'>
        <!--Seleccionar region-->
        <section>
            <form class="" action="" method="post">
                <fieldset>
                    <div class="mb-3">
                        <label for="ubi">Eliga una zona</label>
                        <select class="form-select" id="ubi" name="zona" aria-label="Default select example">
                            <option selected>--Seleccionar--</option>
                            <option value="1">San Miguel de Tucumán</option>
                            <option value="2">Yerba Buena</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </fieldset>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </section>
        <section class=''>
            <h4 class="fw-bold">Platos disponibles</h4>
            <!--Publicaciones-->
            <section>
                <article class="card rounded-4 my-3 p-1">
                    <div class="card-body d-flex">
                        <div class='w-100  me-3'>
                            <h5 class="card-title">Empanadas de carne</h5>
                            <p class="card-text">1/2 docena de empanadas de carne. Deliciosas y muy ricas listas para
                                buscar rapido antes de que se las caguen comiendo</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span class='text-secondary'>Local:</span> Mc Donalds</li>
                                <li class="list-group-item"><span class='text-secondary'>Direccion:</span> 25 de mayo
                                </li>
                                <li class="list-group-item"><span class='text-secondary'>Hora:</span> 21:35</li>
                            </ul>
                        </div>
                        <div class='d-flex align-items-start'>
                            <a href="#" class="btn btn-primary"><i class="bi bi-three-dots-vertical"></i></a>
                            <!--<a href="#" class="btn btn-primary"><i class="bi bi-three-dots"></i></a>-->
                        </div>
                    </div>
                </article>
                <article class="card my-3">
                    <div class="card-body d-flex">
                        <div class='w-100  me-3'>
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.
                            </p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                        </div>
                        <div class='d-flex align-items-start'>
                            <a href="#" class="btn btn-primary"><i class="bi bi-three-dots-vertical"></i></a>
                            <!--<a href="#" class="btn btn-primary"><i class="bi bi-three-dots"></i></a>-->
                        </div>
                    </div>
                </article>
                <article class="card my-3">
                    <div class="card-body d-flex">
                        <div class='w-100  me-3'>
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.
                            </p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                        </div>
                        <div class='d-flex align-items-start'>
                            <a href="#" class="btn btn-primary"><i class="bi bi-three-dots-vertical"></i></a>
                            <!--<a href="#" class="btn btn-primary"><i class="bi bi-three-dots"></i></a>-->
                        </div>
                    </div>
                </article>
                <article class="card my-3">
                    <div class="card-body d-flex">
                        <div class='w-100  me-3'>
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.
                            </p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                        </div>
                        <div class='d-flex align-items-start'>
                            <a href="#" class="btn btn-primary"><i class="bi bi-three-dots-vertical"></i></a>
                            <!--<a href="#" class="btn btn-primary"><i class="bi bi-three-dots"></i></a>-->
                        </div>
                    </div>
                </article>
                <article class="card my-3">
                    <div class="card-body d-flex">
                        <div class='w-100  me-3'>
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.
                            </p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                        </div>
                        <div class='d-flex align-items-start'>
                            <a href="#" class="btn btn-primary"><i class="bi bi-three-dots-vertical"></i></a>
                            <!--<a href="#" class="btn btn-primary"><i class="bi bi-three-dots"></i></a>-->
                        </div>
                    </div>
                </article>
            </section>
        </section>
    </main>
    <?php
    require_once 'pie.php';
    ?>