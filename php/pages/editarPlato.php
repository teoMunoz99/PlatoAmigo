<?php
session_start();
//verifico si es que el usuario ya esta logueado
if (!isset($_SESSION['user']) || empty($_GET['id'])) {
    include 'error404.php';
    header('refresh:0;url=logueo.php');
} else {
    $bandera = false;
    $ruta = '../../';
    $color = '#0d6efd';
    $current_page = 'miPerfil';
    require_once 'components/encabezado.php';
    ?>

    <body class="bg-color">
        <header>
            <?php require_once 'components/navbar.php'; ?>
        </header>
        <main>
            <?php
            //Guardo el id del plato
            $id_plato = $_GET['id'];
            include '../functions/conexion.php';
            $conexion = conectar();
            if ($conexion) {
                // Recolecto los datos del usuario
                $consulta = "SELECT nombre,descripcion FROM platos WHERE id_plato=?";
                $sentencia = mysqli_prepare($conexion, $consulta);
                mysqli_stmt_bind_param($sentencia, 'i', $id_plato);
                $q = mysqli_stmt_execute($sentencia);
                mysqli_stmt_bind_result($sentencia, $nombre, $descripcion);
                if ($q) {
                    mysqli_stmt_fetch($sentencia);
                    desconectar($conexion);
                    // Muestro el formulario
                    ?>
                    <article class="container mb-4">
                        <form class="bg-light border rounded-5 p-3" action="../functions/editarPlatoOk.php" method="post">
                            <input type="hidden" name="id_plato" value="<?php echo $id_plato; ?>">
                            <fieldset>
                                <legend class="text-center mb-4 fw-bold">Editar plato</legend>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nombre del plato</label>
                                    <input type="text" class="form-control rounded-pill py-3" name="nombrePlato"
                                        value="<?php echo $nombre; ?>" id="name" minlength="3" maxlength="30">
                                </div>
                                <div class="mb-3">
                                    <label class='form-label' for="floatingTextarea2">Descripción</label>
                                    <textarea class="form-control rounded-5" name="descripcion"
                                        placeholder="Eje: 3 porciones de pizza muzarella" id="floatingTextarea2"
                                        style="height: 100px" maxlength='100'><?php echo $descripcion; ?></textarea>
                                </div>
                            </fieldset>
                            <button type="submit" class="btn btn-primary rounded-pill py-3">Actualizar</button>
                        </form>
                    </article>';
                    <?php
                } else {
                    desconectar($conexion);
                    header("refresh:3;url=publicaciones.php");
                    echo '<p class="fs-3 fw-bold text-center text-bg-danger">Ocurrió un error ejecutando la sentencia</p>';
                }
            }
            ?>
        </main>
        <?php
}
require_once 'components/pie.php';
?>