<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
  <div id="miCuartoGrafico" style="width: 900px; height: 300px;"></div>

  <?php
  include '../BBDD/conexionBBDD.php';

  //consulta a base de datos de la suma de todos los importes por Año
  $conexion = conectarUsuarios();
  $graficaAnio = "SELECT SUM(Importe) as Importe,Anio FROM pagos GROUP BY Anio";
  $resultado = $conexion->query($graficaAnio);
  ?>

  <script type="text/javascript">
    // Load Charts and the corechart package.
    google.charts.load('current', {
      'packages': ['corechart']
    });

    google.setOnLoadCallback(miCuartoGrafico);

    function miCuartoGrafico() {
      //cargamos nuestro array $datos creado en PHP para que se puede utilizar en JavaScript
      var datosFinales = google.visualization.arrayToDataTable([
        ['Año', 'Ingresos'],
        
        <?php
        //recorremos nuestro array del Año y la suma de esos importes
        while ($fila = $resultado->fetch_array()) {
          echo "['" . $fila["Anio"] . "'," . $fila["Importe"] . "],";
        }
        ?>
      ]);
      var options = {
        title: 'Ganancias por Años',
        hAxis: {
          title: 'Años'
        },
        vAxis: {
          title: 'Euros',
          minValue: 0
        },
        legend: 'none',
      };
      var chart = new google.visualization.ColumnChart(document.getElementById('miCuartoGrafico'));
      chart.draw(datosFinales, options);
    }
  </script>
</body>

</html>