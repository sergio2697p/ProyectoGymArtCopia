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
    <title>Añadir Clientes</title>
</head>
<body>
    <?php
    include '../header.php';
    include '../BBDD/conexionBBDD.php';

    include '../BBDD/peticiones.php';
    if(isset($_POST["anadir_mensualidad"])){
        anadirMensualidad();
    }
    
    ?>
    <section>
        <form  class="anadirMensualidad" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
            <h1 class="TituloAnadirCliente">Añadir Cliente</h1>
        <div class="datosPersonales">
                <h1>Añadir Mensualidad</h1>
                <div>
                    <label>Nombre de la mensualidad:</label>
                    <input type="text"name="nombreMen">
                </div>
                <div>
                    <label>Días:</label>
                    <input type="number" name="diasSemana">
                </div>
                <div>
                    <label>Precio:</label>
                    <input type="number" name="precio">
                </div>
                <div>
                    <label>Año:</label>
                    <input type="number" name="Anio">
                </div>
            </div>
            <input type="submit" class="enviar" name="anadir_mensualidad" value="Añadir">
        </form>
    </section>
    <?php
    include '../footer.php';
    ?>
</body>
</html>