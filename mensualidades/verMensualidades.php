<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos_xs.css">
    <!--movil-->
    <link rel="stylesheet" media=" all and (min-device-width : 768px) and (max-device-width : 991px)" href="../css/estilos_sm.css">
    <!--IPAD vertical-->
    <link rel="stylesheet" media=" all and (min-device-width : 992px) and (max-device-width : 1199px) " href="../css/estilos_md.css">
    <!--IPAD horizontal-->
    <link rel="stylesheet" media=" all and (min-device-width : 1200px)" href="../css/estilos_lg.css">
    <!--monitor paronamico-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>ver Mensualidades</title>
</head>

<body>
    <?php
    include '../BBDD/mensualidadesBBDD.php';
    include '../BBDD/conexionBBDD.php';
    include '../header.php';
    ?>
    <main>
        <section>
            <div class="mensualidades">
                <?php
                include 'menuOpciones.php';
                ?>
                <div class="Tabla">
                    <h1 class="Titulo">LISTADO DE CLIENTES</h1>
                    <div class="contenidos">
                        <div class="Celda">
                            <div class="clase">Clase/Equipamiento</div>
                        </div>
                        <div class="Celda">
                            <div class="dia-semana">Dia a la semana</div>
                        </div>
                        <div class="Celda">
                            <div class="precio">Precio mensual</div>
                        </div>
                    </div>
                    <?php
                    verMensualidades();
                    ?>
                </div>
            </div>
        </section>
    </main>
    <?php
    include '../footer.php';
    ?>
</body>

</html>