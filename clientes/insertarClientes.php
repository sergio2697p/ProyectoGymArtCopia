<?php
include '../BBDD/conexionBBDD.php';
include '../BBDD/clientesBBDD.php';
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
    // if (isset($_POST["peso"], $_POST["altura"])) {
    //     echo calcularMasaCorporal();
    // }
    if (isset($_POST["anadir_cliente"])) {
        anadirClientes();
    }

    ?>
    <main>
        <section>
            <form class="anadirClientes" action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
                <h1 class="TituloAnadirCliente">Añadir Cliente</h1>
                <div class="datosPersonales">
                    <h1>Datos Personales</h1>
                    <div>
                        <label>Nombre:</label>
                        <input type="text" name="nombre">
                    </div>
                    <div>
                        <label>Apellidos:</label>
                        <input type="text" name="apellidos">
                    </div>

                    <div>
                        <label>Edad:</label>
                        <input type="number" name="edad">
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
                        <label>Email:</label>
                        <input type="text" name="mail">
                    </div>

                    <div>
                        <label>Telefono:</label>
                        <input type="number" name="movil">
                    </div>

                    <div>
                        <label>Observaciones:</label>
                        <input type="text" name="Observaciones">
                    </div>

                </div>

                <div class="datosAdicionales">
                    <h1>Información adicional</h1>

                    <div>
                        <label>Peso:</label>
                        <input type="number" id="eNumPeso" name="peso" placeholder="Introducir en kg">
                    </div>


                    <div>
                        <label>Altura:</label>
                        <input type="number" id="eNumAltura" name="altura" placeholder="Introducir en metros">
                    </div>

                    <input type="button" name="Calcular" onclick="calcularMasaCorporal()" value="Calcular">

                    <div>
                        <label>Masa Corporal:</label>
                        <input type="number" name="masaMuscular" id="eNumMasa">
                    </div>

                    <div>
                        <label>Actividad fisíca:</label>
                        <select name="actividad" id="">
                            <option value="Principiante">Principiante</option>
                            <option value="Intermedio">Intermedio</option>
                            <option value="Extremo">Extremo</option>
                        </select>
                    </div>

                    <div>
                        <label>Lesiones:</label>
                        <input type="text" name="lesiones">
                    </div>
                </div>
                <input type="submit" class="enviar" name="anadir_cliente" value="Añadir">
            </form>
        </section>
    </main>
    <?php
    include '../footer.php';
    ?>
    <script>
        function calcularMasaCorporal() {
            var peso = parseInt(document.getElementById("eNumPeso").value);
            var altura = parseInt(document.getElementById("eNumAltura").value);

            altura=altura/100;
           var masa=peso/(altura * altura);

            // document.getElementById("eNumMasa").value = masa.toFixed(2);
             document.getElementById("eNumMasa").value = Math.trunc(masa);

        }
    </script>
</body>

</html>