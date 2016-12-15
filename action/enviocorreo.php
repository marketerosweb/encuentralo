<?php 


$conexion = new mysqli('localhost', 'arketero_encu', 'marketeros123', 'arketero_encuentralo');

mysqli_set_charset($conexion, 'utf-8');

if (isset($_POST['nombreContacto']) && isset($_POST['nombreComercio'])){
	$nombreComercio = $_POST['nombreComercio'];
	$nombreContacto = $_POST['nombreContacto'];
	$nit = $_POST['nit'];
	$telefonoFijo = $_POST['telFijo'];
	$celular = $_POST['celular'];
	$email = $_POST['email'];
	$productos = $_POST['productos'];
	$ciudad = $_POST['ciudad'];
	
	//echo '<script type="text/javascript">window.location="/";</script>';
	$insertar = 'INSERT INTO inscripciones (nombre, nom_comercio, nit, telefono, celular, email, productos, ciudad)
	VALUES 
	("'.$nombreContacto.'","'.$nombreComercio.'", "'.$nit.'", "'.$telefonoFijo.'", "'.$celular.'", "'.$email.'", "'.$productos.'", "'.$ciudad.'" )';
	$accion = $conexion->query($insertar);

	


	//envio correo normal 
	$para = $email;
	//$para  = $emailrecibido.','.$email; // A este email llegara el correo
	$titulo = 'Nuevo registro Encuentralo pronto';
	
	//cuerpo mensaje
	$mensaje = 	

	'<html>'.
	'<head><title> Registro EncuentraloPronto</title></head>'.
	'<body><div style="width:80%; border: 3px solid #000; margin:0 auto; text-align:center">'.
	'<div style="background:#000"><img src="http://encuentralopronto.com/uploads/logo_image/logo_3.png" width="60%" />
	</div>'.
	'<strong>Hola: </strong> '.$nombreContacto.
	'<br><br>'.
	'<p>Estás a un paso de crear tu Tienda Online en el Centro Comercial Virtual más emprendedor del País,próximamente uno de nuestros asesores se contactara contigo para brindarte mayor información</p>'.
	'<br></div></body>';
	

	$cabeceras = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$cabeceras .= 'From: mercadeo@encuentralopronto.com' .
		' [Nuevo registro Encuentalo pronto]' ;

	if (mail($para, $titulo, $mensaje, $cabeceras)){	

	$emailrecibido = "mercadeo@encuentralopronto.com";
	//	$emailrecibido = "oscarflm9@gmail.com";
	$titulo1 = 'Se ha registado un nuevo usuario';
	$mensaje1 = 	"Se ha registrado el siguiente usuario"."\n".
	"Nombre del contacto:    ".$nombreContacto."\n".
	"Nombre del Comercio:    ".$nombreComercio."\n".
	"NIT:    ".$nit."\n".
	"Teléfono Fijo:    ".$telefonoFijo."\n".
	"Celular:    ".$celular."\n".
	"Email:    ".$email."\n".
	"Productos o Servicios ofrecidos:    ".$productos."\n".
	"ciudad:    ".$ciudad."\n";
	$cabeceras1 = 'mercadeo: mercadeo@encuentralopronto.com' .
		//'Reply-To: '.$_POST['email'].'' . "\r\n" .
		'Nuevo registro Encuentalo pronto' ;
	mail($emailrecibido, $titulo1, $mensaje1, $cabeceras1);	

	echo 'Hola: '.$nombreContacto.'<br />';
	echo '<div clas="">hemos enviado un mensaje de confirmación a tu correo, si no lo ves en tu bandeja de entrada por favor verifica en tu carpeta de spam';
	echo '<script type="text/javascript">
		var pagina="/"
			function redireccionar() 
			{
			location.href=pagina
			} 
			setTimeout ("redireccionar()", 2000);
		</script>';
	}
		else
		{
			echo 'no se ha enviado el correo, por favor verifica nuevamente';
		}

	}
	else{
	echo 'lo sentimos, no pudiste ser registrado, intentalo de nuevo';
	}

?>