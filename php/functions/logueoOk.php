<?php
session_start();//uso las variables de session para guardar un msj de error en caso de logueo fallido
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    //verifico si los datos existen en la db
    include 'conexion.php';
    $conexion = conectar();
    if ($conexion) {
        //guardo los datos ingresados
        $correo = $_POST['email'];
        $contra = trim($_POST['password']);
        //busco el email en la db
        $consulta = 'SELECT nombre, correo, pass, tipo FROM locales WHERE correo = ?';
        $sentencia = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($sentencia, 's', $correo);
        $q = mysqli_stmt_execute($sentencia);
        if ($q) {
            mysqli_stmt_store_result($sentencia);  // Almacena el resultado para poder usar mysqli_stmt_num_rows
            $num_rows = mysqli_stmt_num_rows($sentencia);
            //si num_rows es mayor a 0 significa que encontro una cuenta con ese email
            if ($num_rows > 0) {
                mysqli_stmt_bind_result($sentencia, $nombre, $email, $pass, $tipo);
                mysqli_stmt_fetch($sentencia);
                desconectar($conexion);
                //en caso de encontrar el email, verifico la contraseña
                if (password_verify($contra, $pass)) {
                    //las contraseñas coinciden
                    $_SESSION['user'] = $nombre;
                    $_SESSION['tipo'] = $tipo;
                    header('refresh:0;url=../pages/publicaciones.php');
                } else {
                    //contraseña incorrecta
                    $_SESSION['error_msj'] = 'Email o contraseña incorrecta';
                    header('refresh:0;url=../pages/logueo.php');
                }
            } else {
                //no se encontró el email
                $_SESSION['error_msj'] = 'Email o contraseña incorrecta';
                header('refresh:0;url=../pages/logueo.php');
            }
        } else {
            //fallo al realizar la consulta
            header('refresh:1;url=../pages/logueo.php');
            include '../pages/fallo.php';
        }
    } else {
        //no se realizó la conexión a la db
        header('refresh:0;url=../pages/fallo.php');
        echo 'todo mal';
    }
} else {
    //faltan datos
    echo 'todo mal';
}
?>
