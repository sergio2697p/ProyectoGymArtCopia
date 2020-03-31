<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Mensualidad</title>
    <link rel="stylesheet" href="../css/estilos_art.css">
</head>
<body>

<?php
include '../header.php';
include '../BBDD/conexionBBDD.php';
include '../BBDD/peticiones.php';
?>
<section>
    <?php modificarMensualidades();?>
</section>
<?php
include '../footer.php';
?>
    
</body>
</html>