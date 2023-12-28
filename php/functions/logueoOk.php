<?php
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    //verifico si los datos existen en la db
    include 'conexion.php';
    $conexion = conectar();
    if ($conexion) {
        //guardo los datos ingresados
        $correo = $_POST['email'];
        $contra = trim($_POST['password']);
        //busco el email en la db
        $consulta = 'SELECT correo, pass FROM locales WHERE correo = ?';
        $sentencia = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($sentencia, 's', $correo);
        $q = mysqli_stmt_execute($sentencia);
        if ($q) {
            mysqli_stmt_store_result($sentencia);  // Almacena el resultado para poder usar mysqli_stmt_num_rows
            $num_rows = mysqli_stmt_num_rows($sentencia);

            if ($num_rows > 0) {
                mysqli_stmt_bind_result($sentencia, $email, $pass);
                mysqli_stmt_fetch($sentencia);
                //en caso de encontrar el email, verifico la contraseña
                if (password_verify($contra, $pass)) {
                    //las contraseñas coinciden
                    //header('refresh:0;url=../pages/publicaciones.php');
                    echo 'contra correcta';
                } else {
                    //contraseña incorrecta
                    //header('refresh:0;url=../pages/logueo.php');
                    echo 'contra incorrecta';
                }
            } else {
                //no se encontró el email
                //header('refresh:0;url=../pages/logueo.php');
                echo 'el mail no está';
            }
        } else {
            //fallo al realizar la consulta
            echo 'fallo al realizar la consulta';
        }

        desconectar($conexion);
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
