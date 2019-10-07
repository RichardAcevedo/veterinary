<?php  
	require '../../bd/Database.php';
	require '../../model/vo/modelLogin.php';

	$id = "";
	$password = "";
	$procesar = "";

	if(isset($_POST["id"])){
		
		$id = $_POST["id"];
		$password = $_POST["password"];

		$procesar = $_POST["action"];
	}

	if($procesar == "client"){

		$controller  = new ModelLogin();
		$query = $controller->find($id, $password, $procesar);

		if($query == NULL){
			  
			header("location: ../../view/login/");
		}else{
			session_start();
			$_SESSION['id'] = $query->getId();
			$_SESSION['name'] = $query->getName();
			$_SESSION['lastName'] = $query->getLastName();
			$_SESSION['sex'] = $query->getSex();
			$_SESSION['phone'] = $query->getPhone();
			$_SESSION['secretQuestion'] = $query->getSecretQuestion();
			$_SESSION['secretAnswer'] = $query->getSecretAnswer();
			$_SESSION['mail'] = $query->getMail();
			$_SESSION['password'] = $query->getPassword();
			$_SESSION['picture'] = $query->getPicture();

			header("location: ../../view/client/");
			
		}
		
	}

	if($procesar == "administrator"){

		$controller  = new ModelLogin();
		$query = $controller->find($id, $password, $procesar);

		if($query == NULL){
			?> <script>alert('Usuario o Contraseña Incorrectos');</script> <?php
			header("location: ../../view/login/loginAdmin.php");
		}else{
			session_start();
			$_SESSION['id'] = $query->getId();
			$_SESSION['name'] = $query->getName();
			$_SESSION['lastName'] = $query->getLastName();
			$_SESSION['sex'] = $query->getSex();
			$_SESSION['phone'] = $query->getPhone();
			$_SESSION['mail'] = $query->getMail();
			$_SESSION['password'] = $query->getPassword();

			header("location: ../../view/manager/");
			
		}
		
	}

	if($procesar == "veterinary"){

		$controller  = new ModelLogin();
		$query = $controller->find($id, $password, $procesar);

		if($query == NULL){
			?> <script>alert('Usuario o Contraseña Incorrectos');</script> <?php
			header("location: ../../view/login/loginVet.php");
		}else{
			session_start();
			$_SESSION['id'] = $query->getId();
			$_SESSION['name'] = $query->getName();
			$_SESSION['lastName'] = $query->getLastName();
			$_SESSION['sex'] = $query->getSex();
			$_SESSION['phone'] = $query->getPhone();
			$_SESSION['cardProfessional'] = $query->getCardProfessional();
			$_SESSION['secretQuestion'] = $query->getSecretQuestion();
			$_SESSION['secretAnswer'] = $query->getSecretAnswer();
			$_SESSION['mail'] = $query->getMail();
			$_SESSION['password'] = $query->getPassword();
			$_SESSION['picture'] = $query->getPicture();
			
			header("location: ../../view/veterinary/");
			
		}
		
	}

	
?>