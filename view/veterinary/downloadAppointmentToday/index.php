<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	setlocale(LC_TIME, 'es_ES');
	date_default_timezone_set("America/Bogota");

  	$dateS = date("d-m-y");
  	$dia = date("d");
  	$mes = date("F");
  	$anio = date("Y");
  $date = $_POST["date"];
  



	$query = "SELECT *FROM appointment where dateAppointment = '".$date."'";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('L');
	$pdf->Ln(30);

	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(13,6,'',0,0,'C',1);

	$pdf->SetFillColor(200,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(40,6,'Numero de Cita',1,0,'C',1);
	$pdf->Cell(40,6,'Cliente',1,0,'C',1);
	$pdf->Cell(40,6,'Paciente',1,0,'C',1);
	$pdf->Cell(40,6,'Fecha de Cita',1,0,'C',1);
	$pdf->Cell(50,6,'Hora de Cita',1,0,'C',1);
	$pdf->Cell(40,6,'Estado',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	$pdf->Image('images/cod.png', 75, 250, 50 );
	while($row = $resultado->fetch_assoc())
	{

		$id = $row['id'];
			
		  $idClient = $row['id_client'];
		  
		  $id_patient = $row['id_patient'];
		  $date = $row['dateAppointment'];
		  $hour = $row['hour'];
		  $state = $row['state'];
		  
		$pdf->SetFillColor(255,255,255);
		$pdf->Cell(13,6,'',0,0,'C',1);

		$query2 = "SELECT name FROM client where id = '".$idClient."'";
		$resultado2 = $mysqli->query($query2);
		while($row2 = $resultado2->fetch_assoc()){
			$nameClient = $row2['name'];
		}

		$query3 = "SELECT name FROM patient where id = '".$id_patient."'";
		$resultado3 = $mysqli->query($query3);
		while($row3 = $resultado3->fetch_assoc()){
			$namePatient = $row3['name'];
		}

		$pdf->Cell(40,6,$id,1,0,'C');
		$pdf->Cell(40,6,$nameClient,1,0,'C');
		$pdf->Cell(40,6,$namePatient,1,0,'C');
		$pdf->Cell(40,6,$date,1,0,'C');
		$pdf->Cell(50,6,$hour,1,0,'C');
		$pdf->Cell(40,6,$state,1,1,'C');

	}
	$pdf->Ln(30);
	$pdf->SetFont('Arial','I',12);
	$pdf->Cell(0,20, 'El anterior Listado de Citas se expide a a solicitud del veterinario Interesado ',0,0,'C');
	
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
