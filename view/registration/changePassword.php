<?php
	$type = $_POST['action'];
	$id = $_POST['id'];

	require '../../bd/Database.php';
	$db = new Database();
	$con = $db->getConnection();

	$query  = "select * from $type where id = '$id'";
	$result = mysqli_query($con, $query);

	if (mysqli_affected_rows($con) != 0) {
	    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	    	$secretQuestion = $row['secretQuestion'];
	    }
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registro || CentralPet</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="css/images/icons/favicon.ico"/>
	<link href="../../css/cssPanel/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/css/util.css">
	<link rel="stylesheet" type="text/css" href="css/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">

	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('css/images/fondo.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form" action="../../controller/registration/changeVetPassword.php" method='post'>
					<span class="login100-form-title p-b-59">
						Cambiar Contraseña
					</span>


					<div class="wrap-input100 validate-input" data-validate="Identificacion is required">
						<span class="label-input100">Identificacion</span>
						<input class="input100" type="text"  placeholder="Identificación : " value="<?php echo $id; ?>" name="id" readonly>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Identificacion is required">
						<span class="label-input100">Pregunta Secreta</span>
						<input class="input100" type="text" placeholder="" value="<?php echo $secretQuestion; ?>" name="secretQuestion" readonly>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Respuesta is required">
						<span class="label-input100">Respuesta Secreta</span>
						<input class="input100" type="text" placeholder="Respuesta Secreta : "  name="secretAnswer">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Nueva Contraseña is required">
						<span class="label-input100">Nueva Contraseña</span>
						<input class="input100" type="text" placeholder="Nueva Contraseña : " value="" name="password">
						<span class="focus-input100"></span>
					</div>




					<br><br>





					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn"  type="submit" name = "action" value = "<?php echo $type; ?>">
								Cambiar Contraseña
							</button>
						</div>




						<a href="../login" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Iniciar Sesión
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script src="css/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="css/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="css/vendor/bootstrap/js/popper.js"></script>
	<script src="css/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="css/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="css/vendor/daterangepicker/moment.min.js"></script>
	<script src="css/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="css/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="css/js/main.js"></script>

</body>
</html>
