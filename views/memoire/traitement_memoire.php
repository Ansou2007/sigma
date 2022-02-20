<?php
	require_once '../../configuration.php';
	require_once base_app.'core/connection.php';

if(!empty($_FILES)){
	
	//$id_utilisateur = 1;
	$categorie = "informatique";
	$date = date('Y-m-d');
	$sujet = "l'informatisation des memoire academiques";
	$auteur = "ansoumane michel tamba";
	$mots_cles = "informatique,memoire,academique";
	
	
	$document_name = $_FILES['document']['name'];
	$document_tmp = $_FILES['document']['tmp_name'];
	$document_destination = 'doc/'.$document_name;
	$document_extension = strrchr($document_name, ".");
	$extension_autorise = array('.pdf','.PDF');
	
	
	if(in_array($document_extension,$extension_autorise)){
		
		if(move_uploaded_file($document_tmp,$document_destination)){
			
			$requete = $con->prepare("INSERT INTO memoire(categorie,date_memoire,sujet,lien_memoire,auteur,mots_cles)VALUES(?,?,?,?,?,?) ");
			$requete->execute(array($categorie,$date,$sujet,$document_destination,$auteur,$mots_cles));
			echo "fichier envoyé avec sucess";
			header('location:memoire');
		}else{
			
			echo "Une erreur s'est produit";
		}
	}else{
		echo "Seul les fichiers pdf sont autorisé";
	}
}