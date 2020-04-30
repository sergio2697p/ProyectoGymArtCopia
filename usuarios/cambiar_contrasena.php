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
        olvidarContraseña();
    } else {
    ?>
        <main>
            <section>
                <div class="indentificacion">
                    <div class="imagen">
                        <h1>Olvidar contraseña</h1>
                    </div>

                    <form class="form" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                        <div>
                            <label>Introduce tu usuario:</label>
                            <input id="usuario" type="text" name="nick" <?php mostrar_campo('nick') ?> required>
                        </div>
                        <div>
                            <label> Nueva Contraseña:</label>
                            <input id="contrasena1" type="password" name="contrasena" <?php mostrar_campo('contrasena') ?> required>
                        </div>

                        <div>
                            <label> Repita Contraseña:</label>
                            <input id="contrasena1" type="password" name="contrasena-repetida" <?php mostrar_campo('contrasena') ?> required>
                        </div>
                        
                        <input type="submit" id="enviar" value="Restaurar Contraseña">

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