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
        <div class="clientes">
            <?php
            include 'menuOpciones.php';
            verMensualidades();
            ?>
        </div>
    </section>
    <?php
    include '../footer.php';
    ?>
</body>

</html>