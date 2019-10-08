<?php
	require '../../bd/Database.php';
	require '../../model/ClientModel/ClientDAO.php';
	require '../../model/PatientModel/PatientDAO.php';
	require '../../model/VeterinaryModel/VeterinaryVO.php';
	require '../../model/VeterinaryModel/VeterinaryDAO.php';
	require '../../model/AdministratorModel/AdministratorDAO.php';
	require '../../model/AdministratorModel/AdministratorVO.php';
	require '../../model/ClientModel/MessageVO.php';
	$db = new Database();
	$con = $db->getConnection();


		$procesar = $_POST["action"];

		if($procesar == "Eliminar Imagen"){
			$id_image = $_POST['id_image'];

			$controller = new AdministratorDAO();
			$query = $controller->deleteImageSlider($id_image);


			if($query == NULL){
				?> <script>alert('Imagen NO eliminada');</script> <?php
				header("location: ../../view/manager/");
			}else{
				?> <script language="JavaScript" type="text/javascript">alert("Imagen Eliminada Correctamente");</script> <?php
				header("location: ../../view/manager/viewSliderImage.php");

		}
	}

		if($procesar == "addImageSlider"){
			$name = $_POST['name'];
				$url = savePictureSlider();

				$controller = new AdministratorDAO();
				$query = $controller->saveImageSlider($name, $url);


				if($query == NULL){
					?> <script>alert('Imagen no fue Agregada');</script> <?php
					header("location: ../../view/manager/");
				}else{
					?> <script language="JavaScript" type="text/javascript">alert("Imagen Agregada Correctamente");</script> <?php
					header("location: ../../view/manager/");


			}
		}

		if(isset($_POST["id"])){

			$id = $_POST["id"];
			$name = $_POST["name"];
			$lastName = $_POST["lastName"];
			$sex = $_POST["sex"];
			$phone = $_POST["phone"];
			$cardProfessional = $_POST["cardProfessional"];
			$secretQuestion = $_POST["secretQuestion"];
			$secretAnswer = $_POST["secretAnswer"];
			$mail = $_POST["mail"];
			$password = $_POST["password"];

			$procesar = $_POST["action"];
		}

		if($procesar == "addVeterinary"){

				$nameImg = savePicture();

				$controller = new AdministratorDAO();
				$veterinary = new VeterinaryVO($id, $name, $lastName, $sex, $phone, $cardProfessional, $secretQuestion, $secretAnswer, $mail, $password, $nameImg);
				$query = $controller->addVeterinary($veterinary);


				if($query == NULL){
					?> <script>alert('Veterinario No fue Agregado');</script> <?php
					header("location: ../../view/manager/addVeterinary.php");
				}else{
					?> <script language="JavaScript" type="text/javascript">alert("Mascota Agregada Correctamente");</script> <?php
					header("location: ../../view/manager/");

				}
		}

		if($procesar == "addMessage"){


			$nameOrigin = $_POST['nameOrigin'];
			$id_destination = $_POST['destino'];
			$description = $_POST['description'];
			$date = $_POST['date'];

			$controller = new ClientDAO();
			$message = new MessageVO(NULL, $nameOrigin, $id_destination, $description, $date);

			$query = $controller->addMessage($message);

			if($query == NULL){

				header("location: ../../view/manager/addMessage.php");
			}else{

				header("location: ../../view/manager/");

			}

		}

		if($procesar == "altEstado"){


			$idPatient = $_POST['idPatient'];
			$stateNow = $_POST['stateNow'];


			$controller = new AdministratorDAO();

			$query = $controller->altState($idPatient, $stateNow);

			if($query == NULL){

				header("location: ../../view/manager/index.php");
			}else{

				header("location: ../../view/manager/viewPatients.php");

			}

		}

		if($procesar == "sendReminder"){

			$idAppointment = $_POST['idAppointment'];
			$idClient = $_POST['idClient'];
			$dateAppointment = $_POST['dateAppointment'];
			$hourAppointment = $_POST['hourAppointment'];



			$controller = new AdministratorDAO();

			$query = $controller->sendReminder($idAppointment, $idClient, $dateAppointment, $hourAppointment);

			if($query == NULL){

				header("location: ../../view/manager/index.php");
			}else{

				header("location: ../../view/manager/index.php");

			}

		}



		function savePicture(){

			$name = "";
			$directorio = "../../img/imgVeterinarys/";

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

		function savePictureSlider(){

			$name = "";
			$directorio = "../../img/SliderImageLanding/";

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
