<?php

/*Funciones Requeridas para los clientes*/
function maximoCodigoCliente()
{
    $conexion = conectarUsuarios();
    //para insertar el nuevo id
    //buscar en la BD el mayor id(max)
    $sql = "SELECT MAX(CodigoCliente) FROM clientes";
    $resultado = $conexion->query($sql);
    //hay que utilizar row porque no le hemos dado nombre a la columna seleccionada
    $fila = $resultado->fetch_row();
    $max_id = $fila[0];
    $nuevo_id = $max_id + 1;
    unset($conexion);
    return $nuevo_id;
}

function verClientes()
{
    $conexion = conectarUsuarios();
    $select_cliente = "SELECT * from clientes";

    //para recorrer los id para los puntos
    $resultado = $conexion->query($select_cliente);
    $contador = 0;

    while ($fila = $resultado->fetch_array()) {
        $contador++;
?>

        <div class="Row">
            <div class="Celda">
                <div class="contenidos1-nombre"><?php echo "${fila['Nombre']}"; ?></div>
            </div>

            <div class="Celda">
                <div class="contenidos1-apellidos"><?php echo "${fila['Apellidos']}"; ?></div>
            </div>

            <div class="Celda">
                <input type="checkbox" class="boton-checkbox" id="eChkUsuario<?php echo $contador ?>">
                <label for="eChkUsuario<?php echo $contador ?>" class="tresbotones">...</label>
                <div class="contenidos1-correo a-ocultar"><?php echo "${fila['CorreoElectronico']}";
                                                            ?>
                    <div class="boton">
                        <form action="modificarClientes.php" method="POST">
                            <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
                            <input type="submit" name="editar_cliente" value="modificar">
                            

                            <form action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                                <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
                                <input type="submit" name="borrar" value="borrar">
                            </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    if (isset($_POST["borrar"])) {
        borrarClientes();
    }
}

//Para actualizar los daros de los clientes
function modificarClientes()
{
    $conexion = conectarUsuarios();
    if ($_POST) {
        //si me piden que modifique los datos los modifico
        if (isset($_POST["modificar_datos_clientes"])) {

            //Guardo los parametros en variables
            $id = $_POST["id"];
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $domicilio = $_POST["domicilio"];
            $poblacion = $_POST["poblacion"];
            $correoElectronico = $_POST["mail"];
            $telefono = $_POST["movil"];
            $Observaciones = $_POST["Observaciones"];
            $peso = $_POST["peso"];
            $altura = $_POST["altura"];
            $edad = $_POST["edad"];
            $actividadFisica = $_POST["ActividadFisica"];
            $lesiones = $_POST["Lesiones"];

            //Vamos a realizar una consulta UPDATE para actuliazar los datos de los clientes
            $actualizarCliente =
                "UPDATE clientes " .
                "SET Nombre = '$nombre', Apellidos='$apellidos', Domicilio='$domicilio',Poblacion='$poblacion', CorreoElectronico='$correoElectronico', " .
                " Telefono=$telefono, Observaciones= '$Observaciones', Peso=$peso, altura =$altura, edad=$edad, ActividadFisica='$actividadFisica', " .
                " Lesiones='$lesiones' " .
                "WHERE CodigoCliente=$id";
            //echo $actualizarCliente;
            //exit;
            $resultado = $conexion->query($actualizarCliente);

            if ($resultado) {
                header("Location:verClientes.php");
                echo "<p>Se ha modificado $conexion->affected_rows registros con exito</p>";
            } else {
                echo "Tuvimos problemas en la modificacion, intentelo de nuevo mas tarde";
            }
        }
    }

    visualizarDatosCliente();
}

function visualizarDatosCliente()
{
    $conexion = conectarUsuarios();

    $select_cliente = "SELECT * from clientes WHERE CodigoCliente=$_POST[id]";
    $resultado = $conexion->query($select_cliente);

    $fila = $resultado->fetch_array();
    ?>
    <form class="Modificar" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
        <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
        <div class="datosPersonales">
            <h1>Datos Personales</h1>
            <div>
                <label>Nombre:</label>
                <input type="text" value="<?php echo "${fila['Nombre']}" ?>" id="nombre" name="nombre">
            </div>
            <div>
                <label>Apellidos:</label>
                <input type="text" value="<?php echo "${fila['Apellidos']}" ?>" id="apellidos" name="apellidos">
            </div>
            <div>
                <label>Domicilio:</label>
                <input type="text" value="<?php echo "${fila['Domicilio']}" ?>" id="domicilio" name="domicilio">
            </div>
            <div>
                <label>Población:</label>
                <input type="text" value="<?php echo "${fila['Poblacion']}" ?>" id="poblacion" name="poblacion">
            </div>
            <div>
                <label>Correo Electronico:</label>
                <input type="text" value="<?php echo "${fila['CorreoElectronico']}" ?>" id="mail" name="mail">
            </div>
            <div>
                <label>Telefono:</label>
                <input type="number" value="<?php echo "${fila['Telefono']}" ?>" id="movil" name="movil">
            </div>
            <label>Observaciones:</label>
            <input type="text" value="<?php echo "${fila['Observaciones']}" ?>" id="observaciones" name="Observaciones">
        </div>

        <div class="datosAdicionales">
            <h1>Información adicional</h1>
            <label>Peso:</label>
            <input type="number" value="<?php echo "${fila['Peso']}" ?>" id="peso" name="peso">

            <div>
                <label>Altura: (* En metros)</label>
                <input type="number" value="<?php echo "${fila['altura']}" ?>" id="altura" name="altura">
            </div>
            <div>
                <label>Edad:</label>
                <input type="number" value="<?php echo "${fila['edad']}" ?>" id="edad" name="edad">
            </div>
            <div>
                <label>Actividad fisíca:</label>
                <input type="text" value="<?php echo "${fila['ActividadFisica']}" ?>" id="actividad" name="actividad">
            </div>
            <div>
                <label>Lesiones:</label>
                <input type="text" value="<?php echo "${fila['Lesiones']}" ?>" id="lesiones" name="lesiones">
            </div>
        </div>
        <input type="submit" class="enviar" name="modificar_datos_clientes" value="Modificar">
    </form>
<?php
}

function borrarClientes()
{
    $conexion = conectarUsuarios();

    $borrar_cliente = "DELETE from clientes WHERE CodigoCliente=$_POST[id]";
    $resultado = $conexion->query($borrar_cliente);

    if ($resultado) {
        echo '<p>Se ha borrado un cliente' . $conexion->affected_rows . ' registro con exito</p>';
    } else {

        echo '<p>Tuvimos problemas con la eliminacion del clientes, intentalo de nuevo más tarde</p>';
    }
}

function anadirClientes()
{
    $conexion = conectarUsuarios();

    //Guardo los parametros en variables
    $codigo = maximoCodigoCliente();
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $domicilio = $_POST["domicilio"];
    $poblacion = $_POST["poblacion"];
    $correoElectronico = $_POST["mail"];
    $telefono = $_POST["movil"];
    $Observaciones = $_POST["Observaciones"];
    $peso = $_POST["peso"];
    $altura = $_POST["altura"];
    $edad = $_POST["edad"];
    $actividadFisica = $_POST["actividad"];
    $lesiones = $_POST["lesiones"];

    $anadir_cliente = "INSERT INTO clientes (CodigoCliente,Nombre,Apellidos,Domicilio,Poblacion,
            CorreoElectronico,Telefono,Observaciones,Peso,altura,edad,ActividadFisica,Lesiones) 
            VALUES($codigo,'$nombre','$apellidos','$domicilio','$poblacion','$correoElectronico',
            $telefono,'$Observaciones',$peso,$altura,$edad,'$actividadFisica','$lesiones')";
    $resultado = $conexion->query($anadir_cliente);

    if ($resultado) {
        header("Location:verClientes.php");
        echo "<p>Se ha añadido $conexion->affected_rows registros con exito</p>";
    } else {
        echo "Tuvimos problemas en la insercion, intentelo de nuevo mas tarde";
    }
}
