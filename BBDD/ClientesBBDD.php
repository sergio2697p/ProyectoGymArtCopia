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

//Buscar Clientes
function buscarClientes()
{
    $conexion = conectarUsuarios();

    $buscar = $_POST["informacion"];
    $buscador = "SELECT * FROM clientes WHERE Nombre LIKE '$buscar' OR Apellidos = '$buscar' ORDER BY Nombre ";
    //echo $buscador;
    $resultado = $conexion->query($buscador);
    $contador = 0;
    while ($fila = $resultado->fetch_array()) {
        $contador++;
?>
        <div class="divTableRow">
            <div class="divTableCelda"><?php echo "${fila['Nombre']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['Apellidos']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['Telefono']}"; ?></div>

            <div class="divTableCelda">
                <input type="checkbox" class="boton-checkbox" id="eChkUsuario<?php echo $contador ?>">
                <label for="eChkUsuario<?php echo $contador ?>" class="tresbotones">...</label>
                <div class="a-ocultar"><?php echo "${fila['CorreoElectronico']}"; ?>
                    <div class="boton">
                        <form name="editar" action="modificarClientes.php" method="POST">
                            <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
                            <!-- <input type="submit" name="editar_cliente" value="modificar"> -->
                            <button type="submit" name="ediar_cliente"><img src="../imagenes/editar.png" alt=""></button>
                        </form>

                        <form action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                            <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
                            <!-- <input type="submit" name="borrar" value="borrar"> -->
                            <button type="submit" name="borrar"><img src="../imagenes/delete.png" alt=""></button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    <?php
    }
}

//ver clientes que estan activos
function verClientes()
{
    $conexion = conectarUsuarios();
    $select_cliente = "SELECT * from clientes where Activo = 1";

    $resultado = $conexion->query($select_cliente);
    $contador = 0;

    while ($fila = $resultado->fetch_array()) {
        $contador++;
    ?>
        <div class="divTableRow">
            <div class="divTableCelda"><?php echo "${fila['Nombre']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['Apellidos']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['Telefono']}"; ?></div>

            <div class="divTableCelda">
                <input type="checkbox" class="boton-checkbox" id="eChkUsuario<?php echo $contador ?>">
                <label for="eChkUsuario<?php echo $contador ?>" class="tresbotones">...</label>
                <div class="a-ocultar"><?php echo "${fila['CorreoElectronico']}"; ?>
                    <div class="boton">
                        <form action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                            <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
                            <button type="submit" name="verMas"><img src="../imagenes/verMas.png" alt=""></button>
                        </form>

                        <form name="editar" action="modificarClientes.php" method="POST">
                            <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
                            <!-- <input type="submit" name="editar_cliente" value="modificar"> -->
                            <button type="submit" name="ediar_cliente"><img src="../imagenes/editar.png" alt=""></button>
                        </form>

                        <form action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                            <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
                            <!-- <input type="submit" name="borrar" value="borrar"> -->
                            <button type="submit" name="borrar"><img src="../imagenes/delete.png" alt=""></button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    <?php
    }
    if (isset($_POST["borrar"])) {
        CambiarEstadoClientes();
    }

    if (isset($_POST["verMas"])) {
        verMas();
    }
}

//para ver mas informacion sobreun usuario
function verMas()
{
    $conexion = conectarUsuarios();
    $select_cliente = "SELECT * from clientes where CodigoCliente = $_POST[id] ";

    $resultado = $conexion->query($select_cliente);

    while ($fila = $resultado->fetch_array()) {
        $telefono = $fila['Telefono'];
        $poblacion = $fila['Poblacion'];
        $lesiones = $fila['Lesiones'];

            echo "<script> Swal.fire({
            title: 'OTRA INFORMACION',
            html: 'Telefono $telefono </br> poblacion: $poblacion <br> Lesiones: $lesiones <br>',
            type: 'error',
          });</script>";
    }
}

//ver los clientes antiguos que ya no estan en my gym
function verClientesAntiguos()
{
    $conexion = conectarUsuarios();
    $select_cliente = "SELECT * from clientes where Activo = 0";

    $resultado = $conexion->query($select_cliente);
    $contador = 0;

    while ($fila = $resultado->fetch_array()) {
        $contador++;
    ?>
        <div class="divTableRow">
            <div class="divTableCelda"><?php echo "${fila['Nombre']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['Apellidos']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['Telefono']}"; ?></div>

            <div class="divTableCelda">
                <input type="checkbox" class="boton-checkbox" id="eChkUsuario<?php echo $contador ?>">
                <label for="eChkUsuario<?php echo $contador ?>" class="tresbotones">...</label>
                <div class="a-ocultar"><?php echo "${fila['CorreoElectronico']}"; ?>
                    <div class="boton">
                        <form name="editar" action="modificarClientes.php" method="POST">
                            <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
                            <!-- <input type="submit" name="editar_cliente" value="modificar"> -->
                            <button type="submit" name="ediar_cliente"><img src="../imagenes/editar.png" alt=""></button>
                        </form>

                        <form action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                            <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
                            <!-- <input type="submit" name="borrar" value="borrar"> -->
                            <button type="submit" name="borrar"><img src="../imagenes/delete.png" alt=""></button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    <?php
    }
    if (isset($_POST["borrar"])) {
        CambiarEstadoClientes();
    }
}

//para cambiar entre si estan activos o inactivos
function CambiarEstadoClientes()
{
    $conexion = conectarUsuarios();
    $select_cliente= "SELECT activo from clientes where CodigoCliente=$_POST[id] and activo = 1";
    //echo $select_cliente;
    $resultado_cliente=$conexion->query($select_cliente);

    if($resultado_cliente ->fetch_array() != null) {
        $cambiarEstadoCliente= "UPDATE clientes " .
        "SET Activo=0 " .
        "WHERE CodigoCliente=$_POST[id]";

        // echo $cambiarEstadoCliente;
        $resultado = $conexion->query($cambiarEstadoCliente);

        if ($resultado) {
            echo '<p>Operacion correcta</p>';
        } else {

            echo '<p>Tuvimos problemas con la operacion del cliente, intentalo de nuevo más tarde</p>';
        }

    }else {
        $cambiarEstadoClientes= "UPDATE clientes " .
        "SET Activo=1 " .
        "WHERE CodigoCliente=$_POST[id]";

        echo $cambiarEstadoClientes;
        $resultados = $conexion->query($cambiarEstadoClientes);

        if ($resultados) {
            echo '<p>Operacion correcta1</p>';
        } else {

            echo '<p>Tuvimos problemas con la operacion del cliente, intentalo de nuevo más tarde</p>';
        }
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
                <label>Email:</label>
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
            <input type="number" value="<?php echo "${fila['Peso']}" ?>" id="peso" name="peso" placeholder="Kg">

            <div>
                <label>Altura:</label>
                <input type="number" value="<?php echo "${fila['altura']}" ?>" id="altura" name="altura" placeholder="metros">
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
            CorreoElectronico,Telefono,Observaciones,Peso,Altura,Edad,ActividadFisica,Lesiones,Activo) 
            VALUES($codigo,'$nombre','$apellidos','$domicilio','$poblacion','$correoElectronico',
            $telefono,'$Observaciones',$peso,$altura,$edad,'$actividadFisica','$lesiones',1)";
    $resultado = $conexion->query($anadir_cliente);

    if ($resultado) {
        header("Location:verClientes.php");
        echo "<p>Se ha añadido $conexion->affected_rows registros con exito</p>";
    } else {
        echo "Tuvimos problemas en la insercion, intentelo de nuevo mas tarde";
    }
}
