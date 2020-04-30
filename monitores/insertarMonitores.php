<?php
include '../BBDD/conexionBBDD.php';
include '../BBDD/monitoresBBDD.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Monitores</title>
    <link rel="stylesheet" href="../css/estilos_xs.css"><!--movil-->
    <link rel="stylesheet" media=" all and (min-device-width : 768px) and (max-device-width : 991px)" href="../css/estilos_sm.css"><!--IPAD vertical-->
    <link rel="stylesheet" media=" all and (min-device-width : 992px) and (max-device-width : 1199px) " href="../css/estilos_md.css"><!--IPAD horizontal-->
    <link rel="stylesheet" media=" all and (min-device-width : 1200px)" href="../css/estilos_lg.css"><!--monitor paronamico-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
<body>
    <?php
    include '../header.php';
    if(isset($_POST["anadir_mensualidad"])){
        anadirMonitores();
    }
    
    ?>
    <main>
    <section>
        <form  class="anadirMensualidad" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
        <div class="datosPersonales">
                <h1>Añadir Monitor</h1>
                <div>
                    <label>Nombre de/la monitor/a:</label>
                    <input type="text" name="nombre">
                </div>
                <div>
                    <label>Apellidos:</label>
                    <input type="text" name="apellidos">
                </div>
                <div>
                    <label>DNI:</label>
                    <input type="text" name="dni">
                </div>
                <div>
                    <label>Telefono:</label>
                    <input type="number" name="telefono">
                </div>

                <div>
                    <label>Salario:</label>
                    <input type="number" name="salario">
                </div>
            </div>
            <input type="submit" class="enviar" name="anadir_mensualidad" value="Añadir">
        </form>
    </section>
    </main>
    <?php
    include '../footer.php';
    ?>
</body>
</html>