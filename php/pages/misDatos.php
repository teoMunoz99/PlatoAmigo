<?php
session_start();
//verifico si es que el usuario ya esta logueado
if (!isset($_SESSION['user']) || !isset($_SESSION['id_local'])) {
    header('refresh:0;url=logueo.php');
}
$bandera = false;
$ruta = '../../';
$color = '#0d6efd';
$current_page = 'misDatos';
require_once 'components/encabezado.php';
?>

<body class="bg-color">
    <header>
        <?php require_once 'components/navbar.php'; ?>
    </header>
    <main>
        <?php
        //Guardo el id del local logueado
        $idLocal = $_SESSION['id_local'];
        include '../functions/conexion.php';
        $conexion = conectar();
        if ($conexion) {
            // Recolecto los datos del usuario
            $consulta = "SELECT nombre,direccion,localidad,cel,correo,pass FROM locales WHERE id_local=?";
            $sentencia = mysqli_prepare($conexion, $consulta);
            mysqli_stmt_bind_param($sentencia, 'i', $idLocal);
            $q = mysqli_stmt_execute($sentencia);
            mysqli_stmt_bind_result($sentencia, $nombre, $direccion, $localidad, $cel, $correo, $pass);
            if ($q) {
                mysqli_stmt_fetch($sentencia);
                desconectar($conexion);
                // Muestro el formulario
                ?>
                <article class="container mb-4">
                <form class="bg-light border rounded-5 p-3" action="../functions/misDatosOk.php" method="post">
                    <fieldset>
                        <legend class="text-center mb-4 fw-bold">Mis datos</legend>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre del local</label>
                            <input type="text" class="form-control rounded-pill py-3" name="nombre" id="name"
                                minlength="3" maxlength="15" value="<?php echo $nombre; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="direc" class="form-label">Dirección</label>
                            <input type="text" class="form-control rounded-pill py-3" minlength="5" maxlength="45"
                                name="direccion" id="direc" value="<?php echo $direccion; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="ubi">Localidad</label>
                            <select class="form-select rounded-pill py-3" id="ubi" name="localidad" required
                                aria-label="Default select example">
                                <option value="San Miguel de Tucumán" <?php echo ($localidad == "San Miguel de Tucumán") ? "selected" : ""; ?>>San Miguel de Tucumán</option>
                                <option value="Yerba Buena" <?php echo ($localidad == "Yerba Buena") ? "selected" : ""; ?>>Yerba Buena</option>
                                <option value="Aguilares" <?php echo ($localidad == "Aguilares") ? "selected" : ""; ?>>Aguilares</option>
                                <option value="Alderetes" <?php echo ($localidad == "Alderetes") ? "selected" : ""; ?>>Alderetes</option>
                                <option value="Banda del Río Salí" <?php echo ($localidad == "Banda del Río Salí") ? "selected" : ""; ?>>Banda del Río Salí</option>
                                <option value="Bella Vista" <?php echo ($localidad == "Bella Vista") ? "selected" : ""; ?>>Bella Vista</option>
                                <option value="Burruyacú" <?php echo ($localidad == "Burruyacú") ? "selected" : ""; ?>>Burruyacú</option>
                                <option value="Concepción" <?php echo ($localidad == "Concepción") ? "selected" : ""; ?>>Concepción</option>
                                <option value="Famaillá" <?php echo ($localidad == "Famaillá") ? "selected" : ""; ?>>Famaillá</option>
                                <option value="Graneros" <?php echo ($localidad == "Graneros") ? "selected" : ""; ?>>Graneros</option>
                                <option value="Juan Bautista Alberdi" <?php echo ($localidad == "Juan Bautista Alberdi") ? "selected" : ""; ?>>Juan Bautista Alberdi</option>
                                <option value="La Cocha" <?php echo ($localidad == "La Cocha") ? "selected" : ""; ?>>La Cocha</option>
                                <option value="Las Talitas" <?php echo ($localidad == "Las Talitas") ? "selected" : ""; ?>>Las Talitas</option>
                                <option value="Lules" <?php echo ($localidad == "Lules") ? "selected" : ""; ?>>Lules</option>
                                <option value="Monteros" <?php echo ($localidad == "Monteros") ? "selected" : ""; ?>>Monteros</option>
                                <option value="Simoca" <?php echo ($localidad == "Simoca") ? "selected" : ""; ?>>Simoca</option>
                                <option value="Tafí del Valle" <?php echo ($localidad == "Tafí del Valle") ? "selected" : ""; ?>>Tafí del Valle</option>
                                <option value="Tafí Viejo" <?php echo ($localidad == "Tafí Viejo") ? "selected" : ""; ?>>Tafí Viejo</option>
                                <option value="Trancas" <?php echo ($localidad == "Trancas") ? "selected" : ""; ?>>Trancas</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="cel" class="form-label">Tel/Cel</label>
                            <input type="number" class="form-control rounded-pill py-3" min="1000000"
                                max="999999999999999" name="telefono" id="cel" value="<?php echo $cel; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control rounded-pill py-3" name="email"
                                id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $correo; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="contra" class="form-label">Contraseña</label>
                            <input type="password" minlength="8" maxlength="20" name="password"
                                class="form-control rounded-pill py-3" id="contra" required>
                        </div>
                    </fieldset>
                    <button type="submit" class="btn btn-primary rounded-pill py-3">Actualizar</button>
                </form>
            </article>';
            <?php
            } else {
                desconectar($conexion);
                header("refresh:3;url=usuario_listado.php");
                echo '<p class="fs-3 fw-bold text-center text-bg-danger">Ocurrió un error ejecutando la sentencia</p>';
            }
        }
        ?>
    </main>
    <?php
    require_once 'components/pie.php';
    ?>