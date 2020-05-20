<?php
include '../BBDD/conexionBBDD.php';
include '../BBDD/peticiones.php';

header("Content-type: application/vnd.ms-word");
header("Content-Disposition:attachment; Filename=ListadoClientes.doc");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta charset="Windows-1252" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1 align="center">LISTADO DE CLIENTES</h1>
  <table border="1" align="center">
    <tr>
      <td>Nombre</td>
      <td>Mensualidad</td>
      <td>Mes</td>
      <td>Año</td>
      <td>Importe</td>
      <td>Pagado</td>

    </tr>

    <?php
    $conexion = conectarUsuarios();
    $select_pagos = " SELECT clientes.Nombre as nombreCliente, mensualidades.Nombre as nombreMensualidad, pagos.Mes as mes,pagos.Anio as anio,pagos.Pagado as pagado, pagos.Importe as importe
    FROM mensualidades INNER JOIN pagos INNER JOIN clientes ON mensualidades.CodigoMensualidad = pagos.CodigoMensualidad
   WHERE clientes.CodigoCliente=pagos.CodigoCliente And pagado = 'Si' AND pagos.Anio='2020'";

    //para recorrer los id para los puntos
    $resultado = $conexion->query($select_pagos);
    while ($fila = $resultado->fetch_array()) {
    ?>
      <tr>
        <td><?php echo "${fila['nombreCliente']}"; ?></td>
        <td><?php echo "${fila['nombreMensualidad']}"; ?></td>
        <td><?php echo "${fila['mes']}"; ?></td>
        <td><?php echo "${fila['anio']}"; ?></td>
        <td><?php echo "${fila['importe']}€"; ?></td>
        <td><?php echo "${fila['pagado']}"; ?></td>
      </tr>
    <?php
    }
    ?>
  </table>
</body>

</html>