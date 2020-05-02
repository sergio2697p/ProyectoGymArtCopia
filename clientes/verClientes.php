<?php
include '../BBDD/conexionBBDD.php';
include '../BBDD/clientesBBDD.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
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
            <div class="menu">
                <?php
                include 'menuOpciones.php';
                ?>

                <div class="divTable cliente">
                    <div class="contenidos">
                        <div class="divTableRow">
                            <div class="divTableCabeza">Nombre</div>
                            <div class="divTableCabeza">Apellidos</div>
                            <div class="divTableCabeza">Correo</div>
                            <!-- <div class="divTableCabeza">Opciones</div> -->
                        </div>
                    </div>
                    <div class="divTableBody">
                        <?php
                        verClientes();
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