<?php
include '../BBDD/conexionBBDD.php';
include '../BBDD/peticiones.php';

if ($_POST) {
    registrarUsuarios();
} else {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Registro</title>
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
        include '../header.php';
        ?>
        <main>
            <section>
                <div class="registrarte">
                    <h1>Registrate</h1>
                    <form action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="post">
                        <div>
                            <label>Nick: </label>
                            <input type="text" name="nick" placeholder="Nombre">
                        </div>
                        <div>
                            <label>Contraseña: </label>
                            <input type="password" name="contrasena" placeholder="contraseña">
                        </div>
                        <div>
                            <label>Repita contraseña: </label>
                            <input type="password" name="contrasena" placeholder="repite contraseña">
                        </div>
                        <div>
                            <label>Correo Electronico:</label>
                            <input type="text" name="mail" placeholder="Introduzca su correo electronico">
                        </div>

                        <label>Tipo de Cuota:</label>
                        <div class="TipoCuota">
                            <input type="radio" name="Cuota" value="1" checked>basica
                            <input type="radio" name="Cuota" value="2">Avanzada
                            <input type="radio" name="Cuota" value="3">Ultra
                        </div>

                        <input type="submit" name="registrar_usuario" value="Registrate">
                    </form>
                </div>
            </section>
        </main>
        <?php include "../footer.php"; ?>
        </div>
    </body>

    </html>
<?php
}
?>