<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	setlocale(LC_TIME, 'es_ES');
	date_default_timezone_set("America/Bogota");

  	$dateS = date("d-m-y");
  	$dia = date("d");
  	$mes = date("F");
  	$anio = date("Y");
  	//$date = $_POST["date"];
  

  	

	$query = "SELECT *FROM client";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('L');
	$pdf->Ln(8);


	$pdf->SetFont('Arial','I',12);
	$pdf->Cell(0,20, 'Listado de Clientes Registrados en CentralPet a la Fecha de : '.date("d-m-y").'',0,0,'C');
	$pdf->Ln(20);

	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(18,6,'',0,0,'C',1);

	$pdf->SetFillColor(200,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(15,8,'ID',1,0,'C',1);
	$pdf->Cell(50,8,'Nombres',1,0,'C',1);
	$pdf->Cell(50,8,'Apellidos',1,0,'C',1);
	$pdf->Cell(30,8,'Sexo',1,0,'C',1);
	$pdf->Cell(30,8,'Telefono',1,0,'C',1);
	$pdf->Cell(70,8,'Correo',1,1,'C',1);
	
	
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(18,6,'',0,0,'C',1);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(15,8,$row['id'],1,0,'C',1);
	$pdf->Cell(50,8,$row['name'],1,0,'C',1);
	$pdf->Cell(50,8,$row['lastName'],1,0,'C',1);
	$pdf->Cell(30,8,$row['sex'],1,0,'C',1);
	$pdf->Cell(30,8,$row['phone'],1,0,'C',1);
	$pdf->Cell(70,8,$row['mail'],1,1,'C',1);
	
	}
	
	
	$pdf->Ln(30);
	$pdf->SetFont('Courier','B',12);
	$pdf->Cell(0,20, 'FIRMADO DIGITALEMENTE',0,0,'C');
	
	$pdf->Ln(10);
	$pdf->SetFont('Arial','I',12);
	$pdf->Cell(0,20, 'DIEGO NAVAS - Gerente General de la Clinica Veterinaria CentralPet',0,0,'C');
	
	$pdf->Ln(8);

	
	//$pdf->Image('images/cod.png', 75, 250, 50 );
	$pdf->Output();

	
?>
