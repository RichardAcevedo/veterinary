<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Central Pet || The best place for Your Pet</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/cssPaginaPrincipal/Estilo.css">
	<link rel="icon" href="css/cssPaginaPrincipal/img/iconoPestania.png" />
</head>
<body>
	<header id="ancla1">
		<img src="css/cssPaginaPrincipal/img/logo.png" style="margin: 10px; width: 200px" >
		<nav>
			<ul>
				<li><a href="#ancla1"><h4 id="titulo" style="color: #929292;">Inicio</h4></a></li>
				<li><a href="#ancla2" ><h4 id="titulo" style="color: #929292;">Quienes Somos</h4></a></li>
				<li><a href="#ancla3"><h4 id="titulo" style="color: #929292;">Servicios</h4></a></li>
				<li><a href="#ancla4" ><h4 id="titulo" style="color: #929292;">Galeria</h4></a></li>
				<li><a href="css/cssContacto/"><h4 id="titulo" style="color: #929292;">Contactanos</h4></a></li>
				<li><a href="view/login/"><h4 id="titulo" style="color: #929292;">Entrar</h4></a></li>
			</ul>
		</nav>
	</header>			
	<section>
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="css/cssPaginaPrincipal/img/img1.png" class="d-block w-100" alt="..." style="height: 645px;">
				</div>
				<div class="carousel-item">
					<img src="css/cssPaginaPrincipal/img/img2.png" class="d-block w-100" alt="..." style="height: 645px;">
				</div>
				<div class="carousel-item">
					<img src="css/cssPaginaPrincipal/img/img3.png" class="d-block w-100" alt="..." style="height: 645px;">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<hr class="linea">
		<div class="container">
			<div class="row">
				<section class="col-6">
					<img src="css/cssPaginaPrincipal/img/veterinarios.jpg" style="width: 500px; height: 450px;">
				</section>
				<article class="col-6" id="ancla2">
					<br>
					<h1>¿Quienes Somos?</h1>
					<br>
					<p>CentralPet es un software online de gestión de centros veterinarios totalmente orientado a conseguir que tu equipo pueda trabajar de una forma ágil y coordinada, abarcando todas las áreas de tu negocio y así ayudarte a generar valor para tus clientes y colaboradores.
						<br><br>
					Se trata de una software basado en lenguaje multiplataforma, que te permite gestionar toda tu clínica de forma rápida, sencilla y segura desde cualquier lugar. Descubre todo lo que GestorVet puede hacer por tu centro veterinario.</p>
				</article>
			</div>
		</div>
		<hr class="linea">
		<div class="container">
			<h1 id="ancla3">Servicios</h1>
			<div class="row">
				<section class="col-4">
					<img class="icono" src="css/cssPaginaPrincipal/img/iconoAgenda.png" style="width: 35px; height: 35px;">
					<h5>CONTROL DE AGENDAS</h5>
					<p>Con ellas podrás gestionar el tiempo de todos los usuarios y recursos de tu centro. Establece tiempos de trabajo en las consultas y quirófanos. Además, el módulo de tareas permitirá optimizar el tiempo de tu equipo.</p>
					<br>
					<img class="icono" src="css/cssPaginaPrincipal/img/iconoHistoriales.png" style="width: 35px; height: 35px;">
					<h5>GESTIÓN DE HISTORIALES</h5>
					<p>Nuestra forma de gestionar los historiales es realmente única. De un sólo vistazo podrás conocer la historia clínica de tu paciente, saber cuando vino, quien lo atendió y qué seguimiento se hizo. Podrás incorporar documentos adjuntos, imágenes, vídeos y recetas.</p>
				</section>
				<section class="col-4">
					<img class="icono" src="css/cssPaginaPrincipal/img/iconoConsultas.png" style="width: 35px; height: 35px;">
					<h5>CONSULTAS</h5>
					<p>Podrás elaborar y con todo tu equipo la ejecución de los protocolos de consulta, identificando qué preguntas hay que realizar, cuáles son obligatorias, cómo deseas que se respondan, etc.</p>
					<br>
					<img class="icono" src="css/cssPaginaPrincipal/img/iconoHospitalizacion.png" style="width: 35px; height: 35px;">
					<h5>HOSPITALIZACIÓN</h5>
					<p>Con él podrás prever y controlar todas las actuaciones necesarias en tus pacientes hospitalizados, dar altas y emitir informes de hospitalización, además de controlar su facturación automáticamente</p>
				</section>
				<section class="col-4">
					<img class="icono" src="css/cssPaginaPrincipal/img/iconoPresupuesto.png" style="width: 35px; height: 35px;">
					<h5>PRESUPUESTOS</h5>
					<p>CentralPet contempla la doble naturaleza de productos y servicios de los medicamentos veterinarios, pudiendo transformar automáticamente los productos en tratamientos para facilitar la facturación.</p>
					<br>
					<img class="icono" src="css/cssPaginaPrincipal/img/iconoRecordatorios.png" style="width: 35px; height: 35px;">
					<h5>RECORDATORIOS</h5>
					<p>Tú sólo apunta una cita en la agenda para un cliente o factura los artículos que hayas decidido, GestorVet se encargará de enviar un aviso por SMS o email de forma totalmente automática. Más fácil, imposible</p>
				</section>
			</div>
		</div>
	</section>
	<hr class="linea">
	<div class="container">
		<div class="row">
			<section class="col-12">
				<h1 id="ancla4">Galería</h1>
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="css/cssPaginaPrincipal/img/vet1.jpg" class="d-block w-100" alt="..." style="height: 645px;">
						</div>
						<div class="carousel-item">
							<img src="css/cssPaginaPrincipal/img/vet2.jpg" class="d-block w-100" alt="..." style="height: 645px;">
						</div>
						<div class="carousel-item">
							<img src="css/cssPaginaPrincipal/img/vet3.jpg" class="d-block w-100" alt="..." style="height: 645px;">
						</div>
						<div class="carousel-item">
							<img src="css/cssPaginaPrincipal/img/vet4.jpg" class="d-block w-100" alt="..." style="height: 645px;">
						</div>
						<div class="carousel-item">
							<img src="css/cssPaginaPrincipal/img/vet5.jpg" class="d-block w-100" alt="..." style="height: 645px;">
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</section>
		</div>
	</div>
	<hr class="linea">
	
	<footer>
		<div class="social">
			<ul>
				<li><a href="https://es-la.facebook.com/" target="_blank" class="icon-facebook">Facebook</a></li>
				<li><a href="https://twitter.com/?lang=es" target="_blank" class="icon-twitter">Twitter</a></li>
				<li><a href="https://plus.google.com/discover" target="_blank" class="icon-googleplus">Google+</a></li>
				<li><a href="https://co.pinterest.com/" target="_blank" class="icon-pinterest">Pinterest</a></li>
				<li><a href="https://www.google.com/intl/es-419/gmail/about/" target="_blank" class="icon-mail">Gmail</a></li>
			</ul>
		</div>
		<div class="row">
			<section id="huella" class="col-4">
				<img src="css/cssPaginaPrincipal/img/imgFinal.png" style="width: 150px; height: 150px;">
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
				<h6>ACCEDE</h6>
				<a href="view/login/loginAdmin.php">Administrador</a>
				<br>
				<a href="view/login/loginVet.php">Veterinario</a>
				<br>
				<a href="view/login/">Cliente</a>
			</section>
		</div>
		<blockquote>CentralPet©2019</blockquote>
	</footer>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>