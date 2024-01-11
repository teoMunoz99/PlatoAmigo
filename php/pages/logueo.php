<?php
session_start();
//verifico si es que el usuario ya esta logueado
if(isset($_SESSION['user'])){
    header('refresh:0;url=publicaciones.php');
}
$ruta = '../../';
$color = '#0d6efd';
$current_page = 'logueo';
require_once 'components/encabezado.php';
?>

<body class="bg-color">
    <main class="d-flex flex-column">
        <!--Titulo-->
        <a href="../../index.php" class='text-decoration-none'>
            <h1 class='fw-bold text-center bg-primary text-white p-3 rounded-5 rounded-top-0'><i
                    class="bi bi-suit-heart-fill text-danger"></i> PlatoAmigo</h1>
        </a>
        <section class='flex-grow-1 d-flex flex-column justify-content-center'>
            <!--Banner logueo-->
            <article class="d-flex justify-content-center align-items-center">
                <img class="img-fluid w-75" src="../../img/otros/charity-bro.png" alt="ilustracion de un chef">
            </article>
            <!--Texto bienvenida al logueo-->
            <article class="text-center container">
                <h1 class="fw-bold">¡Hola de nuevo!</h1>
                <p class="fs-5">
                    
                </p>
            </article>
            <!--Formulario de logueo-->
            <article class="container mb-4">
                <form class="bg-light border rounded-5 p-3" action="../functions/logueoOk.php" method="post">
                    <fieldset>
                        <legend class="text-center mb-4 fw-bold">Iniciar sesión</legend>
                        <?php
                            if(isset($_SESSION['error_msj'])){
                                echo '<p class="text-danger">'.$_SESSION['error_msj'].'</p>';
                            }
                        ?>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control rounded-pill py-3" name="email"
                                id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="contra" class="form-label">Contraseña</label>
                            <input type="password" minlength="8" maxlength="20" name="password"
                                class="form-control rounded-pill py-3" id="contra" required>
                        </div>
                    </fieldset>
                    <button type="submit" class="btn btn-primary rounded-pill py-3">Iniciar sesión</button>
                </form>
            </article>
        </section>
    </main>

<?php
require_once 'components/pie.php';
?>