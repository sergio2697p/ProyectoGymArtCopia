<?php
include '../BBDD/pagosBBDD.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Graficas</title>
  <link rel="stylesheet" href="../css/estilos_xs.css">
  <!--movil-->
  <link rel="stylesheet" media=" all and (min-device-width : 768px) and (max-device-width : 991px)" href="../css/estilos_sm.css">
  <!--IPAD vertical-->
  <link rel="stylesheet" media=" all and (min-device-width : 992px) and (max-device-width : 1199px) " href="../css/estilos_md.css">
  <!--IPAD horizontal-->
  <link rel="stylesheet" media=" all and (min-device-width : 1200px)" href="../css/estilos_lg.css">
  <!--monitor paronamico-->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

</head>

<body>
  <?php
  include '../header.php';

  ?>
  <main>
    <section>
      <div class="sectionGraficos">

        <div class="selectGrafico">
          <form action="" method="post">
            <label>Seleccione la grafica:</label>
            <select onchange="verGraficas()" name="tiposGraficos" id="eSelGraficas">
              <option value="" selected>---------------------</option>
              <option value="graficasBarras">Grafica de barras</option>
              <option value="graficasCirculares">Grafica Circular</option>
            </select>
          </form>
        </div>

        <div id="graficos"></div>
      </div>

    </section>
  </main>
  <?php
  include '../footer.php';
  ?>


  <script>
    var select = document.getElementById("eSelGraficas");

    function verGraficas() {
      console.log(select.value)
      if (select.value == "graficasBarras") {
        $.ajax({
          url: '../BBDD/pagosBBDD.php',
          type: 'post',
          data: {
            typeBarras: 'mostrarBarras',
          },
          dataType: "html",
          success: function(resultado) {
            console.log(resultado)
            $('#graficos').html(resultado);
          }
        })
      } else {
        $.ajax({
          url: '../BBDD/pagosBBDD.php',
          type: 'post',
          data: {
            typeCirculo: 'mostrarCirculo',
          },
          dataType: "html",
          success: function(resultado) {
            console.log("hola1")

            $('#graficos').html(resultado);
          }
        })
      }
    }
  </script>

</body>

</html>