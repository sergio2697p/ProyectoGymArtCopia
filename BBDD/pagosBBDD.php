<?php
function verPagos()
{
    $conexion = conectarUsuarios();
    $select_pagos = "SELECT clientes.Nombre as nombreCliente, 
    mensualidades.nombreMen as nombreMensualidad, pagos.fecha, pagos.pago 
    FROM mensualidades 
    INNER JOIN pagos INNER JOIN clientes ON mensualidades.id = pagos.idMensualidades 
    WHERE clientes.CodigoCliente=pagos.idCliente;";
    $resultado = $conexion->query($select_pagos);
    $contador = 0;

    while ($fila = $resultado->fetch_array()) {
        $contador++;

?>

        <div class="divTableRow">
            <div class="divTableCelda"><?php echo "${fila['nombreCliente']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['nombreMensualidad']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['fecha']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['pago']}"; ?></div>
        </div>
    <?php
    }
}

function listaDeudores()
{
    $conexion = conectarUsuarios();
    $select_deudores = 'SELECT clientes.Nombre as nombreCliente, 
    mensualidades.nombreMen as nombreMensualidad, pagos.fecha, pagos.pago 
    FROM mensualidades 
    INNER JOIN pagos INNER JOIN clientes ON mensualidades.id = pagos.idMensualidades 
    WHERE clientes.CodigoCliente=pagos.idCliente AND pagos.pago="No"';

    $resultado = $conexion->query($select_deudores);
    while ($fila = $resultado->fetch_array()) {
    ?>

        <div class="divTableRow">
            <div class="divTableCelda"><?php echo "${fila['nombreCliente']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['nombreMensualidad']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['fecha']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['pago']}"; ?></div>
        </div>
<?php
    }
}
?>