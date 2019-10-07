<?php  
	require '../../bd/Database.php';
	require '../../model/ClientModel/ClientDAO.php';
	require '../../model/ClientModel/ClientVO.php';

	$id = "";
	$name = "";
	$lastName = "";
	$sex = "";
	$phone = "";
	$secretQuestion = "";
	$secretAnswer = "";
	$mail = "";
	$password = "";

	$procesar = "";

	if(isset($_POST["id"])){
		
		$id = $_POST["id"];
		$name = $_POST["name"];
		$lastName = $_POST["lastName"];
		$sex = $_POST["sex"];
		$phone = $_POST["phone"];
		$secretQuestion = $_POST["secretQuestion"];
		$secretAnswer = $_POST["secretAnswer"];
		$mail = $_POST["mail"];
		$password = $_POST["password"];

		$procesar = $_POST["action"];
	}

	if($procesar == "client"){

		$nameImg = savePicture();

		$controller  = new ClientDAO();
		$user = new ClientVO($id, $name, $lastName, $sex, $phone, $secretQuestion, $secretAnswer, $mail, $password, $nameImg);
		$query = $controller->addClient($user);

		if($query == NULL){
			?> <script>alert('Usuario o Contraseña Incorrectos');</script> <?php
			header("location: ../../view/login/");
		}else{
			?> <script>alert('Usuario Registrado Correctamente');</script> <?php
			header("location: ../../view/login/");
			
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

			header("location: ../../view/veterinary/");
			
		}
		
	}

	function savePicture(){

			$name = "";
			$directorio = "../../img/imgClients/";

			if(basename($_FILES["file"]["name"]) == NULL || basename($_FILES["file"]["name"])==""){
				return "";
			}
			$archivo = $directorio . basename($_FILES["file"]["name"]);

			$tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

			// valida que es imagen
			$checarSiImagen = getimagesize($_FILES["file"]["tmp_name"]);

			//var_dump($size);

			if ($checarSiImagen != false) {

			    //validando tamaño del archivo
			    $size = $_FILES["file"]["size"];

			    if ($size > 500000) {
			        echo "El archivo tiene que ser menor a 500kb";
			    } else {

			        //validar tipo de imagen
			        if ($tipoArchivo == "jpg" || $tipoArchivo == "jpeg") {
			            // se validó el archivo correctamente
			            if (move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)) {

			            	$name = basename($_FILES["file"]["name"]);
			            	return $name;

			                echo "El archivo se subió correctamente";
			            } else {
			                echo "Hubo un error en la subida del archivo";
			            }
			        } else {
			            echo "Solo se admiten archivos jpg/jpeg";
			        }
			    }
			} else {
			    echo "El documento no es una imagen";
			}
		}

	
?>