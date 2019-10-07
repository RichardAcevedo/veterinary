<?php  
	require '../../bd/Database.php';
	require '../../model/ClientModel/ClientDAO.php';
	require '../../model/AdministratorModel/AdministratorDAO.php';
	require '../../model/VeterinaryModel/VeterinaryDAO.php';

	$id = "";
	$secretQuestion = "";
	$secretAnswer = "";
	$password = "";

	$procesar = "";

	if(isset($_POST["id"])){
		
		$id = $_POST["id"];
		$secretQuestion = $_POST["secretQuestion"];
		$secretAnswer = $_POST["secretAnswer"];
		$password = $_POST["password"];

		$procesar = $_POST["action"];
	}

	if($procesar == "client"){

		$controller  = new ClientDAO();
		$query = $controller->findToChangePassword($id, $secretQuestion, $secretAnswer);

		if(!$query){
			?> <script>alert('Datos Erroneos, por Favor reviselos Nuevamente');</script> <?php
			header("location: ../../view/registration/changePassword.php");
		}else{

			$change = $controller->changePassword($id, $password);
			
			if($change){
				?> <script>alert('Datos Actualizados Correctamente');</script> <?php
				header("location: ../../view/login/");
			}else{
				?> <script>alert('Error');</script> <?php
				header("location: ../../view/registration/changePassword.php");
			}
			
			
		}
		
	}

	if($procesar == "administrator"){

		$controller  = new AdministratorDAO();
		$query = $controller->findToChangePassword($id, $secretQuestion, $secretAnswer);

		if(!$query){
			?> <script>alert('Datos Erroneos, por Favor reviselos Nuevamente');</script> <?php
			header("location: ../../view/registration/changePassword.php");
		}else{

			$change = $controller->changePassword($id, $password);
			
			if($change){
				?> <script>alert('Datos Actualizados Correctamente');</script> <?php
				header("location: ../../view/login/");
			}else{
				?> <script>alert('Error');</script> <?php
				header("location: ../../view/registration/changePassword.php");
			}
			
			
		}
		
	}

	if($procesar == "veterinary"){

		$controller  = new VeterinaryDAO();
		$query = $controller->findToChangePassword($id, $secretQuestion, $secretAnswer);

		if(!$query){
			?> <script>alert('Datos Erroneos, por Favor reviselos Nuevamente');</script> <?php
			header("location: ../../view/registration/changePassword.php");
		}else{

			$change = $controller->changePassword($id, $password);
			
			if($change){
				?> <script>alert('Datos Actualizados Correctamente');</script> <?php
				header("location: ../../view/login/");
			}else{
				?> <script>alert('Error');</script> <?php
				header("location: ../../view/registration/changePassword.php");
			}
			
			
		}
		
	}

	
?>