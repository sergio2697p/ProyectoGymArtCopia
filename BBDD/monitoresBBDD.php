<?php

/*Funciones Requeridas para los clientes*/
function maximoIdMonitores()
{
    $conexion = conectarUsuarios();
    //para insertar el nuevo id
    //buscar en la BD el mayor id(max)
    $sql = "SELECT MAX(id) FROM monitores";
    $resultado = $conexion->query($sql);
    //hay que utilizar row porque no le hemos dado nombre a la columna seleccionada
    $fila = $resultado->fetch_row();
    $max_id = $fila[0];
    $nuevo_id = $max_id + 1;
    unset($conexion);
    return $nuevo_id;
}

function verMonitores()
{
    $conexion = conectarUsuarios();
    $select_cliente = "SELECT * from monitores";

    //para recorrer los id para los puntos
    $resultado = $conexion->query($select_cliente);
    $contador = 0;

    while ($fila = $resultado->fetch_array()) {
        $contador++;
?>
        <div class="divTableRow">
            <div class="divTableCelda"><?php echo "${fila['Nombre']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['Apellidos']}"; ?></div>
            <div class="divTableCelda">
                <input type="checkbox" class="boton-checkbox" id="eChkUsuario<?php echo $contador ?>">
                <label for="eChkUsuario<?php echo $contador ?>" class="tresbotones">...</label>
                <div class="a-ocultar"><?php echo "${fila['Telefono']}"; ?></div>
            </div>
            <div class="divTableCelda">
                <div class="boton">
                    <input type="checkbox" class="boton-checkbox" id="eChkBotones<?php echo $contador ?>">
                    <label for="eChkBotones<?php echo $contador ?>" class="tresbotones">...</label>
                    <form class="a-ocultar" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                        <input type='hidden' value="<?php echo "${fila['id']}" ?>" name="id">
                        <button type="submit" name="verMas"><img src="../imagenes/verMas.png" alt=""></button>
                    </form>

                    <form class="a-ocultar" name="editar" action="modificarClientes.php" method="POST">
                        <input type='hidden' value="<?php echo "${fila['id']}" ?>" name="id">
                        <!-- <input type="submit" name="editar_cliente" value="modificar"> -->
                        <button type="submit" name="ediar_cliente"><img src="../imagenes/editar.png" alt=""></button>
                    </form>

                    <form class="a-ocultar" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                        <input type='hidden' value="<?php echo "${fila['id']}" ?>" name="id">
                        <!-- <input type="submit" name="borrar" value="borrar"> -->
                        <button type="submit" name="borrar"><img src="../imagenes/delete.png" alt=""></button>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    if (isset($_POST["borrar"])) {
        borrarMonitores();
    }

    // if (isset($_POST["verMas"])) {
    //     verMas();
    // }
}

//Para actualizar los daros de los clientes
function modificarMonitores()
{
    $conexion = conectarUsuarios();
    if ($_POST) {
        //si me piden que modifique los datos los modifico
        if (isset($_POST["modificar_datos_clientes"])) {

            //Guardo los parametros en variables
            $id = $_POST["id"];
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $dni = $_POST["dni"];
            $telefono = $_POST["telefono"];
            $salario = $_POST["salario"];

            //Vamos a realizar una consulta UPDATE para actuliazar los datos de los clientes
            $actualizarMonitores =
                "UPDATE monitores " .
                "SET Nombre = '$nombre', Apellidos='$apellidos', DNI='$dni', " .
                " Telefono=$telefono, " .
                " Salario=$salario " .
                "WHERE id=$id";
            echo $actualizarMonitores;
            //exit;
            $resultado = $conexion->query($actualizarMonitores);

            if ($resultado) {
                header("Location:verMonitores.php");
                echo "<p>Se ha modificado $conexion->affected_rows registros con exito</p>";
            } else {
                echo "Tuvimos problemas en la modificacion, intentelo de nuevo mas tarde";
            }
        }
    }

    visualizarDatosMonitores();
}

function visualizarDatosMonitores()
{
    $conexion = conectarUsuarios();

    $select_cliente = "SELECT * from monitores WHERE id=$_POST[id]";
    $resultado = $conexion->query($select_cliente);

    $fila = $resultado->fetch_array();
    ?>
    <form class="Modificar" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
        <input type='hidden' value="<?php echo "${fila['id']}" ?>" name="id">
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
                <label>DNI:</label>
                <input type="text" value="<?php echo "${fila['DNI']}" ?>" id="dni" name="dni">
            </div>
            <div>
                <label>Telefono:</label>
                <input type="number" value="<?php echo "${fila['Telefono']}" ?>" id="telefono" name="telefono">
            </div>
            <label>Salario:</label>
            <input type="text" value="<?php echo "${fila['Salario']}" ?>" id="observaciones" name="salario">
        </div>
        <input type="submit" class="enviar" name="modificar_datos_clientes" value="Modificar">
    </form>
<?php
}

function borrarMonitores()
{
    $conexion = conectarUsuarios();

    $borrar_cliente = "DELETE from monitores WHERE id=$_POST[id]";
    $resultado = $conexion->query($borrar_cliente);

    if ($resultado) {
        echo '<p>Se ha borrado un cliente' . $conexion->affected_rows . ' registro con exito</p>';
    } else {

        echo '<p>Tuvimos problemas con la eliminacion del clientes, intentalo de nuevo más tarde</p>';
    }
}

function anadirMonitores()
{
    $conexion = conectarUsuarios();

    //Guardo los parametros en variables
    $codigo = maximoIdMonitores();
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $dni = $_POST["dni"];
    $telefono = $_POST["telefono"];
    $salario = $_POST["salario"];

    $anadir_monitores = "INSERT INTO monitores (id,Nombre,Apellidos,DNI,Telefono,
            Salario) 
            VALUES($codigo,'$nombre','$apellidos','$dni',$telefono,$salario)";
    $resultado = $conexion->query($anadir_monitores);

    if ($resultado) {
        header("Location:verMonitores.php");
        echo "<p>Se ha añadido $conexion->affected_rows registros con exito</p>";
    } else {
        echo "Tuvimos problemas en la insercion, intentelo de nuevo mas tarde";
    }
}
