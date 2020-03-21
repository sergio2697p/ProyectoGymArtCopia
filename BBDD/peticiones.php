<?php
function iniciarSesion()
{
    $conexion = conectarUsuarios();
    $usuario = $_POST['usuario'];
    $contraseña = md5($_POST['contrasena']);

    $select_usuario = "SELECT Nombre FROM usuarios WHERE Nombre = '$usuario' AND Contrasena ='$contraseña'";
    $resultado = $conexion->query($select_usuario);


    if ($resultado->fetch_row()) {
        $_SESSION['usuario'] = $usuario;
        header('Location:index.php');
    } else {
        echo 'No se ha establecido conexion';
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
    $codigo = maximoCodigoUsuario();
    $nick = $_POST["nick"];
    $contraseña = md5($_POST["contrasena"]);
    $correo = $_POST["mail"];

    $insert = "INSERT INTO usuarios (CodigoUsuario,Nombre,Contrasena,Email) VALUES($codigo,'$nick','$contraseña','$correo')";
    $resultado = $conexion->query($insert);

    if ($resultado != null) {
        echo "<p>Usuario registrado correctamente<p>";
    } else {
        echo '<p>Error</p>';
    }
}

function verClientes()
{
?>

    <div id="contenedor">
        <div id="contenidos">
            <div id="columna1">Nombre</div>
            <div id="columna2">Apellidos</div>
            <div id="columna2">Correo</div>
        </div>
        <?php
        $conexion = conectarUsuarios();
        $select_cliente = "SELECT * from clientes";
        $resultado = $conexion->query($select_cliente);
        while ($fila = $resultado->fetch_row()) {
        ?>
            <div id="contenidos1">
                <div id="columna1"><?php echo "${fila['1']}"; ?></div>
                <div id="columna2"><?php echo "${fila['2']}"; ?></div>
                <div id="columna2"><?php echo "${fila['5']}"; ?></div>
                <div id="boton">
                    <input type='hidden' value=<?php echo "${fila['0']}" ?> name='id'>
                    <input type="submit" value="modificar">
                    <input type="submit" value="borrar">

                </div>
            </div>
    <?php
        };
    }
    ?>

    </div>