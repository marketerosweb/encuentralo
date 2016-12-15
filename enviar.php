<?php 

$nombre = $POST_['nombre'];
$apellido = $_POST['nombre'];
$email = $_POST['email'];

$destinatario = $email; 
$asunto = "Este mensaje es de prueba de ".$nombre." ".$apellido; 
$cuerpo = ' 
<html> 
<head> 
   <title>Prueba de correo</title> 
</head> 
<body> 
<h1>Hola amigos!</h1> 
<p> 
<b>Bienvenidos a mi correo electrónico de prueba</b>. Estoy encantado de tener tantos lectores. Este cuerpo del mensaje es del artículo de envío de mails por PHP. Habría que cambiarlo para poner tu propio cuerpo. Por cierto, cambia también las cabeceras del mensaje. 
</p> 
</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: OSCAR LEGUIZAMON <oscarflm9@gmail.com>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
//$headers .= "Reply-To: mariano@desarrolloweb.com\r\n"; 

//ruta del mensaje desde origen a destino 
$headers .= "Return-path: oleguizamon@marketerosweb.com\r\n"; 

//direcciones que recibián copia 
$headers .= "Cc: oscarflm9@gmail.com\r\n"; 

//direcciones que recibirán copia oculta 
$headers .= "Bcc: oscarflm9@yahoo.com\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers) 
?>