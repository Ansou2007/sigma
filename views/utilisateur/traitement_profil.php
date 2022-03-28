<?php
	require_once '../../configuration.php';
	require_once base_app.'core/connection.php';
if($_POST['action'] == "editer"){
		$id = $_POST['id_utilisateur'];
		$date_naissance = $_POST['date_naissance'];
		$lieu_naissance = $_POST['lieu_naissance'];
		$universite = $_POST['universite'];
		$sexe = $_POST['sexe'];
		$requete = $con->prepare("UPDATE utilisateur SET date_naissance=? ,lieu_naissance=? , universite=? , sexe=? WHERE id=?");
		$requete->execute(array($date_naissance,$lieu_naissance,$universite,$sexe,$id));
		echo "<h4 class='alert alert-success'>Modification Profil avec success</h4>";
	}
	if($_POST['action'] == "editer_photo"){
		
		$id = $_POST['id_utilisateur'];
		$photo = file_get_contents($_FILES['photo']['tmp_name']);
		$taile = $_FILES['photo']['size'];
		$type = end(explode('.',$_FILES['photo']['name']));
		$extension_autorise = array('png','jpeg','jpg','gif');
		//taille 5MO
		if(in_array($type,$extension_autorise)){
			echo "<h4 class='alert alert-success'>Format accepté</h4>";
		}else{
			echo "<h4 class='alert alert-danger'>Attention</h4>";
		}
		/*
		if($taile > 500000){
			echo "<h4 class='alert alert-danger'>La taille doit trop grande</h4>";
		}else{
		$requete = $con->prepare("UPDATE utilisateur SET photo=?  WHERE id=?");
		$requete->execute(array($photo,$id));
		echo "<h4 class='alert alert-success'>Modification Profil avec success</h4>";	
		}
		*/
	}
	
	?>