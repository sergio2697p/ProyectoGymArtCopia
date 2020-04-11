<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos</title>
    <link rel="stylesheet" href="../css/estilos_xs.css"><!--movil-->
    <link rel="stylesheet" media=" all and (min-device-width : 768px) and (max-device-width : 991px)" href="../css/estilos_sm.css"><!--IPAD vertical-->
    <link rel="stylesheet" media=" all and (min-device-width : 992px) and (max-device-width : 1199px) " href="../css/estilos_md.css"><!--IPAD horizontal-->
    <link rel="stylesheet" media=" all and (min-device-width : 1200px)" href="../css/estilos_lg.css"><!--monitor paronamico-->
</head>

<body>
    <?php
    include '../header.php';
    ?>
    <section>
        <div>
            <div class="gestionar_pagos">
                <h1>Gestionar Pagos</h1>
                <label>Seleccione mes y año</label>
                <input type="submit" value="Buscar">
            </div>
            <div class="lista_pagadores">
                <h2>Lista Pagadores</h2>
            </div>
            <div class="lista_deudores">
                <h2>Lista Deudores</h2>
            </div>
        </div>
    </section>
    <?php
    include '../footer.php';
    ?>
</body>

</html>