<?php
include 'conexionBBDD.php';

if (isset($_REQUEST['type']) == 'mostrarpagos') {
    $variable2 = verPagos();
    return $variable2;
}

if (isset($_REQUEST['type']) == 'mostrarDeudas') {
    $variable3 = listaDeudores();
    return $variable3;
}


function verPagos()
{
    $conexion = conectarUsuarios();
    $select_pagos = " SELECT clientes.Nombre as nombreCliente, mensualidades.Nombre as nombreMensualidad, pagos.Mes as mes,pagos.Anio as anio,pagos.Pagado as pagado
    FROM mensualidades INNER JOIN pagos INNER JOIN clientes ON mensualidades.CodigoMensualidad = pagos.CodigoMensualidad
   WHERE clientes.CodigoCliente=pagos.CodigoCliente And pagado = 'Si'";
    $resultado = $conexion->query($select_pagos);
    $contador = 0;

    while ($fila = $resultado->fetch_array()) {
        $contador++;

?>

        <div class="divTableRow">
            <div class="divTableCelda"><?php echo "${fila['nombreCliente']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['nombreMensualidad']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['mes']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['anio']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['pagado']}"; ?></div>
        </div>
    <?php
    }
}

function listaDeudores()
{
    $conexion = conectarUsuarios();
    $select_deudores = " SELECT clientes.Nombre as nombreCliente, mensualidades.Nombre as nombreMensualidad, pagos.Mes as mes,pagos.Anio as anio,pagos.Pagado as pagado
    FROM mensualidades INNER JOIN pagos INNER JOIN clientes ON mensualidades.CodigoMensualidad = pagos.CodigoMensualidad
   WHERE clientes.CodigoCliente=pagos.CodigoCliente And pagado = 'No'";


    $resultado = $conexion->query($select_deudores);
    while ($fila = $resultado->fetch_array()) {
    ?>

        <div class="divTableRow">
            <div class="divTableCelda"><?php echo "${fila['nombreCliente']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['nombreMensualidad']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['mes']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['anio']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['pagado']}"; ?></div>
        </div>
<?php
    }
}
?>