<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesion</title>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="../css/estilos_xs.css">
    <!--movil-->
    <link rel="stylesheet" media=" all and (min-device-width : 768px) and (max-device-width : 991px)" href="../css/estilos_sm.css">
    <!--IPAD vertical-->
    <link rel="stylesheet" media=" all and (min-device-width : 992px) and (max-device-width : 1199px) " href="../css/estilos_md.css">
    <!--IPAD horizontal-->
    <link rel="stylesheet" media=" all and (min-device-width : 1200px)" href="../css/estilos_lg.css">
    <!--monitor paronamico-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>

    <?php
    include "../header.php";
    include '../BBDD/conexionBBDD.php';
    include '../BBDD/usuariosBBDD.php';
    include '../BBDD/funciones.php';


    if ($_POST) {
        iniciarSesion();
    } else {
    ?>
        <main>
            <section>
                <div class="indentificacion">
                    <div class="titulo">
                        <h1>Iniciar Sesión</h1>
                    </div>

                    <form class="form" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                        <div>
                            <label>Usuario:</label>
                            <input id="usuario" type="text" name="usuario" <?php mostrar_campo('usuario') ?> required>
                        </div>
                        <div>
                            <label>Contraseña:</label>
                            <input id="contrasena1" type="password" name="contrasena" <?php mostrar_campo('contrasena') ?> required>
                        </div>

                            <button class="boton_enviar" type="submit">Acceder</button>
                            <a href="registrarUsuario.php"><button type="button" class="boton_registrar" value="Registrate">Registrate</button></a>
                            <a href="cambiar_contrasena.php"><button type="button" class="boton_olvidar_contrasena">¿Olvidaste la contraseña?</button></a>
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