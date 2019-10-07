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
  

  	

	$query = "SELECT *FROM patient";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('L');
	$pdf->Ln(8);


	$pdf->SetFont('Arial','I',12);
	$pdf->Cell(0,20, 'Listado de Pacientes Registrados en CentralPet a la Fecha de : '.date("d-m-y").'',0,0,'C');
	$pdf->Ln(20);

	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(13,6,'',0,0,'C',1);

	$pdf->SetFillColor(200,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(25,8,'ID Mascota',1,0,'C',1);
	$pdf->Cell(35,8,'Nombre Cliente',1,0,'C',1);
	$pdf->Cell(25,8,'ID Cliente',1,0,'C',1);
	$pdf->Cell(40,8,'Nombre Mascota',1,0,'C',1);
	$pdf->Cell(30,8,'Tipo Mascota',1,0,'C',1);
	$pdf->Cell(35,8,'Raza',1,0,'C',1);
	$pdf->Cell(20,8,'Sexo',1,0,'C',1);
	$pdf->Cell(20,8,'Edad',1,0,'C',1);
	$pdf->Cell(30,8,'Estado',1,1,'C',1);
	
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$idPatient = $row['id'];
		 

          $query2 = "SELECT * from client_patient where id_patient = '$idPatient'";
		$resultado2 = $mysqli->query($query2);
		while($row2 = $resultado2->fetch_assoc()){
			$id_owner = $row2['id_client'];
                $state = $row2['state'];
		}

		$query3 = "SELECT * from client where id = '$id_owner'";
		$resultado3 = $mysqli->query($query3);
		while($row3 = $resultado3->fetch_assoc()){
			$name_owner = $row3['name'];
                    $lastName_owner = $row3['lastName'];
		}

	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(13,6,'',0,0,'C',1);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(25,8,$row['id'],1,0,'C',1);
	$pdf->Cell(35,8,$name_owner,1,0,'C',1);
	$pdf->Cell(25,8,$id_owner,1,0,'C',1);
	$pdf->Cell(40,8,$row['name'],1,0,'C',1);
	$pdf->Cell(30,8,$row['type'],1,0,'C',1);
	$pdf->Cell(35,8,$row['breed'],1,0,'C',1);
	$pdf->Cell(20,8,$row['sex'],1,0,'C',1);
	$pdf->Cell(20,8,$row['age'],1,0,'C',1);
	$pdf->Cell(30,8,$state,1,1,'C',1);
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
