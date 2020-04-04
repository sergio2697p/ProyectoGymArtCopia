<?php
include("../BBDD/conexionBBDD.php");
header('Content-type: application/vnd.ms-word');
$hoy = date("Y-m-d");
header("Content-Disposition: attachment; filename=Lista de mensualidades $hoy.doc");
?>
<h1>Lista de Mensualidades</h1>
<table border='1' cellpadding='1' cellspacing='1'>
  <tr>
    <td><strong>Nombre</strong></td>
    <td><strong>Dias de la Semana</strong></td>
    <td><strong>Precio</strong></td>
  </tr>
  <?php
  $conexion = conectarUsuarios();
  $select_cliente = "SELECT * from mensualidades";
  $resultado = $conexion->query($select_cliente);
  while ($fila = $resultado->fetch_array()) {
    //         
  ?>
    <tr>
      <td><?php echo "${fila['nombreMen']}"; 
          ?></td>
      <td><?php echo "${fila['diasSemana']}"; 
          ?></td>
      <td><?php echo "${fila['precio']}"; 
          ?></td>
    </tr>
  <?php
  }
  ?>

</table>
<strong style="color:red;">Fecha: <?php echo $hoy = date("d-m-Y H:i:s"); ?></strong>
