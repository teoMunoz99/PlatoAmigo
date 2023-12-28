<?php
session_start();
$ruta = '';
//$color = '#f9e6df';
$color = '#0d6efd';
require_once 'php/pages/components/encabezado.php';
?>

<body class='bg-color'>
    <main class="d-flex flex-column">
        <!--Titulo-->
        <a href="index.php" class='text-decoration-none'><h1 class='fw-bold text-center bg-primary text-white p-3 rounded-5 rounded-top-0'><i
                class="bi bi-suit-heart-fill text-danger"></i> PlatoAmigo</h1></a>
        <section class='flex-grow-1 d-flex flex-column justify-content-around'>
            <!--Banner bienvenida-->
            <article class="d-flex justify-content-center align-items-center">
                <img class="img-fluid w-75" src="img/index/7853929.jpg" alt="ilustracion de un chef">
            </article>
            <!--texto-->
            <article class="text-center container">
                <p class="fs-5 m-0">
                    Cada plato que compartes es una oportunidad para hacer una diferencia en la vida de alguien más.
                    Únete a nuestra comunidad y sé parte de un movimiento que va más allá de la comida:
                    una experiencia de dar que toca corazones y llena estómagos.
                </p>
            </article>
            <!--Botones-->
            <article class="d-flex flex-column justify-content-center align-items-center my-2">
                <a class="btn btn-primary rounded-pill boton py-3" href="./php/pages/publicaciones.php">Ver platos<i
                        class="bi bi-arrow-right-short"></i></a>
                <a class="btn btn-primary rounded-pill boton py-3" href="php/pages/registro.php">Registrarme</a>
            </article>
        </section>
    </main>
    <footer>
        <section class='container'>
            <p class="text-center text-secondary">&copy; 2023 PlatoAmigo. Todos los derechos reservados. | <a
                    href="politica-de-privacidad.html">Política de Privacidad</a> | <a
                    href="terminos-y-condiciones.html">Términos y Condiciones</a></p>
        </section>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>