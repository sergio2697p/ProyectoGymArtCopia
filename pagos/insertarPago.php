<?php
include '../BBDD/pagosBBDD.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Clientes</title>
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
    if (isset($_POST["insertarPagos"])) {
        insertarPagos();
    }

    ?>
    <main>
        <section>
            <form class="anadirClientes" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                <h1 class="TituloAnadirCliente">Añadir Pago</h1>
                <div class="datosPersonales">
                    <div>
                        <label>Nombre del cliente:</label>
                        <!-- <input type="text" name="nombre"> -->
                        <select name="codigoCliente">
                        <?php 
                        selectNombreCliente();
                        ?>

                        </select>
                    </div>
                    <div>
                        <label>Mensualidad:</label>
                        <select name="codigoMensusalidad">
                        <?php 
                        selectMensualidad();
                        ?>
                        </select>
                    </div>

                    <div>
                        <label>Mes:</label>
                        <input type="text" name="mes">
                    </div>

                    <div>
                        <label>Año:</label>
                        <input type="number" name="anio">
                    </div>

                    <div>
                        <label>Importe:</label>
                        <input type="number" name="importe">
                    </div>

                    <div>
                        <label>Deuda:</label>
                        <input type="number" name="deuda">
                    </div>

                    <div>
                        <label>Pagado:</label>
                       <select name="pagado">
                           <option value="Si">Si</option>
                           <option value="Si">No</option>
                       </select>
                    </div>
                </div>

                    <!-- <div>
                        <label>Actividad fisíca:</label>
                        <select name="actividad" id="">
                            <option value="Principiante">Principiante</option>
                            <option value="Intermedio">Intermedio</option>
                            <option value="Extremo">Extremo</option>
                        </select>
                    </div> -->

                </div>
                <input type="submit" class="enviar" name="insertarPagos" value="Añadir">
            </form>
        </section>
    </main>
    <?php
    include '../footer.php';
    ?>
</body>

</html>