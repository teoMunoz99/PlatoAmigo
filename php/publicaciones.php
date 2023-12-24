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
        <!--Banner-->
        <section class='mt-3'>
            <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card text-bg-dark rounded-5 border-0">
                            <img src="../img/bannerPublicaciones/pobreza_infantil.jpg"
                                class="card-img img-fluid rounded-5 opacity-50" alt="...">
                            <div class="card-img-overlay p-4">
                                <h5 class="card-title">¡Dona y Cambia Vidas!</h5>
                                <p class="card-text">Desde $60 alimentas esperanzas. Haz clic, dona y cambia vidas.</p>
                                <p class="card-text"><small>Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card text-bg-dark rounded-5 border-0">
                            <img src="../img/bannerPublicaciones/hombre-calle.jpg"
                                class="card-img img-fluid rounded-5  opacity-50" alt="...">
                            <div class="card-img-overlay p-4">
                                <h5 class="card-title">Un Bocado, Un Gesto</h5>
                                <p class="card-text">Cada bocado cuenta. Haz clic para unirte y
                                    hacer pequeñas acciones con grandes impactos.</p>
                                <p class="card-text"><small>Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card text-bg-dark rounded-5 border-0">
                            <img src="../img/bannerPublicaciones/hombre-basura.jpg"
                                class="card-img img-fluid rounded-5 opacity-50" alt="...">
                            <div class="card-img-overlay p-4">
                                <h5 class="card-title">Platos que Nutren Sueños</h5>
                                <p class="card-text">Convierte un plato en un sueño cumplido.
                                    Únete a nosotros y ayuda a alimentar el futuro.</p>
                                <p class="card-text"><small>Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Botones principales-->
        <section class="d-flex justify-content-around flex-wrap mt-3">
            <a href="" class='text-center text-decoration-none text-dark fw-bold'>
                <div class='btn btn-primary btn-p m-1 rounded-4 d-flex justify-content-center align-items-center'>
                    <!--<i class="bi bi-cup-hot-fill icono-btn"></i>-->
                    <img src="../img/iconos-comida/fast-food.png" class="w-75 invertir-color" alt="">
                </div>
                Platos
            </a>
            <a href="" class='text-center text-decoration-none text-dark fw-bold'>
                <div class='btn btn-primary btn-p m-1 rounded-4 d-flex justify-content-center align-items-center'>
                    <i class="bi bi-heart-pulse-fill icono-btn"></i>
                </div>
                Ayudar
            </a>
            <a href="" class='text-center text-decoration-none text-dark fw-bold'>
                <div class='btn btn-primary btn-p m-1 rounded-4 d-flex justify-content-center align-items-center'>
                    <i class="bi bi-calendar-heart icono-btn"></i>
                </div>
                Eventos
            </a>
            <a href="" class='text-center text-decoration-none text-dark fw-bold'>
                <div class='btn btn-primary btn-p m-1 rounded-4 d-flex justify-content-center align-items-center'>
                    <i class="bi bi-coin icono-btn"></i>
                </div>
                Donar
            </a>
        </section>
        <!--Titulo-->
        <h2 class='text-center fs-1 fw-bold mt-5'>Platos disponibles</h2>
        <!--Buscador-->
        <section class='mt-3'>
            <form class="d-flex" role="search">
                <input class="form-control me-2 rounded-pill py-3" type="search" placeholder="Buscar"
                    aria-label="Search">
                <button class="btn btn-outline-success  rounded-pill" type="submit">Buscar</button>
            </form>
        </section>
        <!--Seleccionar region-->
        <section class='mt-3'>
            <h5 class="fw-bold"><i class="bi bi-geo-alt-fill"></i> Filtrar por ubicacion</h5>
            <form class="d-flex" action="" method="post">
                <fieldset>
                    <div class="me-2">
                        <select class="form-select rounded-pill py-3" id="ubi" name="zona"
                            aria-label="Default select example">
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
        <section class='mt-4'>
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