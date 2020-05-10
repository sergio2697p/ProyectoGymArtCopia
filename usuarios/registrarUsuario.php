<?php
include '../BBDD/conexionBBDD.php';
include '../BBDD/usuariosBBDD.php';
include '../funciones/funciones.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="../css/estilos_xs.css">
    <link rel="stylesheet" href="../css/sweetalert.css">

    <!--movil-->
    <link rel="stylesheet" media=" all and (min-device-width : 768px) and (max-device-width : 991px)" href="../css/estilos_sm.css">
    <!--IPAD vertical-->
    <link rel="stylesheet" media=" all and (min-device-width : 992px) and (max-device-width : 1199px) " href="../css/estilos_md.css">
    <!--IPAD horizontal-->
    <link rel="stylesheet" media=" all and (min-device-width : 1200px)" href="../css/estilos_lg.css">
    <!--monitor paronamico-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>    
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- <script src="../javascript/sweetalert.min.js"></script> -->
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
                            <input type="text" name="nick" placeholder="Nombre" <?php mostrar_campo('nick') ?> required>
                        </div>
                        <div>
                            <label>Contraseña: </label>
                            <input type="password" name="contrasena" placeholder="contraseña" <?php mostrar_campo('contrasena') ?> required>
                        </div>
                        <div>
                            <label>Repita contraseña: </label>
                            <input type="password" name="contrasena-repetida" placeholder="repite contraseña" <?php mostrar_campo('contrasena-repetida') ?> required>
                        </div>
                        <div>
                            <label>Correo Electrónico:</label>
                            <input type="text" name="mail" placeholder="Introduzca su correo electronico" <?php mostrar_campo('mail') ?> required>
                        </div>

                       <a href="inicioSesion.php"> <button>Atrás</button></a>
                        <button type="submit" name="registrar_usuario" id="Registrarse">Registrate</button>
                    </form>
                </div>
        </section>
        <section class="menu_registrarse">
        <?php
            if ($_POST) {
                registrarUsuarios();
            }
            ?>
        </section>

    </main>

    <?php include "../footer.php"; ?>
    </div>
</body>

</html>
