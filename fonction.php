<?php
	require('PHPMailer/PHPMailer.php');	
	require('PHPMailer/SMTP.php');
	require('PHPMailer/Exception.php');
	USE	PHPMailer\PHPMailer\PHPMailer;
	USE	PHPMailer\PHPMailer\SMTP;
	USE	PHPMailer\PHPMailer\Exception;
	
	function Envoimail($email){
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls'; 
		$mail->Port = 587;
		$mail->Username = 'coursecoma@gmail.com';
		$mail->Password = 'promotion9';
		$mail->Subject = 'Activation Compte';
		$mail->setFrom = 'coursecoma@gmail.com';		
		$mail->addAddress($email,'');		
		$mail->Body = '<a href="http://localhost/sigma/activation">Activer Votre Compte</a>';
		$mail->smtpClose();
		if (!$mail->send()) {
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message sent!';
			
		}
	}