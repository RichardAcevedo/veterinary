<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V6</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../cssPaginaPrincipal/Estilo.css">
	<link rel="icon" href="../cssPaginaPrincipal/img/iconoPestania.png" />
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<header id="ancla1">
		<img src="../cssPaginaPrincipal/img/logo.png" style="margin: 10px; width: 200px" >
		<nav>
			<ul>
				<li><a href="../../"><h4 id="titulo" style="color: #929292;">Inicio</h4></a></li>
				<li><a href="../../index.php#ancla2" ><h4 id="titulo" style="color: #929292;">Quines Somos</h4></a></li>
				<li><a href="../../index.php#ancla3"><h4 id="titulo" style="color: #929292;">Servicios</h4></a></li>
				<li><a href="../../index.php#ancla4" ><h4 id="titulo" style="color: #929292;">Galeria</h4></a></li>
				<li><a ><h4 id="titulo" style="color: #929292;">Contactanos</h4></a></li>
				<li><a href="../../view/login/"><h4 id="titulo" style="color: #929292;">Entrar</h4></a></li>
			</ul>
		</nav>
	</header>		

	<div class="container-contact100">
		<div class="contact100-map" id="google_map" data-map-x="40.722047" data-map-y="-73.986422" data-pin="images/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div>

		<button class="contact100-btn-show">
			<i class="fa fa-envelope-o" aria-hidden="true"></i>
		</button>

		<div class="wrap-contact100">
			<button class="contact100-btn-hide">
				<i class="fa fa-close" aria-hidden="true"></i>
			</button>

			<form class="contact100-form validate-form" method="POST">
				<span class="contact100-form-title">
					Contactanos
				</span>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Nombre</span>
					<input class="input100" type="text" name="name" placeholder="Ingrese su Nombre">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">Correo Electronico</span>
					<input class="input100" type="text" name="email" placeholder="Ingrese su Correo Electronico">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Mensjae</span>
					<textarea class="input100" name="message" placeholder="Redacte su mensaje..."></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Enviar
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>

			<span class="contact100-more">
				Para más Informacion, comuniquese a nuestro call center: <span class="contact100-more-highlight">+57 315 487 9871</span>
			</span>
			<br>
			<span class="contact100-more">
				ó Acercate a nuestra sucursal en : <span class="contact100-more-highlight">Calle 87 #34-52 Barrio Los Gigantes</span>
			</span>
		</div>
	</div>
	<br>
	<br>
	<footer>
		
		<div class="row">
			<section id="huella" class="col-4">
				<img src="../cssPaginaPrincipal/img/imgFinal.png" style="width: 150px; height: 150px;">
			</section>
			<section class="col-4">
				<h6>SERVICIOS</h6>
				<article>
					<p>Cirugía</p>
					<p>Vacunación</p>
					<p>Desparasitación</p>
					<p>Hospitalización</p>
					<p>Artículos</p>
				</article>				
			</section>
			<section class="col-4">
				<h6>ACCEDER</h6>
				<a href="../../view/login/loginAdmin.php">Administrador</a>
				<br>
				<a href="../../view/login/loginVet.php">Veterinario</a>
				<br>
				<a href="../../view/login/">Cliente</a>
			</section>
		</div>
		<blockquote>CentralPet©2019</blockquote>
	</footer>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
	<script src="js/map-custom.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
