<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesion</title>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="../css/estilos.css"><!--estilos comunes a todas las pantallas-->
    <link rel="stylesheet" media=" all and (max-device-width : 767px)" href="../css/estilos_xs.css"><!--movil-->
    <link rel="stylesheet" media=" all and (min-device-width : 768px) and (max-device-width : 991px)" href="../css/estilos_sm.css"><!--IPAD vertical-->
    <link rel="stylesheet" media=" all and (min-device-width : 992px) and (max-device-width : 1199px) " href="../css/estilos_md.css"><!--IPAD horizontal-->
    <link rel="stylesheet" media=" all and (min-device-width : 1200px)" href="../css/estilos_lg.css"><!--monitor paronamico-->
    <!-- <link rel="stylesheet" media="screen and (min-width:321px) and (max-width:480px)" href="css/tablet.css"> -->

    <!-- <script src="javascript/commonScripts.js"></script> -->
</head>

<body>

    <?php
    include "../header.php";
    include '../BBDD/conexionBBDD.php';
    include '../BBDD/peticiones.php';

    if ($_POST) {
        iniciarSesion();
    } else {
    ?>
        <main>
            <section>
                <div class="indentificacion">
                    <div class="imagen">
                        <!-- <img src="../imagenes/logo1.png" alt=""> -->
                        <h1>Iniciar Sesion</h1>
                    </div>

                    <form class="form" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                        <div>
                            <label>Usuario:</label>
                            <input id="usuario" type="text" name="usuario">
                        </div>
                        <div>
                            <label>Contrasena:</label>
                            <input id="contrasena1" type="password" name="contrasena">
                        </div>
                        <input type="submit" id="enviar" value="Iniciar sesion">
                        <a href="cambiar_contrasena.php"><input type="button" id="cambiar" value="¿Olvidaste la contrasena?"></a>
                    </form>

                </div>
            </section>
        </main>
    <?php
    }
    include "../footer.php";
    ?>
</body>

</html>