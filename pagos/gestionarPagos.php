<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos</title>
    <link rel="stylesheet" media=" only screen and (min-device-width : 320px) and (max-device-width : 600px)" href="../css/estilos_art_movil.css">
    <link rel="stylesheet" media=" only screen and (min-device-width : 601px) and (max-device-width : 1280px)" href="../css/estilos_art_tablet.css">
    <link rel="stylesheet" media=" only screen and (min-device-width : 1281px) " href="../css/estilos_art.css">
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