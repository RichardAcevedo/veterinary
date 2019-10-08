<?php
	require_once '../../bd/Database.php';
	class AdministratorDAO{


		function deleteImageSlider($id){

			$db = new Database();

			$connection = $db->getConnection();
			$stmt = $connection->prepare("DELETE FROM slider_image_landing WHERE id_image = ?");

			$stmt->bind_param("s", $id);

			try {
			    $stmt->execute();
			    return true;
			} catch (Exception $e) {
			    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    return false;
			}


		}

		function saveImageSlider($name, $url){
			$db = new Database();

			$connection = $db->getConnection();
			$stmt = $connection->prepare("INSERT INTO slider_image_landing (id_image, name, url) VALUES (NULL, ?, ?)");



			$stmt->bind_param("ss", $name, $url);
			try {
			    $stmt->execute();
			    return true;
			} catch (Exception $e) {
			    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    return false;
			}



		}

		function addVeterinary($Person){
			$db = new Database();

			$connection = $db->getConnection();
			$stmt = $connection->prepare("INSERT INTO veterinary (id, name, lastName, sex, phone, cardProfessional, secretQuestion, secretAnswer, mail, password, picture) VALUES (? , ?, ?, ?, ?, ?, ?,?,?,?,?)");

			$id = $Person->getId();
			$name = $Person->getName();
			$lastName = $Person->getLastName();
			$sex = $Person->getSex();
			$phone = $Person->getPhone();
			$cardProfessional = $Person->getCardProfessional();
			$secretQuestion = $Person->getSecretQuestion();
			$secretAnswer = $Person->getSecretAnswer();
			$mail = $Person->getMail();
			$password = $Person->getPassword();
			$picture = $Person->getPicture();

			$stmt->bind_param("sssssssssss", $id, $name, $lastName, $sex, $phone, $cardProfessional, $secretQuestion, $secretAnswer, $mail, $password, $picture);
			try {
			    $stmt->execute();
			    return true;
			} catch (Exception $e) {
			    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    return false;
			}



		}

		function findToChangePassword($id, $secretQuestion, $secretAnswer){
			$db = new Database();
			$connection = $db->getConnection();
			$sql          = "SELECT * FROM administrator WHERE id ='$id' and secretAnswer = '$secretAnswer' ";
			$result       = mysqli_query($connection, $sql);
			$count        = mysqli_num_rows($result);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			if ($count == 1) {
				return true;
			}else{
				return false;
			}
		}



		function changePassword($id, $password){
			$db = new Database();
			$connection = $db->getConnection();
			$sql          = "UPDATE administrator SET password = '$password' WHERE id = '$id'";
			$result       = mysqli_query($connection, $sql);
			return true;
		}

		function altState($id, $state){
			$db = new Database();
			$connection = $db->getConnection();

			if($state == "Activo"){
				$sql          = "UPDATE client_patient SET state = 'Inactivo' WHERE id_patient = '$id'";
				$result       = mysqli_query($connection, $sql);
				return true;
			}else{
				$sql          = "UPDATE client_patient SET state = 'Activo' WHERE id_patient = '$id'";
				$result       = mysqli_query($connection, $sql);
				return true;
			}

		}

		function sendReminder($idAppointment, $idClient, $dateAppointment, $hourAppointment){
			$db = new Database();

			$connection = $db->getConnection();
			$stmt = $connection->prepare("INSERT INTO reminder (id, id_appointment, id_client, description) VALUES (NULL , ?, ?, ?)");

			$idAppointment =$idAppointment;
			$idClient = $idClient;
			$dateAppointment = $dateAppointment;
			$hourAppointment = $hourAppointment;

			$description = "Se le recuerda llevar a su mascota a la cita medica el dia ".$dateAppointment." a las ".$hourAppointment."";


			$stmt->bind_param("iss", $idAppointment, $idClient, $description);
			try {
			    $stmt->execute();
			    return true;
			} catch (Exception $e) {
			    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    return false;
			}



		}








}

?>
