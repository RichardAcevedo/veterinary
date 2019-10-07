<?php
	require '../../bd/Database.php';
	require '../../model/ClientModel/ClientDAO.php';
	require '../../model/VeterinaryModel/VeterinaryDAO.php';
	require '../../model/PatientModel/PatientDAO.php';
	require '../../model/ClientModel/ClientVO.php';
	require '../../model/ClientModel/MessageVO.php';
	require '../../model/PatientModel/PatientVO.php';
	$db = new Database();
	$con = $db->getConnection();
	

		$procesar = $_POST["action"];

		if($procesar == "addPatient"){

				$idClient = $_POST["id_client"];
				$name = $_POST["name"];
				$type = $_POST["type"];
				$sex = $_POST["sex"];
				$breed = $_POST["breed"];
				$age = $_POST["age"];
				
				$nameImg = savePicture();

				$controller = new PatientDAO();
				$pet = new PatientVO("", $name, $type, $sex, $breed, $age, $nameImg);
				$query = $controller->addPatient($pet);

				$query = $controller->addClientPatient($name, $idClient, "Activo");

				$query = $controller->addHistory($name, $breed);

				if($query == NULL){
					?> <script>alert('Mascota No fue Agregada');</script> <?php
					header("location: ../../view/client/addPatient.php");
				}else{
					?> <script language="JavaScript" type="text/javascript">alert("Mascota Agregada Correctamente");</script> <?php
					header("location: ../../view/client/");
					
				}
		}

		if($procesar == "editProfile"){

			$id = $_POST["id"];
			$name = $_POST["name"];
			$lastName = $_POST["lastName"];
			$sex = $_POST["sex"];
			$phone = $_POST["phone"];
			$secretQuestion = $_POST["secretQuestion"];
			$secretAnswer = $_POST["secretAnswer"];
			$mail = $_POST["mail"];
			$password = $_POST["password"];
			$picture = $_POST["picture"];
				
			
			$controller = new ClientDAO();
			$user = new ClientVO($id, $name, $lastName, $sex, $phone, $secretQuestion, $secretAnswer, $mail, $password, $picture);
			$query = $controller->editClient($user);

			
			if($query == NULL){
				?> <script>alert('Mascota No fue Agregada');</script> <?php
				header("location: ../../view/client/addPatient.php");
			}else{
				?> <script language="JavaScript" type="text/javascript">alert("Mascota Agregada Correctamente");</script> <?php
				header("location: ../../view/client/");
				
			}
		}

		if($procesar == "editProfilePatient"){

			 
			$id = $_POST["id"];
			$name = $_POST["name"];
			$type = $_POST["type"];
			$sex = $_POST["sex"];
			$breed = $_POST["breed"];
			$age = $_POST["age"];
			$picture = $_POST["picture"];	
			
			$controller = new PatientDAO();
			$pet = new PatientVO($id, $name, $type, $sex, $breed, $age, $picture);
			$query = $controller->editPatient($pet);

			
			if($query == NULL){
				?> <script>alert('Mascota No fue Agregada');</script> <?php
				header("location: ../../view/client/addPatient.php");
			}else{
				?> <script language="JavaScript" type="text/javascript">alert("Mascota Agregada Correctamente");</script> <?php
				header("location: ../../view/client/viewPatients.php");
				
			}
		}

		if($procesar == "deletePatient"){

			$id = $_POST["idPatient"];
			
			$controller = new PatientDAO();
			$query = $controller->deletePatient($id);

			
			if(!$query){
				?> <script>alert('Mascota No fue Agregada');</script> <?php
				header("location: ../../view/client/addPatient.php");
			}else{
				?> <script language="JavaScript" type="text/javascript">alert("Mascota Agregada Correctamente");</script> <?php
				header("location: ../../view/client/viewPatients.php");
				
			}
		}

		if($procesar == "editPicture"){
			$id = $_POST['id'];
			$nameImg = savePictureClient();

			$controller = new ClientDAO();
			$query = $controller->editPictureClient($id, $nameImg);

			
			if($query == NULL){
				?> <script>alert('Mascota No fue Agregada');</script> <?php
				header("location: ../../view/client/addPatient.php");
			}else{
				?> <script language="JavaScript" type="text/javascript">alert("Imagen Cambiada Correctamente");</script> <?php
				header("location: ../../view/client/");
				
			}
		}

		if($procesar == "editPicturePatient"){
			$id = $_POST['id'];
			$nameImg = savePicture();

			$controller = new PatientDAO();
			$query = $controller->editPicturePatient($id, $nameImg);

			
			if($query == NULL){
				?> <script>alert('Mascota No fue Agregada');</script> <?php
				header("location: ../../view/client/addPatient.php");
			}else{
				?> <script language="JavaScript" type="text/javascript">alert("Imagen Cambiada Correctamente");</script> <?php
				header("location: ../../view/client/viewPatients.php");
				
			}
		}

		if($procesar == "addAppointment"){
			$id_client = $_POST['id_client'];
			$id_patient = $_POST['patient'];
			$date = $_POST['date'];
			$hour = $_POST['hour'];

			$controller = new ClientDAO();
			$query = $controller->addAppointment($id_client, $id_patient, $date, $hour);
			if(!$query){
				?> <script type="text/javascript">alert('Hora No Disponible');</script> <?php
				header("location: ../../view/client/addAppointment.php");
			}else{
				?> <script language="JavaScript" type="text/javascript">alert("Cita Registrada Correctamente");</script> <?php
				header("location: ../../view/client/");
				
				}
		}

		function savePicture(){

			$name = "";
			$directorio = "../../img/imgPets/";

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

		function savePictureClient(){

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

		if($procesar == "addMessage"){

			
			$nameOrigin = $_POST['nameOrigin'];
			$id_destination = $_POST['destino'];
			$description = $_POST['description'];
			$date = $_POST['date'];

			$controller = new ClientDAO();
			$message = new MessageVO(NULL, $nameOrigin, $id_destination, $description, $date);

			$query = $controller->addMessage($message);

			if($query == NULL){
				
				header("location: ../../view/veterinary/addMessage.php");
			}else{
				
				header("location: ../../view/veterinary/");
				
			}

		}

		if($procesar == "cancelAppointment"){

			$idAppointment = $_POST['appointment'];
			$controller = new ClientDAO();
			$query = $controller->cancelAppointment($idAppointment);
			header("location: ../../view/veterinary/");
		}

		if($procesar == "updateStateAppointment"){

			
			$idAppointment = $_POST['appointment'];
			$newState = $_POST['newState'];
			$controller = new VeterinaryDAO();
			$query = $controller->changeStateAppointment($idAppointment, $newState);
			header("location: ../../view/veterinary/viewAppointmentToday.php");
		}

		if($procesar == "addAtention"){

			$idPatient = $_POST['idPatient'];
			$idVeterinary = $_POST['idVeterinary'];
			$idHistory = $_POST['idHistory'];
			$idTreatment = $_POST['idTreatment'];

			$dateEntry = $_POST['dateEntry'];
			$dateExit = $_POST['dateExit'];
			$hospitalization = $_POST['hospitalization'];
			$observation = $_POST['observation'];
			$state = $_POST['state'];
			
			

			$controller = new VeterinaryDAO();
			
			$query = $controller->addAtention($idPatient, $idVeterinary, $idHistory, $idTreatment, $dateEntry, $dateExit, $hospitalization, $observation, $state);

			$idAppointment = $_POST['idAppointment'];
			$newState = "Atendido";
			$query = $controller->changeStateAppointment($idAppointment, $newState);

			header("location: ../../view/veterinary/viewAppointmentToday.php");

			if($query == NULL){
				
				header("location: ../../view/veerinary/index.php");
			}else{
				
				header("location: ../../view/veterinary/index.php");
				
			}

		}


	

?>