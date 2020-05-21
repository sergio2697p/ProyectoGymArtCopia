<?php
include '../BBDD/mensualidadesBBDD.php';
include '../BBDD/conexionBBDD.php';
?>
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
    include '../header.php';
    ?>
    <main>
        <section>
            <div class="menu">
                <h1 class="Titulo">LISTADO DE MENSUALIDADES</h1>
                <div class="buscador">
                    <form action="buscador.php" method="POST">
                        <div class="input">
                            <input type="search" name="informacion" id="" class="i_buscar" placeholder="Buscar por apellido o nombre">
                            <button type="submit" name="buscarActivo"><img src="../imagenes/lupa.png" alt=""></button>
                        </div>
                    </form>
                </div>
                <?php
                include 'menuOpciones.php';
                ?>
                <div class="clientesAntiguos">
                    <button><a href="clientesAntiguos.php">CLIENTES INACTIVOS</a></button>
                </div>
                <div class="divTable cliente">
                    <div class="contenidos">
                        <div class="divTableRow">
                            <div class="divTableCabeza">Clase/Equipamiento</div>
                            <div class="divTableCabeza">Dia a la semana</div>
                            <div class="divTableCabeza">Precio mensual</div>
                            <div class="divTableCabeza">Accion</div>
                        </div>
                    </div>
                    <div class="divTableBody">
                        <?php
                        verMensualidades();
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    include '../footer.php';
    ?>
</body>

</html>