<?php
include("../BBDD/conexionBBDD.php");
header('Content-type: application/vnd.ms-word');
$hoy = date("Y-m-d");
header("Content-Disposition: attachment; filename=Lista de Clientes $hoy.doc");
?>
<h1>Lista de Clientes</h1>
<table border='1' cellpadding='1' cellspacing='1'>
  <tr>
    <td><strong>Nombre</strong></td>
    <td><strong>Apellidos</strong></td>
    <td><strong>Correo Electronico</strong></td>
  </tr>
  <?php
  $conexion = conectarUsuarios();
  $select_cliente = "SELECT * from clientes";
  $resultado = $conexion->query($select_cliente);
  while ($fila = $resultado->fetch_array()) {
    //         
  ?>
    <tr>
      <td><?php echo "${fila['Nombre']}"; 
          ?></td>
      <td><?php echo "${fila['Apellidos']}"; 
          ?></td>
      <td><?php echo "${fila['CorreoElectronico']}"; 
          ?></td>
    </tr>
  <?php
  }
  ?>

</table>
<strong style="color:red;">Fecha: <?php echo $hoy = date("d-m-Y H:i:s"); ?></strong>
