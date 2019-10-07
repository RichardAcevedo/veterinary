<?php
	require_once '../../bd/Database.php';
	class VeterinaryDAO{

		
		function findToChangePassword($id, $secretQuestion, $secretAnswer){
			$db = new Database();
			$connection = $db->getConnection();
			$sql          = "SELECT * FROM veterinary WHERE id ='$id' and secretAnswer = '$secretAnswer' ";
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
			$sql          = "UPDATE veterinary SET password = '$password' WHERE id = '$id'";
			$result       = mysqli_query($connection, $sql);
			return true;
		}

		function listVeterinarys(){
			require '../../model/VeterinaryModel/VeterinaryVO.php';
			$veterinarys = array();
			$db = new Database();
			$con = $db->getConnection();
			$query  = "select * from veterinary";
			$result = mysqli_query($con, $query);
			$cant = 0;
			if (mysqli_affected_rows($con) != 0) {
			    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			        $id = $row['id'];
			        $name = $row['name'];
			        $lastName = $row['lastName'];
			        $sex = $row['sex'];
			        $phone = $row['phone'];
			        $cardProfessional = $row['cardProfessional'];
			        $secretQuestion = $row['secretQuestion'];
			        $secretAnswer = $row['secretAnswer'];
			        $mail = $row['mail'];
			        $password = $row['password'];
			        $picture = $row['picture'];
			       
			        $veterinarys[$cant] = new VeterinaryVO($id, $name, $lastName, $sex, $phone, $cardProfessional, $secretQuestion, $secretAnswer, $mail, $password, $picture);
			        $cant++;
			    }
			}else{
				return false;
			}
			return $veterinarys;
		}

		function listAppointment($date){
			require '../../model/vo/AppointmentVO.php';
			$appointments = array();
			$db = new Database();
			$con = $db->getConnection();
			$query  = "select * from appointment where dateAppointment = '$date'";
			$result = mysqli_query($con, $query);
			$cant = 0;
			if (mysqli_affected_rows($con) != 0) {
			    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			        $id = $row['id'];
			        $id_client = $row['id_client'];
			        $id_patient = $row['id_patient'];
			        $hour = $row['hour'];
			        $state = $row['state'];

			        $appointments[$cant] = new AppointmentVO($id, $id_client, $id_patient, $date, $hour, $state);
			        $cant++;
			    }
			}else{
				return false;
			}
			return $appointments;
		}

		function listAllAppointment(){
			require '../../model/vo/AppointmentVO.php';
			$appointments = array();
			$db = new Database();
			$con = $db->getConnection();
			$query  = "select * from appointment ORDER BY dateAppointment ASC, hour ASC";
			$result = mysqli_query($con, $query);
			$cant = 0;
			if (mysqli_affected_rows($con) != 0) {
			    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			        $id = $row['id'];
			        $id_client = $row['id_client'];
			        $id_patient = $row['id_patient'];
			        $dateAppointment = $row['dateAppointment'];
			        $hour = $row['hour'];
			        $state = $row['state'];

			        $appointments[$cant] = new AppointmentVO($id, $id_client, $id_patient, $dateAppointment, $hour, $state);
			        $cant++;
			    }
			}else{
				return false;
			}
			return $appointments;
		}

		function changeStateAppointment($id, $newState){
			$db = new Database();
			$connection = $db->getConnection();
			$sql          = "UPDATE appointment SET state = '$newState' WHERE id = '$id'";
			$result       = mysqli_query($connection, $sql);
			return true;
		}

		function addAtention($idPatient, $idVeterinary, $idHistory, $idTreatment, $dateEntry, $dateExit, $hospitalization, $observation, $state){
			$db = new Database();

			$connection = $db->getConnection();
			$stmt = $connection->prepare("INSERT INTO atention_patient (id_atention, id_patient, id_veterinary, id_history, id_treatment, dateEntry, dateExit, hospitalization, daysHospitalized, observations, state) VALUES (NULL , ?, ?, ?, ?, ?, ?, ?, 0, ?,?)");

			
		
			$stmt->bind_param("isiisssss", $idPatient, $idVeterinary, $idHistory, $idTreatment, $dateEntry, $dateExit, $hospitalization, $observation, $state);
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