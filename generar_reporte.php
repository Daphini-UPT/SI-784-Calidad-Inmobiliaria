<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('images/logo1.png',10,8,20);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(70,10,'Reporte Inmueble',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}
include("conexion.php");
$link = conectarse();
$instruccion = "SELECT a.*,b.nombre_usuario,b.apellido_usuario,c.nombre_inmueble
			FROM tb_reserva AS a
			INNER JOIN tb_usuario AS b ON a.id_usuario=b.id_usuario
			INNER JOIN tb_inmueble AS c ON a.id_inmueble=c.id_inmueble";
$resultado =mysqli_query($link,$instruccion);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,10,'id',1,0,'C',0);
$pdf->Cell(60,10,'nombre inmueble',1,0,'C',0);
$pdf->Cell(30,10,'nombre usuario',1,0,'C',0);
$pdf->Cell(55,10,'fecha reserva',1,0,'C',0);
$pdf->Cell(30,10,'monto reserva',1,1,'C',0);
while($row =$resultado->fetch_assoc()){
    $pdf->Cell(10,10,$row['id_reserva'],1,0,'C',0);
    $pdf->Cell(60,10,$row['nombre_inmueble'],1,0,'C',0);
    $pdf->Cell(30,10,$row['nombre_usuario'],1,0,'C',0);
    $pdf->Cell(55,10,$row['fecha_reserva'],1,0,'C',0);
    $pdf->Cell(30,10,$row['monto_reserva'],1,1,'C',0);
}

$pdf->Output();
?>