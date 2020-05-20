<?php
include 'conexionBBDD.php';

if (isset($_REQUEST['typePagos']) == 'mostrarpagos') {
    $variable2 = verPagos();
    return $variable2;
}

if (isset($_REQUEST['typeDeudas']) == 'mostrarDeudas') {
    $variable2 = listaDeudores();
    return $variable2;
}

//-----------------------------------------Graficos por Anio---------------------------------//
function graficoAnio() {
//consulta a base de datos de la suma de todos los importes por Año
$conexion = conectarUsuarios();
$graficaAnio = "SELECT SUM(Importe) as Importe,Anio FROM pagos GROUP BY Anio ";
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
    var chart = new google.visualization.ColumnChart(document.getElementById('graficoAnio'));
    chart.draw(datosFinales, options);
  }
</script>
<?php
}

function graficosMes() {
    //consulta a base de datos de la suma de todos los importes por Año
$conexion = conectarUsuarios();
$graficaAnio = "SELECT SUM(Importe) as Importe,Mes FROM pagos WHERE Anio=2020 GROUP BY Mes ";
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
        echo "['" . $fila["Mes"] . "'," . $fila["Importe"] . "],";
      }
      ?>
    ]);
    var options = {
      title: 'Ganancias por meses del año 2020',
      hAxis: {
        title: 'Meses'
      },
      vAxis: {
        title: 'Euros',
        minValue: 0
      },
      legend: 'none',
    };
    var chart = new google.visualization.ColumnChart(document.getElementById('graficoMes'));
    chart.draw(datosFinales, options);
  }
</script>
<?php
}

//-----------------------------------------Buscar Por mes---------------------------------//
function buscarPorMes()
{
    $informacion = $_POST["informacionPorMes"];
    $conexion = conectarUsuarios();
    $buscadorMes = " SELECT clientes.Nombre as nombreCliente, mensualidades.Nombre as nombreMensualidad, pagos.Mes as mes,pagos.Anio as anio,pagos.Pagado as pagado, pagos.Importe as importe
    FROM mensualidades INNER JOIN pagos INNER JOIN clientes ON mensualidades.CodigoMensualidad = pagos.CodigoMensualidad
   WHERE clientes.CodigoCliente=pagos.CodigoCliente AND mes = '$informacion'";
//    echo $buscadorMes;

    $resultado = $conexion->query($buscadorMes);
    $contador = 0;
    while ($fila = $resultado->fetch_array()) {
        $contador++;
?>
        <div class="divTableRow">
            <div class="divTableCelda"><?php echo "${fila['nombreCliente']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['nombreMensualidad']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['mes']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['anio']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['importe']} €"; ?></div>
            <div class="divTableCelda">
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                    <input type="checkbox" name="pagado">
                </form>
            </div>
        </div>
    <?php
    }
}

//-----------------------------------------Buscar Por Anio---------------------------------//

function buscarPorAnio()
{
    $conexion = conectarUsuarios();
    $buscadorAnio = " SELECT clientes.Nombre as nombreCliente, mensualidades.Nombre as nombreMensualidad, pagos.Mes as mes,pagos.Anio as anio,pagos.Pagado as pagado, pagos.Importe as importe
    FROM mensualidades INNER JOIN pagos INNER JOIN clientes ON mensualidades.CodigoMensualidad = pagos.CodigoMensualidad
   WHERE clientes.CodigoCliente=pagos.CodigoCliente AND pagos.Anio = $_POST[informacionPorAnio]";
//    echo $buscadorAnio;
    $resultado = $conexion->query($buscadorAnio);
    $contador = 0;
    while ($fila = $resultado->fetch_array()) {
        $contador++;
?>
        <div class="divTableRow">
            <div class="divTableCelda"><?php echo "${fila['nombreCliente']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['nombreMensualidad']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['mes']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['anio']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['importe']} €"; ?></div>
            <div class="divTableCelda">
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                    <input type="checkbox" name="pagado">
                </form>
            </div>
        </div>
    <?php
    }
}

//-----------------------------------------Ver Pagos de clientes activos---------------------------------//

function verPagos()
{
    $conexion = conectarUsuarios();
    $select_pagos = " SELECT clientes.Nombre as nombreCliente, mensualidades.Nombre as nombreMensualidad, pagos.Mes as mes,pagos.Anio as anio,pagos.Pagado as pagado, pagos.Importe as importe
    FROM mensualidades INNER JOIN pagos INNER JOIN clientes ON mensualidades.CodigoMensualidad = pagos.CodigoMensualidad
   WHERE clientes.CodigoCliente=pagos.CodigoCliente And pagado = 'Si' AND pagos.Anio='2020'";
    $resultado = $conexion->query($select_pagos);
    $contador = 0;

    while ($fila = $resultado->fetch_array()) {
        $contador++;

    ?>
        <div class="divTableRow">
            <div class="divTableCelda"><?php echo "${fila['nombreCliente']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['nombreMensualidad']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['mes']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['anio']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['importe']} €"; ?></div>
            <!-- <div class="divTableCelda"><?php //echo "${fila['pagado']}"; 
                                            ?></div> -->
            <div class="divTableCelda">
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                    <input type="checkbox" name="pagado" checked>
                </form>
            </div>

        </div>
    <?php
    }
}

//-----------------------------------------Ver Pagos de Deudores---------------------------------//

function listaDeudores()
{
    $conexion = conectarUsuarios();
    $select_deudores = " SELECT clientes.Nombre as nombreCliente, 
    mensualidades.Nombre as nombreMensualidad, 
    pagos.Mes as mes,
    pagos.Anio as anio, 
    pagos.Importe as importe
    FROM mensualidades INNER JOIN pagos INNER JOIN clientes ON mensualidades.CodigoMensualidad = pagos.CodigoMensualidad
   WHERE clientes.CodigoCliente=pagos.CodigoCliente And pagado = 'No' AND pagos.Anio='2020'";


    $resultado = $conexion->query($select_deudores);
    while ($fila = $resultado->fetch_array()) {
    ?>

        <div class="divTableRow">
            <div class="divTableCelda"><?php echo "${fila['nombreCliente']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['nombreMensualidad']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['mes']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['anio']}"; ?></div>
            <div class="divTableCelda"><?php echo "${fila['importe']} €"; ?></div>
            <div class="divTableCelda">
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                    <input type="checkbox" name="pagado">
                </form>
            </div>
        </div>
<?php
    }
}
?>