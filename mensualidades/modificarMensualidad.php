<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media=" only screen and (min-device-width : 320px) and (max-device-width : 600px)" href="../css/estilos_art_movil.css">
    <link rel="stylesheet" media=" only screen and (min-device-width : 601px) and (max-device-width : 1280px)" href="../css/estilos_art_table.css">
    <link rel="stylesheet" media=" only screen and (min-device-width : 1281px) " href="../css/estilos_art.css">
    <title>Modificar Mensualidad</title>
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