<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos</title>
    <link rel="stylesheet" href="../css/estilos_xs.css">
    <!--movil-->
    <link rel="stylesheet" media=" all and (min-device-width : 768px) and (max-device-width : 991px)" href="../css/estilos_sm.css">
    <!--IPAD vertical-->
    <link rel="stylesheet" media=" all and (min-device-width : 992px) and (max-device-width : 1199px) " href="../css/estilos_md.css">
    <!--IPAD horizontal-->
    <link rel="stylesheet" media=" all and (min-device-width : 1200px)" href="../css/estilos_lg.css">
    <!--monitor paronamico-->
</head>

<body>
    <?php
    include '../BBDD/conexionBBDD.php';
    include '../BBDD/pagosBBDD.php';
    include '../header.php';

    ?>
    <main>
        <section>
            <div class="clientes">
                <div class="gestionar_pagos">
                    <div class="Tabla">
                        <h1 class="Titulo">Gestionar Pagos</h1>
                        <label>Buscar Fecha:</label>
                        <input type="date" name="" id="">
                        <input type="submit" value="Buscar">
                    </div>
                </div>

                <div class="lista_pagadores">
                    <div class="TablaListaPagados">
                        <h1 class="Titulo">LISTA DE PAGADORES</h1>
                        <div class="contenidos">
                            <div class="Celda">
                                <div class="nombre">Nombre del Cliente</div>
                            </div>
                            <div class="Celda">
                                <div class="apellidos">Nombre de la Mensualidad</div>
                            </div>
                            <div class="Celda">
                                <div class="Fecha">Fecha</div>
                            </div>

                            <div class="Celda">
                                <div class="Pagado">Pagado</div>
                            </div>
                        </div>
                        <?php
                        verPagos();
                        ?>
                    </div>
                </div>
                <div class="lista_deudores">
                    <div class="TablaListaDeudores">
                        <h1 class="Titulo">Lista Deudores</h1>
                        <div class="contenidos">
                            <div class="Celda">
                                <div class="nombre">Nombre del Cliente</div>
                            </div>
                            <div class="Celda">
                                <div class="apellidos">Nombre de la Mensualidad</div>
                            </div>
                            <div class="Celda">
                                <div class="Fecha">Fecha</div>
                            </div>

                            <div class="Celda">
                                <div class="Pagado">Pagado</div>
                            </div>
                        </div>
                        <?php
                        listaDeudores();
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