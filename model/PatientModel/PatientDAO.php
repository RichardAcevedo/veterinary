<?php
	require_once '../../bd/Database.php';
	class PatientDAO{

		function addPatient($Patient){
			$db = new Database();
			$connection = $db->getConnection();
			$stmt = $connection->prepare("INSERT INTO patient (id, name, type, breed, sex, age, picture) VALUES (NULL,?,?,?,?,?,?)");

			$name = $Patient->getName();
			$type = $Patient->getType();
			$sex = $Patient->getSex();
			$breed = $Patient->getBreed();
			$age = $Patient->getAge();
			$picture = $Patient->getPicture();

			$stmt->bind_param("ssssss", $name, $type, $breed, $sex, $age, $picture);
			
			try {
			    $stmt->execute();
			    return true;
			} catch (Exception $e) {
			    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    return false;
			}
		}

		function addHistory($name, $breed){
			$db = new Database();
			$connection = $db->getConnection();

			$sql          = "SELECT * FROM patient WHERE name ='$name' and breed = '$breed'";
			$result       = mysqli_query($connection, $sql);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

			$idPatient = $row['id'];
			$stmt = $connection->prepare("INSERT INTO clinic_history (id_history, id_patient) VALUES (NULL,?)");

			$stmt->bind_param("i", $idPatient);
			
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

		function addClientPatient($name, $idClient, $state){
			$db = new Database();
			$connection = $db->getConnection();
			$stmt = $connection->prepare("INSERT INTO client_patient (code, id_client, id_patient, state) VALUES (NULL,?,?,?)");

			$queryIdPatient  = "select * from patient where name = '$name' ";
			$result = mysqli_query($connection, $queryIdPatient);
			
			if (mysqli_affected_rows($connection) != 0) {
			    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			    	$idPet = $row['id'];
			    }
			}

			$stmt->bind_param("sis", $idClient, $idPet, $state);
			try {
			    $stmt->execute();
			    return true;
			} catch (Exception $e) {
			    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
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

		function listPatients(){
			require 'PatientVO.php';
			$patients = array();
			$db = new Database();
			$con = $db->getConnection();
			$query  = "select * from patient";
			$result = mysqli_query($con, $query);
			$cant = 0;
			if (mysqli_affected_rows($con) != 0) {
			    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			        $id = $row['id'];
			        $name = $row['name'];
			        $type = $row['type'];
			        $breed = $row['breed'];
			        $sex = $row['sex'];
			        $age = $row['age'];
			        $picture = $row['picture'];
			        $patients[$cant] = new PatientVO($id, $name, $type, $sex, $breed, $age, $picture);
			        $cant++;
			    }
			}else{
				return false;
			}
			return $patients;

		}

		function listPatientsOfClient($idClient){
			require 'PatientVO.php';
			$patients = array();
			$db = new Database();
			$con = $db->getConnection();




			$query  = "select * from client_patient where id_client = '$idClient' and state ='Activo'";
			$result = mysqli_query($con, $query);
			$cant = 0;
			if (mysqli_affected_rows($con) != 0) {
			    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

			    	$idPet = $row['id_patient'];

			    	$query2  = "select * from patient where id = '$idPet'";
					$result2 = mysqli_query($con, $query2);
					$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

			        $id = $row2['id'];
			        $name = $row2['name'];
			        $type = $row2['type'];
			        $breed = $row2['breed'];
			        $sex = $row2['sex'];
			        $age = $row2['age'];
			        $picture = $row2['picture'];
			        $patients[$cant] = new PatientVO($id, $name, $type, $sex, $breed, $age, $picture);
			        $cant++;


			    }
			}else{
				$patients = NULL;
				return $patients;
			}
			return $patients;

		}

		function showDataSheet($idPatient){
			require 'PatientVO.php';
			
			$db = new Database();
			$con = $db->getConnection();
			$query  = "select * from patient where id = '$idPatient'";
			$result = mysqli_query($con, $query);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

			$id = $row['id'];
	        $name = $row['name'];
	        $type = $row['type'];
	        $breed = $row['breed'];
	        $sex = $row['sex'];
	        $age = $row['age'];
	        $picture = $row['picture'];
	        $patient = new PatientVO($id, $name, $type, $sex, $breed, $age, $picture);
	        
			return $patient;

		}

		function deletePatient($id){
			$state = "";
			$db = new Database();
			$connection = $db->getConnection();
			
			$query  = "select * from client_patient where id_patient = '$id'";
			$result = mysqli_query($connection, $query);
			if (mysqli_affected_rows($connection) != 0) {
			    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			    	$state = $row['state'];
			    }
			}

			$changeState = $this->changeStatePatient($id, $state);

			try {
			    return true;
			} catch (Exception $e) {
			    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    return false;
			}
		}

		public function changeStatePatient($id, $state){
			$newState = "";
			if($state = "Activo"){
				$newState = "Inactivo";
			}else{
				$newState = "Activo";
			}


			$db = new Database();
			$connection = $db->getConnection();
			$stmt = $connection->prepare("UPDATE client_patient SET state = ? WHERE id_patient = ?");

			$stmt->bind_param("si", $newState, $id);
			try {
			    $stmt->execute();
			    return true;
			} catch (Exception $e) {
			    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    return false;
			}
		}

		function editPicturePatient($id, $nameImg){
			$db = new Database();

			$connection = $db->getConnection();
			$stmt = $connection->prepare("UPDATE patient SET picture = ? WHERE id = ?");

			
			$stmt->bind_param("ss", $nameImg, $id);
			try {
			    $stmt->execute();
			    return true;
			} catch (Exception $e) {
			    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    return false;
			}
		}

		function editPatient($Person){
			$db = new Database();

			$connection = $db->getConnection();
			$stmt = $connection->prepare("UPDATE patient SET name = ?, age = ? WHERE id = ?");

			$id = $Person->getId();
			$name = $Person->getName();
			$age = $Person->getAge();
			
			$stmt->bind_param("ssi", $name, $age, $id);
			try {
			    $stmt->execute();
			    return true;
			} catch (Exception $e) {
			    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    return false;
			}
		}
		
		function viewNotifys($id){
			require 'NotifyVO.php';
			$notifys = array();
			$db = new Database();
			$con = $db->getConnection();

			$query  = "select * from reminder where id_client = '$id'";
			$result = mysqli_query($con, $query);
			$cant = 0;
			if (mysqli_affected_rows($con) != 0) {
			    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			    	$id = $row['id'];
			    	$id_appointment = $row['id_appointment'];
			    	$id_client = $row['id_client'];
			    	$description = $row['description'];
			    	$notifys[$cant] = new NotifyVO($id, $id_appointment, $id_client, $description);
			    	$cant++;

			    }
			}else{
				$notifys = NULL;
				return $notifys;
			}
			return $notifys;
		}

		




	}

?>