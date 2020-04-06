<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesion</title>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" media=" only screen and (min-device-width : 320px) and (max-device-width : 600px)" href="../css/estilos_art_movil.css">
    <link rel="stylesheet" media=" only screen and (min-device-width : 601px) and (max-device-width : 1280px)" href="../css/estilos_art_table.css">
    <link rel="stylesheet" media=" only screen and (min-device-width : 1281px) " href="../css/estilos_art.css">
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