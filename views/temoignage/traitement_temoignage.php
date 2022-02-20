<?php
	require_once '../../configuration.php';
	require_once base_app.'core/connection.php';
	
	
		extract($_POST);
		
	if(isset($_POST['action'])){
			
			if(isset($_POST['message'])){		
		$id_utilisateur = $_POST['id_utilisateur'];
		$message = $_POST['message'];
		$date= date('Y-m-d');
		$requete = $con->prepare("INSERT INTO temoignage(libelle,date_publication) VALUES(?,?)");
		$requete->execute(array($message,$date));
		
		}else if($_POST['action'] == "supprimer"){
			$id = $_POST['id'];
			$requete = $con->prepare("DELETE  from temoignage WHERE id=?");
			$requete->execute(array($id));
			header('location:temoignage');
		}
		
		
		
	}
		
	