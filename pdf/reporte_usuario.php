<?php
require_once "../autoload.php";

use app\controllers\UsuarioController;
$usuarioController = new UsuarioController();
$usuarios = $usuarioController->listarUsuarios();


# Incluyendo librerias necesarias #
require "./code128.php";

$pdf = new PDF_Code128('P','mm','Letter');
$pdf->SetMargins(17,17,17);
$pdf->AddPage();

/*# Logo de la empresa formato png #
$pdf->Image('./img/logo.png',165,12,35,35,'PNG');*/

# Encabezado y datos de la empresa #
$pdf->SetFont('Arial','B',16);
$pdf->SetTextColor(32,100,210);
$pdf->Cell(150,10,iconv("UTF-8", "ISO-8859-1",strtoupper("REPORTE USUARIOS")),0,0,'L');

$pdf->Ln(9);
$pdf->Ln(9);

# Tabla de productos #
$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(23,83,201);
$pdf->SetDrawColor(23,83,201);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(45,8,iconv("UTF-8", "ISO-8859-1","Nombre"),1,0,'C',true);
$pdf->Cell(45,8,iconv("UTF-8", "ISO-8859-1","Apellidos"),1,0,'C',true);
$pdf->Cell(45,8,iconv("UTF-8", "ISO-8859-1","usuario"),1,0,'C',true);
$pdf->Cell(45,8,iconv("UTF-8", "ISO-8859-1","imail"),1,0,'C',true);
$pdf->Ln(8);
$pdf->SetTextColor(39,39,51);



/*----------  Detalles de la tabla  ----------*/
foreach ($usuarios as $usuario) {
    $pdf->Cell(45,7,iconv("UTF-8", "ISO-8859-1",$usuario['nombres']),'L',0,'L');
    $pdf->Cell(45,7,iconv("UTF-8", "ISO-8859-1",$usuario['nombres']),'L',0,'L');
    $pdf->Cell(45,7,iconv("UTF-8", "ISO-8859-1",$usuario['usuario']),'L',0,'L');
    $pdf->Cell(45,7,iconv("UTF-8", "ISO-8859-1",$usuario['email']),'LR',0,'L');
    $pdf->Ln(7);
}
/*----------  Fin Detalles de la tabla  ----------*/

$pdf->SetFont('Arial','B',9);
$pdf->Cell(180,7,iconv("UTF-8", "ISO-8859-1",''),'T',0,'C');
$pdf->Ln(12);
# Nombre del archivo PDF #
$pdf->Output("I","Factura_Nro_1.pdf",true);