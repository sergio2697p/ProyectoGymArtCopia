<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos_xs.css"><!--movil-->
    <link rel="stylesheet" media=" all and (min-device-width : 768px) and (max-device-width : 991px)" href="../css/estilos_sm.css"><!--IPAD vertical-->
    <link rel="stylesheet" media=" all and (min-device-width : 992px) and (max-device-width : 1199px) " href="../css/estilos_md.css"><!--IPAD horizontal-->
    <link rel="stylesheet" media=" all and (min-device-width : 1200px)" href="../css/estilos_lg.css"><!--monitor paronamico-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>ver Mensualidades</title>
</head>

<body>
    <?php
    include '../BBDD/peticiones.php';
    include '../BBDD/conexionBBDD.php';
    include '../header.php';
    ?>
    <main>
    <section>
        <div class="clientes">
            <?php
            include 'menuOpciones.php';
            verMensualidades();
            ?>
        </div>
    </section>
    </main>
    <?php
    include '../footer.php';
    ?>
</body>

</html>