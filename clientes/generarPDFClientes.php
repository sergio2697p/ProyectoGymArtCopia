
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

$sql = 'SELECT * FROM clientes';
$resultado = $conexion->query($sql);
while ($fila = $resultado->fetch_row()) {
    $id = $fila[0];
    $texto = 'Nombre: ' . $fila[1] . ' Apellidos: ' . $fila[2] . ' Correo Electronico: ' . $fila[3];

    //escribimos en la pagina   
    $pdf->Write(10, $texto);
    $pdf->Ln(10);
}
//creamos el fichero de salida(visualizacion)
//$pdf->Output('archivo.pdf', 'I');

//creamos el fichero de salida(descarga)
$pdf->Output('archivo.pdf', 'D');
?>