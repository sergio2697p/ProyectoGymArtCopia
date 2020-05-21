<?php
include '../BBDD/conexionBBDD.php';
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
</head>

<body>
  <?php
  include '../header.php';

  ?>
  <main>
    <section>
      <div class="graficas">
        <div id="graficoAnio" style="width: 800px; height: 250px;"></div>
        <form action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
          <input type="submit" value="Descargar Grafica Año">
        </form>
        <div id="graficoMes" style="width: 800px; height: 250px;"></div>
        <form action="<?php echo $_SERVER["PHP_SELF"]  ?>" method="POST">
          <input type="submit" value="Descargar Grafica Meses">
        </form>
      </div>
      <?php
      graficoAnio();
      graficosMes();
      ?>
    </section>
  </main>
  <?php
  include '../footer.php';
  ?>
</body>

</html>