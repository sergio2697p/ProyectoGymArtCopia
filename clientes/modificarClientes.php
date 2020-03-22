<?php
include '../BBDD/conexionBBDD.php';
include '../BBDD/peticiones.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Clientes</title>
    <link rel="stylesheet" href="../css/estilos_art.css">
</head>

<body>
    <?php include '../header.php';?>
    <section>
    <?php
    modificarCLientes();
    ?>
    </section>
    <?php include '../footer.php';?>

</body>

</html>