<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="../css/estilos_art.css">
    <script src="javascript/commonScripts.js"></script>
</head>

<body>
    <?php
    session_start();
    ?>
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
                <h1> Campo de acceso</h1>
                <br>
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
    ?>
    <?php include "../footer.php"; ?>
</body>

</html>