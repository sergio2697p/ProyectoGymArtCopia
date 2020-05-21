<?php
//  include '../BBDD/conexionBBDD.php';
include '../BBDD/pagosBBDD.php';
?>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</head>

<body>
    <?php
    include '../header.php';
    ?>
    <main>
        <section>
            <div class="menu">
                <h1 class="Titulo">LISTADO DE PAGOS</h1>
                <div class="buscador">
                    <form action="buscador.php" method="POST">
                        <div class="input">
                            <input type="search" name="informacionPorMes" id="" class="i_buscar" placeholder="Buscar por mes">
                            <button type="submit" name="buscarMes"><img src="../imagenes/lupa.png" alt=""></button>
                            <input type="search" name="informacionPorAnio" id="" class="i_buscar" placeholder="Buscar por año">
                            <button type="submit" name="buscarAnio"><img src="../imagenes/lupa.png" alt=""></button>

                        </div>
                    </form>
                </div>

                <?php
                include 'menuOpciones.php';
                ?>
                <div class="selectPagos">
                    <form action="" method="post">
                        <label>Selecciona que tipo de pago quieres visualizar:</label>
                        <select onchange="enviar()" name="tiposDePagos" id="pagos">
                            <option value="" selected>-----------</option>
                            <option value="listaPagos">Lista de Pagos</option>
                            <option value="ListaDeDeudores">Lista de Deudores</option>
                        </select>
                    </form>
                </div>

                <div class="divTable cliente">
                    <div class="contenidos">
                        <div class="divTableRow">
                            <div class="divTableCabeza">Nombre</div>
                            <div class="divTableCabeza">Mensualidad</div>
                            <div class="divTableCabeza">Mes</div>
                            <div class="divTableCabeza">Año</div>
                            <div class="divTableCabeza">Importe</div>
                            <div class="divTableCabeza">Pagado</div>
                        </div>
                    </div>
                    
                    <?php
                    if (isset($_POST["buscarMes"])) {
                        buscarPorMes();
                    } else {
                        buscarPorAnio();
                    }

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