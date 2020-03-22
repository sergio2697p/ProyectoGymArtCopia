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

                    <input type='hidden' value="<?php echo "${fila['0']}" ?>"name='id'>
                    <?php
                    ?>
                    <a href="modificarClientes.php"><input type="submit" name="editar_cliente" value="modificar"></a>
                    <input type="submit" value="borrar">
                </div>
            </div>
    <?php
        };
    }
    ?>

    </div>

    <?php
    function modificarCLientes()
    {
        $conexion = conectarUsuarios();
        $select_cliente = "SELECT * from clientes WHERE CodigoCliente=7";
        $resultado = $conexion->query($select_cliente);
        while ($fila = $resultado->fetch_row()) {
    ?>
            <form class="Modificar" action="" method="POST">
                <div>
                    <div>
                        <label>Nombre:</label>
                        <input type="text" value="<?php echo "${fila['1']}" ?>" id="nombre" name="name">
                    </div>
                    <div>
                        <label>Apellidos:</label>
                        <input type="text" value="<?php echo "${fila['2']}" ?>" id="apellidos" name="apellidos">
                    </div>
                    <div>
                        <label>Domicilio:</label>
                        <input type="text" value="<?php echo "${fila['3']}" ?>" id="domicilio" name="domicilio">
                    </div>
                    <div>
                        <label>Población:</label>
                        <input type="text" value="<?php echo "${fila['4']}" ?>" id="poblacion" name="poblacion">
                    </div>
                    <div>
                        <label>Correo Electronico:</label>
                        <input type="text" value="<?php echo "${fila['5']}" ?>" id="mail" name="mail">
                    </div>
                    <div>
                        <label>Telefono:</label>
                        <input type="number" value="<?php echo "${fila['6']}" ?>" id="movil" name="movil">
                    </div>
                    <label>Observaciones:</label>
                    <input type="text" value="<?php echo "${fila['7']}" ?>" id="observaciones" name="Observaciones">
                </div>

                <h1>Información adicional</h1>
                <div>
                    <label>Peso:</label>
                    <input type="number" value="<?php echo "${fila['8']}" ?>" id="peso" name="peso">
                </div>
                <div>
                    <label>Altura: (* En metros)</label>
                    <input type="number" value="<?php echo "${fila['9']}" ?>" id="altura" name="altura">
                </div>
                <div>
                    <label>Edad:</label>
                    <input type="number" value="<?php echo "${fila['10']}" ?>" id="edad" name="edad">
                </div>
                <div>
                    <label>Actividad fisíca:</label>
                    <input type="text" value="<?php echo "${fila['11']}" ?>" id="actividad" name="actividad">
                </div>
                <div>
                    <label>Lesiones:</label>
                    <input type="text" value="<?php echo "${fila['12']}" ?>" id="lesiones" name="lesiones">
                </div>
                <input id="enviar" type="submit" name="modificar_datos_clientes" value="Modificar">
            </form>
    <?php
        }
    }
    ?>