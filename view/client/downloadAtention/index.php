<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	setlocale(LC_TIME, 'es_ES');
	date_default_timezone_set("America/Bogota");

  	$date = date("d-m-y");
  	$dia = date("d");
  	$mes = date("F");
  	$anio = date("Y");
  $idAtention = $_POST["idAtention"];
  $namePatient = $_POST['namePatient'];
  $idVeterinary = $_POST["nameVeterinary"];
  $idHistory = $_POST['history'];
  $idTreatment = $_POST["descriptionTreatment"];
  $dateEntry = $_POST["dateEntry"];
  $dateExit = $_POST["dateExit"];
  $hospitalization = $_POST["hospitalization"];
  $daysHospitalized = $_POST["daysHospitalized"];
  $observations = $_POST["observations"];
  $state = $_POST["state"];




	$query = "SELECT *FROM atention_patient where id_atention = '".$idAtention."'";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->Ln(8);

	$pdf->SetFont('Arial','I',12);
	$pdf->Cell(190,20, 'La Clinica Veterinaria CentralPet Expide los Siguientes Detalles de Atencion al Paciente',0,0,'C');
	$pdf->Ln(15);

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(180,20, 'Atencion Al Paciente  No : '.$idAtention.' De Nombre : '.$namePatient.'',0,0,'C');
	$pdf->Ln(8);
	$pdf->Cell(180,20, 'Atendido Por el Medico Veterinario : '.$idVeterinary.' ',0,0,'C');
	$pdf->Ln(8);
	$pdf->Cell(180,20, 'y Registrado con Historia Clinica No : '.$idHistory.' ',0,0,'C');

	$pdf->Ln(20);

	
	while($row = $resultado->fetch_assoc())
	{	
			$pdf->SetFont('Courier','B',15);


			$pdf->Cell(180,20, 'Fecha de Ingreso a la Clinica : '.$dateEntry.' ',0,0,'L');
			$pdf->Ln(8);
			$pdf->Cell(180,20, '            Motivo de Ingreso : '.$idTreatment.' ',0,0,'L');
			$pdf->Ln(8);
			$pdf->Cell(180,20, utf8_decode('        ¿ Fue Hospitalizado ? : '.$hospitalization.''),0,0,'L');
			$pdf->Ln(8);
			$pdf->Cell(180,20, 'Fecha de Salida de la Clinica : '.$dateExit.' ',0,0,'L');
			$pdf->Ln(8);
			$pdf->Cell(180,20, '           Dias Hospitalizado : '.$daysHospitalized.' ',0,0,'L');
			$pdf->Ln(8);
			$pdf->Cell(180,20, '    Observaciones Adicionales : '.$observations.' ',0,0,'L');
			$pdf->Ln(8);
			$pdf->Cell(180,20, '        Estado de la Atencion : '.$state.' ',0,0,'L');
			

			$pdf->Ln(20);
	}

	$pdf->SetFont('Arial','I',12);
	$pdf->Cell(190,20, 'La Anterior informacion de Atencion Se Expide a Solicitud del Interesado a ',0,0,'C');
	$pdf->Ln(8);
	$pdf->Cell(190,20, 'los '.$dia.' dias de '.$mes.' del '.$anio.'',0,0,'C');


	$pdf->Ln(50);
	$pdf->SetFont('Courier','B',12);
	$pdf->Cell(180,20, 'FIRMADO DIGITALEMENTE',0,0,'C');
	$pdf->Ln(10);
	$pdf->SetFont('Arial','I',12);
	$pdf->Cell(190,20, 'DIEGO NAVAS - Gerente General de la Clinica Veterinaria CentralPet',0,0,'C');
	$pdf->Ln(8);

	
	//$pdf->Image('images/cod.png', 75, 250, 50 );
	$pdf->Output();

	
?>
