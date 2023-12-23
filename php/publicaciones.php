<?php
$ruta = '../';
$color = '#0d6efd';
//$color = '#f9e6df';
require_once 'encabezado.php';
?>

<body class='bg-color'>
    <header>
        <?php require_once 'navbar.php'; ?>
    </header>
    <main class='container'>
        <!--Buscador-->
        <section class='my-2'>
            <form class="d-flex" role="search">
                <input class="form-control me-2 rounded-pill py-3" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success  rounded-pill" type="submit">Search</button>
            </form>
        </section>
        <!--Carousel-->
        <!--<section class='border'>
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner rounded-5 h-25">
                    <div class="carousel-item active">
                        <img src="../img/ayuda6.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/ayuda1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/ayuda4.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </section>-->
        <!--Seleccionar region-->
        <section>
            <form class="d-flex" action="" method="post">
                <fieldset>
                    <div class="me-2">
                        <select class="form-select rounded-pill py-3" id="ubi" name="zona" aria-label="Default select example">
                            <option selected>--Seleccionar--</option>
                            <option value="1">San Miguel de Tucumán</option>
                            <option value="2">Yerba Buena</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-primary rounded-pill">Buscar</button>
            </form>
        </section>
        <section class=''>
            <h4 class="fw-bold">Platos disponibles:</h4>
            <!--Publicaciones-->
            <section>
                <article class="card rounded-5 p-2">
                    <div class="card-body d-flex">
                        <div class='w-100'>
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
                            <a href="#" class="btn btn-primary rounded-5"><i class="bi bi-chevron-right"></i></a>
                            <!--<a href="#" class="btn btn-primary"><i class="bi bi-three-dots-vertical"></i></a>-->
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