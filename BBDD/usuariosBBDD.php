<?php
function iniciarSesion()
{
    $errores = [];
    if (empty($_POST['usuario'])) {
        $errores[] = 'Tiene que rellenar el campo';
    }

    if (empty($_POST['contrasena'])) {
        $errores[] = 'Tiene que rellenar el campo';
    }


    if ($errores) {
        mostrar_errores($errores);
        unset($errores);
    } else {
        $conexion = conectarUsuarios();
        $usuario = $_POST['usuario'];
        $contraseña = md5($_POST['contrasena']);

        $select_usuario = "SELECT Nombre FROM usuarios WHERE Nombre = '$usuario' AND Contrasena ='$contraseña'";
        $resultado = $conexion->query($select_usuario);


        if ($resultado->fetch_row()) {
            $_SESSION['usuario'] = $usuario;
            header('Location:/ProyectoGymArtCopia/index.php');
        } else {
            echo 'No se ha establecido conexion';
        }
    }
}

function maximoCodigoUsuario()
{
    $conexion = conectarUsuarios();
    //para insertar el nuevo id
    //buscar en la BD el mayor id(max)
    $sql = "SELECT MAX(CodigoUsuario) FROM usuarios";
    $resultado = $conexion->query($sql);
    //hay que utilizar row porque no le hemos dado nombre a la columna seleccionada
    $fila = $resultado->fetch_row();
    $max_id = $fila[0];
    $nuevo_id = $max_id + 1;
    unset($conexion);
    return $nuevo_id;
}


function registrarUsuarios()
{
    $conexion = conectarUsuarios();
    $nick = $_POST["nick"];
    $contraseña = md5($_POST["contrasena"]);
    $contraseñaRepetida = md5("contrasena-repetida");
    $correo = $_POST["mail"];

    $errores = [];
    if (empty($_POST['nick'])) {
        $errores[] = '<p>El nombre esta mal</p>';
    }

    if (strlen($_POST['nick']) <= 3) {
        $errores[] = '<p>Tiene que tener mas de 3 caracteres</p>';
    }
    if (strlen($_POST['contrasena']) <= 2) {
        $errores[] = '<p>La contraseña tiene que tener como minimo 2 caracteres</p>';
    }

    if ($contraseña == $contraseñaRepetida) {
        // "";
    } else {
        $errores[] = "La contraseñas tienen que ser identicas";
    }
    if (strlen($_POST['mail']) <= 2) {
        $errores[] = '<p>El email tiene que tener como minimo 2 caracteres</p>';
    }

    if (validad_email($correo)) {
        //"";
    } else {
        $errores[] = '<p>Correo no valido</p>';
    }

    $usuario_unico = 'SELECT Nombre FROM usuarios where Nombre="' . $nick . '"';
    $resultado_select = $conexion->query($usuario_unico);
    if ($resultado_select != null) {
        $errores[] = "No se puede crear un usuario con el mismo nombre ";
    }

    if ($errores) {
        mostrar_errores($errores);
        unset($errores);
    } else {
        $codigo = maximoCodigoUsuario();
        $insert = "INSERT INTO usuarios (CodigoUsuario,Nombre,Contrasena,Email) VALUES($codigo,'$nick','$contraseña','$correo')";
        $resultado = $conexion->query($insert);

        if ($resultado != null) {
            echo "<p>Usuario registrado correctamente<p>";
        } else {
            echo '<p>Error</p>';
        }
    }
}






   