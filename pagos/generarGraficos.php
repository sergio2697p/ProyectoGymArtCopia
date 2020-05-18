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
  <script type="text/javascript">

    // Load Charts and the corechart package.
    google.charts.load('current', { 'packages': ['corechart'] });



    google.setOnLoadCallback(miCuartoGrafico);

    function miCuartoGrafico() {
      //cargamos nuestro array $datos creado en PHP para que se puede utilizar en JavaScript
      // var cargaDatos = <?php //echo json_encode($datos); ?>;
      var datosFinales = google.visualization.arrayToDataTable([
        ['Año', 'Ventas', 'Gastos', 'Beneficio'],
        ['2014', 1000, 400, 200],
        ['2015', 1170, 460, 250],
        ['2016', 660, 1120, 300],
        ['2017', 1030, 540, 350]
      ]);
      var options = {
        title: 'Ganancias por Años',
        hAxis: { title: 'Engorde' },
        vAxis: { title: 'Peso Medio', minValue: 0 },
        legend: 'none',
      };
      var chart = new google.visualization.ColumnChart(document.getElementById('miCuartoGrafico'));
      chart.draw(datosFinales, options);
    }
  </script>
  <!-- <div id="miPrimerGrafico" style="width: 900px; height: 300px;"></div>
    <div id="miSegundoGrafico" style="width: 900px; height: 300px;"></div>  
    <div id="miTercerGrafico" style="width: 900px; height: 300px;"></div> -->
  
</body>

</html>