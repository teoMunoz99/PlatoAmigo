<?php
session_start();
if (isset($_SESSION['user'])) {
    $bandera = false;
} else {
    $bandera = true;
}
?>
<nav class="navbar bg-primary py-3 rounded-4 rounded-top-0" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="publicaciones.php"><i class="bi bi-suit-heart-fill text-danger"></i>
            PlatoAmigo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="publicaciones.php">Inicio</a>
                </li>
                <?php if (!$bandera) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="error404.php">Mi Perfil</a>
                    </li>
                <?php } ?>
                <?php if ($bandera) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="registro.php">Registrarme</a>
                    </li>
                <?php } ?>
                <?php if ($bandera) { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="logueo.php">Iniciar sesión</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="error404.php">¿Quiénes somos?</a>
                </li>
                <?php if (!$bandera) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../functions/salir.php">Salir</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>