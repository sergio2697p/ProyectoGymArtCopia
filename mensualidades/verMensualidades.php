<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ver Mensualidades</title>
    <link rel="stylesheet" href="../css/estilos_art.css">
</head>

<body>
    <?php
    include '../BBDD/peticiones.php';
    include '../BBDD/conexionBBDD.php';

    include '../header.php';
    ?>
    <section>
        <?php
        include 'menuOpciones.php';
        verMensualidades(); 
        ?>
    </section>
    <?php
    include '../footer.php';
    ?>
</body>

</html>