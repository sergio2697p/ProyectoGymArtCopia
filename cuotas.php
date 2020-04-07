<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css"><!--estilos comunes a todas las pantallas-->
    <link rel="stylesheet" media=" all and (max-device-width : 767px)" href="css/estilos_xs.css"><!--movil-->
    <link rel="stylesheet" media=" all and (min-device-width : 768px) and (max-device-width : 991px)" href="css/estilos_sm.css"><!--IPAD vertical-->
    <link rel="stylesheet" media=" all and (min-device-width : 992px) and (max-device-width : 1199px) " href="css/estilos_md.css"><!--IPAD horizontal-->
    <link rel="stylesheet" media=" all and (min-device-width : 1200px)" href="css/estilos_lg.css"><!--monitor paronamico-->
    <title>Cuotas</title>
</head>

<body>

    <?php
    include 'header.php';
    ?>

    <section>
        <div class="cuotas"> 
            <h1 class="TituloCuota">TIPOS DE CUOTAS</h1>
            <div class="basica">
                <h1>BASICA</h1>
                <h2>Incluye:</h2>
                <ul>
                    <li>Las respectivas clases de GYM</li>
                    <li>Maquinas</li>
                </ul>
                <h1>29,90€</h1>
                <p>*Gastos de matriculacion incluidos</p>
            </div>
            <div class="avanzada">
                <h1>AVANZADA</h1>
                <h2>Incluye:</h2>
                <ul>
                    <li>Las respectivas clases de GYM</li>
                    <li>Maquinas</li>
                    <li>Sauna</li>
                    <li>Piscina</li>
                </ul>
                <h1>36,50€</h1>
                <p>*Gastos de matriculacion incluidos</p>
            </div>
            <div class="ultra">
                <h1>ULTRA</h1>
                <h2>Incluye:</h2>
                <ul>
                    <li>Las respectivas clases de GYM</li>
                    <li>Maquinas</li>
                    <li>Entrenador personal</li>
                </ul>
                <h1>Precio de la Basica + el precio segun el entrenador</h1>
                <p>*Gastos de matriculacion incluidos</p>
            </div>
        </div> 
    </section>

        <?php
        include 'footer.php';
        ?>
</body>

</html>