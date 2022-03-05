<?php
	require('PHPMailer/PHPMailer.php');	
	require('PHPMailer/SMTP.php');
	require('PHPMailer/Exception.php');
	require('configuration.php');
	USE	PHPMailer\PHPMailer\PHPMailer;
	USE	PHPMailer\PHPMailer\SMTP;
	USE	PHPMailer\PHPMailer\Exception;
	
	function Envoimail($email,$id,$token){
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
		$mail->isHTML(true);
		$mail->Body = 'Bonjour Veuillez Cliquer ici pour <a href='.base_url.'activation.php?id='.$id.'&token='.$token.'>Activer Votre Compte</a>';
		$mail->smtpClose();
		if (!$mail->send()) {
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message sent!';
			
		}
	}
	
	function nbre_filiere()
{
    global $con;
    $res = $con->query("select count(*) nbre  from filiere");
	$res->execute();
    $somme = $res->fetch();
    return $somme['nbre'];
}
	function nbre_inscrit()
{
    global $con;
    $res = $con->query("select count(*) nbre  from utilisateur");
	$res->execute();
    $somme = $res->fetch();
    return $somme['nbre'];
}

	function nbre_memoire()
{
    global $con;
    $res = $con->query("select count(*) nbre  from memoire");
	$res->execute();
    $somme = $res->fetch();
    return $somme['nbre'];
}