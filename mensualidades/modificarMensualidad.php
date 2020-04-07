<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css"><!--estilos comunes a todas las pantallas-->
    <link rel="stylesheet" media=" all and (max-device-width : 767px)" href="../css/estilos_xs.css"><!--movil-->
    <link rel="stylesheet" media=" all and (min-device-width : 768px) and (max-device-width : 991px)" href="../css/estilos_sm.css"><!--IPAD vertical-->
    <link rel="stylesheet" media=" all and (min-device-width : 992px) and (max-device-width : 1199px) " href="../css/estilos_md.css"><!--IPAD horizontal-->
    <link rel="stylesheet" media=" all and (min-device-width : 1200px)" href="../css/estilos_lg.css"><!--monitor paronamico-->
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