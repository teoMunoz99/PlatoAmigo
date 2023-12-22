<?php
$ruta = '../';
$color = '#f9e6df';
require_once 'encabezado.php';
?>

<body class="bg-color">
    <main class="d-flex justify-content-center align-items-end flex-column mb-3">
        <section>
            <!--Banner bienvenida-->
            <article class="d-flex justify-content-center">
                <img class="img-fluid w-75" src="../img/femaleChef.png" alt="ilustracion de un chef">
            </article>
            <!--Texto bienvenida al registro-->
            <article class="text-center container">
                <h1 class="fw-bold">¡Bienvenido a PlatoAmigo!</h1>
                <p class="fs-5">
                    ¿Sobró algo delicioso en tu restaurante o bar? Compártelo con quienes lo necesitan.
                    Regístrate y haz del compartir comida una experiencia que cambia vidas.
                </p>
            </article>
            <!--Formulario de registro-->
            <article class="container">
                <form class="bg-light border rounded-3 p-3" action="registroOk.php" method="post">
                    <fieldset>
                        <legend class="text-center mb-4">Formulario de Registro</legend>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre del local*</label>
                            <input type="text" class="form-control" name="nombre" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="direc" class="form-label">Dirección*</label>
                            <input type="text" class="form-control" name="direccion" id="direc">
                        </div>
                        <div class="mb-3">
                            <label for="ubi">Localidad*</label>
                            <select class="form-select" id="ubi" name="localidad" aria-label="Default select example">
                                <option selected>--Seleccionar--</option>
                                <option value="1">San Miguel de Tucumán</option>
                                <option value="2">Yerba Buena</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="num" class="form-label">Tel/Cel-(opcional)</label>
                            <input type="number" class="form-control" name="telefono" id="num">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email*</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="contra" class="form-label">Contraseña*</label>
                            <input type="password" name="password" class="form-control" id="contra">
                        </div>
                    </fieldset>
                    <button type="submit" class="btn btn-primary">Registrarme</button>
                </form>
            </article>
        </section>
    </main>
<?php
require_once 'pie.php';
?>