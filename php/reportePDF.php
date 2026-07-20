<?php

require_once("fpdf.php");

include("conexion.php");

$ordenar=$_GET["ordenar"] ?? "id";
$tipo=$_GET["tipo"] ?? "ASC";
$autor=$_GET["autor"] ?? "";
$editorial=$_GET["editorial"] ?? "";
$anio=$_GET["anio"] ?? "";

$sql="SELECT * FROM libros WHERE 1=1";

if($autor!=""){

    $sql.=" AND autor LIKE '%$autor%'";

}

if($editorial!=""){

    $sql.=" AND editorial LIKE '%$editorial%'";

}

if($anio!=""){

    $sql.=" AND anio=$anio";

}

$sql.=" ORDER BY $ordenar $tipo";

$resultado=$conexion->query($sql);

$pdf=new FPDF();

$pdf->AddPage();

$pdf->SetFont("Arial","B",16);

$pdf->Cell(190,10,"SISTEMA DE BIBLIOTECA",0,1,"C");

$pdf->SetFont("Arial","",12);

$pdf->Cell(190,8,date("d/m/Y H:i"),0,1,"R");

$pdf->Ln(5);

$pdf->SetFillColor(25,118,210);

$pdf->SetTextColor(255);

$pdf->Cell(15,10,"ID",1,0,"C",true);
$pdf->Cell(55,10,"Titulo",1,0,"C",true);
$pdf->Cell(40,10,"Autor",1,0,"C",true);
$pdf->Cell(35,10,"Editorial",1,0,"C",true);
$pdf->Cell(20,10,"Cant.",1,1,"C",true);

$pdf->SetTextColor(0);

while($fila=$resultado->fetch_assoc()){

    $pdf->Cell(15,8,$fila["id"],1);

    $pdf->Cell(55,8,utf8_decode($fila["titulo"]),1);

    $pdf->Cell(40,8,utf8_decode($fila["autor"]),1);

    $pdf->Cell(35,8,utf8_decode($fila["editorial"]),1);

    $pdf->Cell(20,8,$fila["cantidad"],1,1);

}

$pdf->Ln(10);

$pdf->Cell(190,10,"Total registros: ".$resultado->num_rows);

$pdf->Output("D","ReporteBiblioteca.pdf");