<?php 
require __DIR__ . '/vendor/autoload.php';
if (isset($_POST['correo']))  {
$mail = new PHPMailer();
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.server.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'user@server.com';                 // SMTP username
$mail->Password = 'secret';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;   
$mail->setFrom('from@server.com', 'Mailer');
$mail->AddAddress("to@server.com"); 
$mail->addCC('CC@server.com');
$comment = '';
  $comment .= 'Nombre: ' . $_POST['nombre'] . "</br>";
  $comment .= 'Correo: ' . $_POST['correo'] . "</br>";
  $comment .= 'Telefono: ' . $_POST['asunto'] . "</br>";
  
  $mail->Subject = "Subject mail";
$mail->Body = $comment;

if(!$mail->send()) {
    echo 'Message could not be sent. error';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent exito';
}
} else {

    echo ("error");
}

?> 