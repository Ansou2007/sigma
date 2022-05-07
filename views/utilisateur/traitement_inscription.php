<?php
	require_once '../../configuration.php';
	require_once base_app.'core/connection.php';
	require base_app.'PHPMailer/PHPMailer.php';	
	require base_app.'PHPMailer/SMTP.php';
	require base_app.'PHPMailer/Exception.php';
	require base_app.'configuration.php';
	USE	PHPMailer\PHPMailer\PHPMailer;
	USE	PHPMailer\PHPMailer\SMTP;
	USE	PHPMailer\PHPMailer\Exception;

/*	
if(isset($_POST['action']) == "verifier"){
		$mail = $_POST['email'];
		$requete = $con->prepare("SELECT * FROM utilisateur WHERE email = ?  ");
		$requete->execute(array($_POST['email']));		 
	if($requete->rowCount() >0){		
		echo "<h5 class='alert alert-danger'>Mail existe déja</h5>";
		exit();
	}else{
		echo "success";
		exit();
	}
}	
*/

	    
	if($_POST['action'] == "inscription"){
		$token = strtoupper(substr(md5(uniqid()),0,4)).date('dy'); 
		if(!empty($_POST['mail'])){
			$email = $_POST['mail'];
			$telephone = $_POST['telephone'];
			$nom_complet = $_POST['nom_complet'];
			$req = $con->prepare("SELECT * FROM utilisateur WHERE email=?");
			$req->execute(array($email));
			if($req->rowCount()>0){
				echo "<h4 class=' alert alert-danger'>Le mail existe déja</h4>";
				exit();
			}else{
			$requete = $con->prepare("INSERT INTO utilisateur(nom_complet,email,token,etat) VALUES(?,?,?,?)");
			$requete->execute(array($nom_complet,$email,$token,0));
			$recup = $con->prepare("SELECT * FROM utilisateur WHERE email=?");
			$recup->execute(array($email));
			if($recup->rowCount() >0 ){
				$info_util = $recup->fetch();
				$_SESSION['id'] = $info_util;
                $id = $info_util['id'];
				Envoimail($_POST['mail'],$id,$token);
				//echo "<h4 class='alert alert-success'>Réussie ! Un Mail vous sera envoyé pour confirmation</h4>";
			
						}
			}
				   
		}
	}
//}


	
	function Envoimail($email,$id,$token){
		global $con;
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls'; 
		$mail->Port = 587;
		$mail->Username = 'coursecoma@gmail.com';
		$mail->Password = 'Promotion9@';
		$mail->Subject = 'Activation Compte';
		$mail->setFrom = 'coursecoma@gmail.com';		
		$mail->addAddress($email,'');	
		$mail->isHTML(true);
		$mail->Body = 'Bonjour Veuillez Cliquer ici pour <a href='.base_url.'activation.php?id='.$id.'&token='.$token.'>Activer Votre Compte</a>';
		$mail->smtpClose();
		if (!$mail->send()) {
			//echo 'Erreur: ' . $mail->ErrorInfo;
			echo "<h4 class='alert alert-danger'>Erreur de Connexion</h4>";
			$requete = $con->prepare("DELETE FROM utilisateur WHERE id=? ");
			$requete->execute(array($id));
		} else {
			echo "<h4 class='alert alert-success'>Réussie ! Un Mail vous sera envoyé pour confirmation</h4>";
			
		}
	}