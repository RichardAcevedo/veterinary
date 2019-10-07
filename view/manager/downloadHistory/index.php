<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	setlocale(LC_TIME, 'es_ES');
	date_default_timezone_set("America/Bogota");

  	$date = date("d-m-y");
  	$dia = date("d");
  	$mes = date("F");
  	$anio = date("Y");
  	$idHistory = $_POST["idHistory"];
  	$idPatient = $_POST["idPatient"];
  	$namePatient = $_POST["namePatient"];
	  




	$query = "SELECT *FROM atention_patient where id_patient = '".$idPatient."'";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->Ln(8);

	$pdf->SetFont('Arial','I',12);
	$pdf->Cell(190,20, 'La Clinica Veterinaria CentralPet Expide el Siguiente Historial Clinico',0,0,'C');
	$pdf->Ln(15);

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(180,20, 'Historia Clinica  No : '.$idHistory.' Del Paciente : '.$namePatient.'',0,0,'C');
	$pdf->Ln(20);

	
	while($row = $resultado->fetch_assoc())
	{		


			  $idAtention = $row['id_atention'];
			  //$namePatient = $row['id_atention'];
			  $idVeterinary = $row['id_veterinary'];
			  //$idHistory = $row['id_atention'];
			  $idTreatment = $row['id_treatment'];
			  $dateEntry = $row['dateEntry'];
			  $dateExit = $row['dateExit'];
			  $hospitalization = $row['hospitalization'];
			  $daysHospitalized = $row['daysHospitalized'];
			  $observations = $row['observations'];
			  $state = $row['state'];

			$query2 = "SELECT name FROM veterinary where id = '".$idVeterinary."'";
			$resultado2 = $mysqli->query($query2);
			while($row2 = $resultado2->fetch_assoc()){
				$nameVeterinary = $row2['name'];
			}

			$query3 = "SELECT description FROM treatment where id_tratment = '".$idTreatment."'";
			$resultado3 = $mysqli->query($query3);
			while($row3 = $resultado3->fetch_assoc()){
				$descriptionTreatment = $row3['description'];
			}



			$pdf->SetFont('Courier','B',15);


			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(180,6, 'Atencion Al Paciente  No : '.$idAtention.'',1,0,'C');
			$pdf->Ln(12);
			$pdf->SetFont('Courier','B',15);
			$pdf->Cell(180,6, 'Fecha de Ingreso a la Clinica : '.$dateEntry.' ',1,0,'L');
			$pdf->Ln(8);
			$pdf->Cell(180,6, '            Motivo de Ingreso : '.$descriptionTreatment.' ',1,0,'L');
			$pdf->Ln(8);
			$pdf->Cell(180,6, utf8_decode('        ¿ Fue Hospitalizado ? : '.$hospitalization.''),1,0,'L');
			$pdf->Ln(8);
			$pdf->Cell(180,6, 'Fecha de Salida de la Clinica : '.$dateExit.' ',1,0,'L');
			$pdf->Ln(8);
			$pdf->Cell(180,6, '           Dias Hospitalizado : '.$daysHospitalized.' ',1,0,'L');
			$pdf->Ln(8);
			$pdf->Cell(180,6, '    Observaciones Adicionales : '.$observations.' ',1,0,'L');
			$pdf->Ln(8);
			$pdf->Cell(180,6, '        Estado de la Atencion : '.$state.' ',1,0,'L');
			

			$pdf->Ln(20);
	}

	


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
