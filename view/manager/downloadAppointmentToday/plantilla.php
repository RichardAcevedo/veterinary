<?php
	
	require '../../fpdf/fpdf.php';
	

	class PDF extends FPDF
	{


		function Header()
		{
			$dia = date("d");
	  	$mes = date("F");
	  	$anio = date("Y");
	  	$diaLetra = date("l");
			// (tamaño, )
			$this->Image('images/centralpet.JPG', 30, 5, 50 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(260,20, 'Citas para Hoy : '.$diaLetra.' '.$dia.' de '.$mes.' del '.$anio.'',0,0,'C');
			$this->Ln(20);
		}
		//
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
			$this->Cell(-300,20, 'Todos los Derechos Reservados - CentralPet 2019',0,0,'C' );
			
		}		
	}
?>