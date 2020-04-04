<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media=" only screen and (min-device-width : 320px) and (max-device-width : 600px)" href="../css/estilos_art_movil.css">
    <link rel="stylesheet" media=" only screen and (min-device-width : 601px) and (max-device-width : 1280px)" href="../css/estilos_art_tablet.css">
    <link rel="stylesheet" media=" only screen and (min-device-width : 1281px) " href="../css/estilos_art.css">
    <title>Añadir Clientes</title>
    
</head>
<body>
    <?php
    include '../header.php';
    include '../BBDD/conexionBBDD.php';

    include '../BBDD/peticiones.php';
    if(isset($_POST["anadir_cliente"])){
        anadirClientes();
    }
    
    ?>
    <section>
        <form  class="anadirClientes" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
            <h1 class="TituloAnadirCliente">Añadir Cliente</h1>
        <div class="datosPersonales">
                <h1>Datos Personales</h1>
                <div>
                    <label>Nombre:</label>
                    <input type="text"name="nombre">
                </div>
                <div>
                    <label>Apellidos:</label>
                    <input type="text" name="apellidos">
                </div>
                <div>
                    <label>Domicilio:</label>
                    <input type="text" name="domicilio">
                </div>
                <div>
                    <label>Población:</label>
                    <input type="text" name="poblacion">
                </div>
                <div>
                    <label>Correo Electronico:</label>
                    <input type="text" name="mail">
                </div>
                <div>
                    <label>Telefono:</label>
                    <input type="number" name="movil">
                </div>
                <label>Observaciones:</label>
                <input type="text" name="Observaciones">
            </div>

            <div class="datosAdicionales">
                <h1>Información adicional</h1>
                <label>Peso:</label>
                <input type="number" name="peso">

                <div>
                    <label>Altura: (* En metros)</label>
                    <input type="number" name="altura">
                </div>
                <div>
                    <label>Edad:</label>
                    <input type="number" name="edad">
                </div>
                <div>
                    <label>Actividad fisíca:</label>
                    <input type="text" name="actividad">
                </div>
                <div>
                    <label>Lesiones:</label>
                    <input type="text" name="lesiones">
                </div>
            </div>
            <input type="submit" class="enviar" name="anadir_cliente" value="Añadir">
        </form>
    </section>
    <?php
    include '../footer.php';
    ?>
</body>
</html>