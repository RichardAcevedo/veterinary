<?php
	require_once '../../bd/Database.php';
	class ClientDAO{

		function addClient($Person){
			$db = new Database();

			$connection = $db->getConnection();
			$stmt = $connection->prepare("INSERT INTO client (id, name, lastName, sex, phone, secretQuestion, secretAnswer, mail, password, picture) VALUES (? , ?, ?, ?, ?, ?, ?,?,?,?)");

			$id = $Person->getId();
			$name = $Person->getName();
			$lastName = $Person->getLastName();
			$sex = $Person->getSex();
			$phone = $Person->getPhone();
			$secretQuestion = $Person->getSecretQuestion();
			$secretAnswer = $Person->getSecretAnswer();
			$mail = $Person->getMail();
			$password = $Person->getPassword();
			$picture = $Person->getPicture();
			
			$stmt->bind_param("ssssssssss", $id, $name, $lastName, $sex, $phone, $secretQuestion, $secretAnswer, $mail, $password, $picture);
			try {
			    $stmt->execute();
			    return true;
			} catch (Exception $e) {
			    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    return false;
			}
		}

		function editClient($Person){
			$db = new Database();

			$connection = $db->getConnection();
			$stmt = $connection->prepare("UPDATE client SET name = ?, lastName = ?, phone = ?, secretAnswer = ?, mail = ? WHERE id = ?");

			$id = $Person->getId();
			$name = $Person->getName();
			$lastName = $Person->getLastName();
			$sex = $Person->getSex();
			$phone = $Person->getPhone();
			$secretQuestion = $Person->getSecretQuestion();
			$secretAnswer = $Person->getSecretAnswer();
			$mail = $Person->getMail();
			$password = $Person->getPassword();
			$picture = $Person->getPicture();
			
			$stmt->bind_param("ssssss", $name, $lastName, $phone, $secretAnswer, $mail, $id);
			try {
			    $stmt->execute();
			    return true;
			} catch (Exception $e) {
			    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    return false;
			}
		}

		function editPictureClient($id, $nameImg){
			$db = new Database();

			$connection = $db->getConnection();
			$stmt = $connection->prepare("UPDATE client SET picture = ? WHERE id = ?");

			
			$stmt->bind_param("ss", $nameImg, $id);
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
			$sql          = "SELECT * FROM client WHERE id ='$id' AND secretAnswer = '$secretAnswer' AND secretQuestion='$secretQuestion' ";
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
			$sql          = "UPDATE client SET password = '$password' WHERE id = '$id'";
			$result       = mysqli_query($connection, $sql);
			return true;
		}

		function listClients(){
			require '../../model/ClientModel/ClientVO.php';
			$clients = array();
			$db = new Database();
			$con = $db->getConnection();
			$query  = "select * from client";
			$result = mysqli_query($con, $query);
			$cant = 0;
			if (mysqli_affected_rows($con) != 0) {
			    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			        $id = $row['id'];
			        $name = $row['name'];
			        $lastName = $row['lastName'];
			        $sex = $row['sex'];
			        $phone = $row['phone'];
			        $secretQuestion = $row['secretQuestion'];
			        $secretAnswer = $row['secretAnswer'];
			        $mail = $row['mail'];
			        $password = $row['password'];
			        $picture = $row['picture'];
			       
			        $clients[$cant] = new ClientVO($id, $name, $lastName, $sex, $phone, $secretQuestion, $secretAnswer, $mail, $password, $picture);
			        $cant++;
			    }
			}else{
				return false;
			}
			return $clients;

		}

		function addAppointment($idClient, $idPatient, $date, $hour){
			$db = new Database();
			$con = $db->getConnection();

			$query  = "select * from appointment where dateAppointment = '$date' and hour = '$hour' and state = 'Pendiente'";
			$result = mysqli_query($con, $query);

			if (mysqli_affected_rows($con) != 0) {
				return false;
			}
			else{
			    $stmt = $con->prepare("INSERT INTO appointment (id, id_client, id_patient, dateAppointment, hour, state) VALUES (NULL,?,?,?,?,?)");

				$id_client = $idClient;
				$id_patient = $idPatient;
				$dateAppointment = $date;
				$hourAppointment = $hour;
				$state = "Pendiente";
				$stmt->bind_param("sisss", $id_client, $id_patient, $dateAppointment, $hourAppointment, $state);
				try {
				    $stmt->execute();
				    return true;
				} catch (Exception $e) {
				    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
				    return false;
				}
			}
			

		}
		
		function viewMessages($id_Destination){
			require 'MessageVO.php';
			$messages = array();
			$db = new Database();
			$con = $db->getConnection();

			$query  = "select * from message where id_destination = '$id_Destination'";
			$result = mysqli_query($con, $query);
			$cant = 0;
			if (mysqli_affected_rows($con) != 0) {
			    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			    	$id = $row['id_message'];
			    	$name_origin = $row['name_origin'];
			    	$id_destination = $row['id_destination'];
			    	$description = $row['description'];
			    	$date = $row['dateMessage'];
			    	$messages[$cant] = new MessageVO($id, $name_origin, $id_destination, $description, $date);
			    	$cant++;

			    }
			}else{
				$messages = NULL;
				return $messages;
			}
			return $messages;
		}

		function getPatient($idClient){
			$db = new Database();
			$con = $db->getConnection();

			$query  = "select * from message where id_destination = '$id_Destination'";
			$result = mysqli_query($con, $query);
			$cant = 0;
			if (mysqli_affected_rows($con) != 0) {
			    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			    }
			}
		}

		function addmessage($message){
			$db = new Database();
			$connection = $db->getConnection();

			$stmt = $connection->prepare("INSERT INTO message (id_message, name_origin, id_destination, description, dateMessage) VALUES (NULL , ?, ?, ?, ?)");

			$nameOrigin = $message->getName_origin();
			$idDestination = $message->getId_destination();
			$description = $message->getDescription();
			$dateMessage = date("d-m-y");
			
			$stmt->bind_param("ssss", $nameOrigin, $idDestination, $description, $dateMessage);
			try {
			    $stmt->execute();
			    return true;
			} catch (Exception $e) {
			    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    return false;
			}
		}

		function cancelAppointment($id){
			$db = new Database();
			$connection = $db->getConnection();
			$sql          = "UPDATE appointment SET state = 'Cancelado' WHERE id = '$id'";
			$result       = mysqli_query($connection, $sql);
			return true;
		}

	}

?>