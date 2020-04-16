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
      <td>Apellidos</td>
      <td>Correo</td>
    </tr>
    <!-- <div>
    <div>Nombre</div>
    <div>Apellidos</div>
    <div>Correo</div>
  </div> -->

    <?php
    $conexion = conectarUsuarios();
    $select_cliente = "SELECT * from clientes";

    //para recorrer los id para los puntos
    $resultado = $conexion->query($select_cliente);
    while ($fila = $resultado->fetch_array()) {
    ?>
      <tr>
        <td><?php echo "${fila['Nombre']}"; ?></td>
        <td><?php echo "${fila['Apellidos']}"; ?></td>
        <td><?php echo "${fila['CorreoElectronico']}"; ?></td>
      </tr>
    <?php
    }
    ?>
  </table>
</body>

</html>