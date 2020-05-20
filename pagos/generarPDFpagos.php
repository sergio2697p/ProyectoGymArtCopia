<?php
include '../BBDD/conexionBBDD.php';
//include 'includes/funciones.php';
//incluimos el fichero para crear el pdf
include '../fpdf/fpdf.php';
//indica donde estan almacenados los ficheros con las fuentes
define("FPDF_FONTPATH", "../fpdf/font/");

$conexion = conectarUsuarios();

$texto = null;

//creamos el pdf
$pdf = new FPDF();

//creamos una pagina
$pdf->AddPage();

//definimos el estilo del titulo
$pdf->SetFont("Arial", "B", 16);

$titulo="Lista de Clientes";
//definimos los bordes y el titulo
$pdf->Cell(60,20,$titulo,1,1,"C");
$pdf->Ln(10);

//definimos el estilo
$pdf->SetFont("Arial", "B", 12);

$conexion = conectarUsuarios();
$select_pagos = " SELECT clientes.Nombre as nombreCliente, mensualidades.Nombre as nombreMensualidad, pagos.Mes as mes,pagos.Anio as anio,pagos.Pagado as pagado, pagos.Importe as Importe
FROM mensualidades INNER JOIN pagos INNER JOIN clientes ON mensualidades.CodigoMensualidad = pagos.CodigoMensualidad
WHERE clientes.CodigoCliente=pagos.CodigoCliente And pagado = 'Si' AND pagos.Anio='2020'";

$resultado = $conexion->query($select_pagos);
while ($fila = $resultado->fetch_array()) {
    $id = $fila[0];
    $texto = 'Nombre: ' . $fila["nombreCliente"] . ' mensualidades: ' . $fila["nombreMensualidad"] . ' Mes: ' . $fila["mes"].' Anio: '.$fila["anio"].' Importe: '.$fila["Importe"].' Pagado: '.$fila["pagado"];

    //escribimos en la pagina   
    $pdf->Write(10, $texto);
    $pdf->Ln(10);
}
//creamos el fichero de salida(visualizacion)
//$pdf->Output('archivo.pdf', 'I');

//creamos el fichero de salida(descarga)
$pdf->Output('archivo.pdf', 'D');
?>