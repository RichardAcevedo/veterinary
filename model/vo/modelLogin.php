<?php
require_once '../../bd/Database.php';
require_once 'ClientVO.php';
require_once 'AdministratorVO.php';
require_once 'VeterinaryVO.php';


	class ModelLogin{

		function find($id, $password, $tipo){
			$db = new Database();
			$connection = $db->getConnection();

			$sql          = "SELECT * FROM $tipo WHERE id='$id' and password='$password'";
			$result       = mysqli_query($connection, $sql);
			$count        = mysqli_num_rows($result);
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			if ($count == 1) {
				if($tipo == "client"){
					
					$user = new ClientVO($row['id'], $row['name'], $row['lastName'], $row['sex'], $row['phone'], $row['secretQuestion'], $row['secretAnswer'], $row['mail'], $row['password'], $row['picture'] );
				}
				if($tipo == "administrator"){
					
					$user = new AdministratorVO($row['id'], $row['name'], $row['lastName'], $row['sex'], $row['phone'],  $row['mail'], $row['password']);
				}
				if($tipo == "veterinary"){
					
					$user = new VeterinaryVO($row['id'], $row['name'], $row['lastName'], $row['sex'], $row['phone'], $row['cardProfessional'],$row['secretQuestion'], $row['secretAnswer'], $row['mail'], $row['password'],$row['picture']);
				}
				return $user;
			}else{
				
				return NULL;
			}
		}
		
	}

?>