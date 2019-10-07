<?php
	$correo = $_POST['mail'];
	$desde = "From:". "RichardAcevedo";
	$asunto = "Estas Inscrito ahora en nuestro Boletin";
	$mensaje = "Felicidades, Acabas de valer berguita";
	mail($correo, $asunto, $mensaje, $desde );
?>