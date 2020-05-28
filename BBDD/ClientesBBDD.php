<?php
include '../funciones/funciones.php';
//------------------------------------------------BUSCAR CLIENTES ACTIVOS---------------------------------------------------------------------------------------//
function buscarClientes($estado)
{
    $conexion = conectarUsuarios();

    $buscar = $_POST["informacion"];
    $buscador = "SELECT * FROM clientes WHERE Activo = $estado AND (Nombre LIKE '%$buscar%' OR Apellidos LIKE '%$buscar%')";
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
                <div class="a-ocultar"><?php echo "${fila['CorreoElectronico']}"; ?></div>
            </div>

            <div class="divTableCelda">
                <div class="boton">
                    <input type="checkbox" class="boton-checkbox" id="eChkBotones<?php echo $contador ?>">
                    <label for="eChkBotones<?php echo $contador ?>" class="tresbotones">...</label>
                    <form class="a-ocultar" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                        <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
                        <button type="submit" name="verMas"><img src="../imagenes/verMas.png" alt=""></button>
                    </form>

                    <form class="a-ocultar" name="editar" action="modificarClientes.php" method="POST">
                        <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
                        <!-- <input type="submit" name="editar_cliente" value="modificar"> -->
                        <button type="submit" name="ediar_cliente"><img src="../imagenes/editar.png" alt=""></button>
                    </form>

                    <form class="a-ocultar" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                        <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
                        <!-- <input type="submit" name="borrar" value="borrar"> -->
                        <button type="submit" name="borrar"><img src="../imagenes/delete.png" alt=""></button>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
}

//------------------------------------------------ VER CLIENTES ---------------------------------------------------------------------------------------//
function verClientes($estado)
{
    $conexion = conectarUsuarios();

    $CantidadMostrar = 5;

    // Validado de la variable GET
    $compag = (int) (!isset($_GET['pag'])) ? 1 : $_GET['pag'];
    $TotalReg = $conexion->query("SELECT * FROM clientes");

    //Se divide la cantidad de registro de la BD con la cantidad a mostrar 
    $TotalRegistro  = ceil($TotalReg->num_rows / $CantidadMostrar);


    //consulta query para empezar desde 0 hasta todos la cantidad que hay que mostrar en los registros
    $select_cliente = "SELECT * from clientes where Activo = $estado LIMIT " . (($compag - 1) * $CantidadMostrar) . ",$CantidadMostrar ";

    // $select_cliente = "SELECT * from clientes where Activo = 1 ";
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
                <div class="a-ocultar"><?php echo "${fila['CorreoElectronico']}"; ?></div>
            </div>
            <div class="divTableCelda">
                <div class="boton">
                    <input type="checkbox" class="boton-checkbox" id="eChkBotones<?php echo $contador ?>">
                    <label for="eChkBotones<?php echo $contador ?>" class="tresbotones">...</label>
                    <form class="a-ocultar" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                        <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
                        <button type="submit" name="verMas"><img src="../imagenes/verMas.png" alt=""></button>
                    </form>

                    <form class="a-ocultar" name="editar" action="modificarClientes.php" method="POST">
                        <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
                        <!-- <input type="submit" name="editar_cliente" value="modificar"> -->
                        <button type="submit" name="ediar_cliente"><img src="../imagenes/editar.png" alt=""></button>
                    </form>

                    <form class="a-ocultar" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                        <input type='hidden' value="<?php echo "${fila['CodigoCliente']}" ?>" name="id">
                        <!-- <input type="submit" name="borrar" value="borrar"> -->
                        <button type="submit" name="borrar"><img src="../imagenes/delete.png" alt=""></button>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="paginas">
        <div class="botonesPaginas">
            <div class="links">

            <?php
            /*Sector de Paginacion */

            //Se resta y suma con el numero de pag actual con el cantidad de 
            //números  a mostrar
            $Desde = $compag - (ceil($CantidadMostrar / 2) - 1);
            $Hasta = $compag + (ceil($CantidadMostrar / 2) - 1);

            //Se valida
            $Desde = ($Desde < 1) ? 1 : $Desde;
            $Hasta = ($Hasta < $CantidadMostrar) ? $CantidadMostrar : $Hasta;
            //Se muestra los números de paginas
            for ($i = $Desde; $i <= $Hasta; $i++) {
                //Se valida la paginacion total
                //de registros
                if ($i <= $TotalRegistro) {
                    //Validamos la pag activo
                    if ($i == $compag) {
                        echo "<a href=\"?pag=" . $i . "\">" . $i . "</a>";
                    } else {
                        echo "<a href=\"?pag=" . $i . "\">" . $i . "</a>";
                    }
                }
            }
            ?>
            </div>
        </div>
    </div>
    <?php
    // echo "<b>La cantidad de registro se dividió a: </b>".$TotalRegistro." para mostrar 5 en 5<br>";
    if (isset($_POST["borrar"])) {
        CambiarEstadoClientes();
    }

    if (isset($_POST["verMas"])) {
        verMas();
    }
}

//------------------------------------------------VER MAS INFORMACION---------------------------------------------------------------------------------------//

function verMas()
{
    $conexion = conectarUsuarios();
    $select_cliente = "SELECT * from clientes where CodigoCliente = $_POST[id] ";

    $resultado = $conexion->query($select_cliente);

    while ($fila = $resultado->fetch_array()) {
        $telefono = $fila['Telefono'];
        $poblacion = $fila['Poblacion'];
        $edad = $fila['Edad'];
        $altura = $fila['Altura'];
        $peso = $fila['Peso'];
        $actividadFisica = $fila['ActividadFisica'];
        $lesiones = $fila['Lesiones'];
        $domicilio = $fila['Domicilio'];


        echo "<script> Swal.fire({
            title: 'OTRA INFORMACION',
            html: '<b>Telefono:</b> $telefono </br> <b>poblacion:</b> $poblacion <br> <b>Domicilio:</b> $domicilio <br> <b>Edad:</b> $edad años <br> <b>Altura:</b> $altura metros <br> <b>Peso:</b> $peso kg <br> <b>Lesiones:</b> $lesiones <br><b>Actividad Fisica:</b> $actividadFisica',
            type: 'error',
          });</script>";
    }
}



//------------------------------------------------CAMBIAR DE ESTADO ACTIVO A INACTIVO---------------------------------------------------------------------------------------//

function CambiarEstadoClientes()
{
    $conexion = conectarUsuarios();
    $select_cliente = "SELECT activo from clientes where CodigoCliente=$_POST[id] and activo = 1";
    //echo $select_cliente;
    $resultado_cliente = $conexion->query($select_cliente);

    if ($resultado_cliente->fetch_array() != null) {
        $cambiarEstadoCliente = "UPDATE clientes " .
            "SET Activo=0 " .
            "WHERE CodigoCliente=$_POST[id]";

        // echo $cambiarEstadoCliente;
        $resultado = $conexion->query($cambiarEstadoCliente);

        if ($resultado) {
            echo '<p>Operacion correcta</p>';
        } else {

            echo '<p>Tuvimos problemas con la operacion del cliente, intentalo de nuevo más tarde</p>';
        }
    } else {
        $cambiarEstadoClientes = "UPDATE clientes " .
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


//------------------------------------------------MODIFICAR CLIENTES---------------------------------------------------------------------------------------//

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

//------------------------------------------------VISUALIZAR DATOS DE CLIENTES---------------------------------------------------------------------------------------//

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



//------------------------------------------------AÑADIR CLIENTES---------------------------------------------------------------------------------------//

function anadirClientes()
{
    $conexion = conectarUsuarios();

    //Guardo los parametros en variables
    $codigo = maximoCodigoTabla("clientes","CodigoCliente");
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $domicilio = $_POST["domicilio"];
    $poblacion = $_POST["poblacion"];
    $correoElectronico = $_POST["mail"];
    $telefono = $_POST["movil"];
    $Observaciones = $_POST["Observaciones"];
    $peso = $_POST["peso"];
    $altura = $_POST["altura"];
    $masaMuscular=$_POST["masaMuscular"];
    $edad = $_POST["edad"];
    $actividadFisica = $_POST["actividad"];
    $lesiones = $_POST["lesiones"];

    $anadir_cliente = "INSERT INTO clientes (CodigoCliente,Nombre,Apellidos,Domicilio,Poblacion,
            CorreoElectronico,Telefono,Observaciones,Peso,Altura,MasaCorporal,Edad,ActividadFisica,Lesiones,Activo) 
            VALUES($codigo,'$nombre','$apellidos','$domicilio','$poblacion','$correoElectronico',
            $telefono,'$Observaciones',$peso,$altura,$masaMuscular,$edad,'$actividadFisica','$lesiones',1)";
            echo "<p>$anadir_cliente </p>";
    $resultado = $conexion->query($anadir_cliente);

    if ($resultado) {
        header("Location:verClientes.php");
        echo "<p>Se ha añadido $conexion->affected_rows registros con exito</p>";
    } else {
        echo "Tuvimos problemas en la insercion, intentelo de nuevo mas tarde";
    }
}


    