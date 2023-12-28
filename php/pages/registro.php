<?php
session_start();
//verifico si es que el usuario ya esta logueado
if(isset($_SESSION['user'])){
    header('refresh:0;url=publicaciones.php');
}
$ruta = '../../';
$color = '#0d6efd';
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
            <!--Banner bienvenida-->
            <article class="d-flex justify-content-center align-items-center">
                <img class="img-fluid w-75" src="../../img/registro/femaleChef.png" alt="ilustracion de un chef">
            </article>
            <!--Texto bienvenida al registro-->
            <article class="text-center container">
                <h1 class="fw-bold">¡Bienvenido a PlatoAmigo!</h1>
                <p class="fs-5">
                    ¿Sobró algo delicioso en tu restaurante o bar? Compártelo con quienes lo necesitan.
                    Regístrate y haz del compartir comida una experiencia que cambia vidas.
                </p>
            </article>
            <!--Loguin-->
            <article class="text-center mb-3">
                <p class='text-secondary'>Ya estás registrado? <a href="logueo.php">Inicia sesión</a></p>
            </article>
            <!--Formulario de registro-->
            <article class="container mb-4">
                <form class="bg-light border rounded-5 p-3" action="../functions/registroOk.php" method="post">
                    <fieldset>
                        <legend class="text-center mb-4 fw-bold">Formulario de Registro</legend>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre del local</label>
                            <input type="text" class="form-control rounded-pill py-3" name="nombre" id="name"
                                minlength="3" maxlength="15" required>
                        </div>
                        <div class="mb-3">
                            <label for="direc" class="form-label">Dirección</label>
                            <input type="text" class="form-control rounded-pill py-3" minlength="5" maxlength="45"
                                name="direccion" id="direc" required>
                        </div>
                        <div class="mb-3">
                            <label for="ubi">Localidad</label>
                            <select class="form-select rounded-pill py-3" id="ubi" name="localidad" required
                                aria-label="Default select example">
                                <option value="San Miguel de Tucumán">San Miguel de Tucumán</option>
                                <option value="Yerba Buena">Yerba Buena</option>
                                <option value="Aguilares">Aguilares</option>
                                <option value="Alderetes">Alderetes</option>
                                <option value="Banda del Río Salí">Banda del Río Salí</option>
                                <option value="Bella Vista">Bella Vista</option>
                                <option value="Burruyacú">Burruyacú</option>
                                <option value="Concepción">Concepción</option>
                                <option value="Famaillá">Famaillá</option>
                                <option value="Graneros">Graneros</option>
                                <option value="Juan Bautista Alberdi">Juan Bautista Alberdi</option>
                                <option value="La Cocha">La Cocha</option>
                                <option value="Las Talitas">Las Talitas</option>
                                <option value="Lules">Lules</option>
                                <option value="Monteros">Monteros</option>
                                <option value="Simoca">Simoca</option>
                                <option value="Tafí del Valle">Tafí del Valle</option>
                                <option value="Tafí Viejo">Tafí Viejo</option>
                                <option value="Trancas">Trancas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="cel" class="form-label">Tel/Cel</label>
                            <input type="number" class="form-control rounded-pill py-3" min="1000000"
                                max="999999999999999" name="telefono" id="cel" required>
                        </div>
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
                    <button type="submit" class="btn btn-primary rounded-pill py-3">Registrarme !</button>
                </form>
            </article>
        </section>
    </main>

<?php
require_once 'components/pie.php';
?>