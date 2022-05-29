<?php
require_once('../../configuration.php');
require_once base_app.'/core/connection.php';


	$code = $_GET['code'];
	$requete = $con->prepare("SELECT * FROM memoire WHERE numero_depot=?");
	$requete->execute(array($code));
	
		$resultat = $requete->fetch();
		$fichier = $resultat['lien_memoire'];	
		header('Content-type:application/pdf');
		header('Content-Description;inline;filename="'.$fichier.'"');
		header('Content-Transfert-Encoding:binary');
		header('Accept-Ranges:bytes');
		//@readfile(base_url."views/memoire/$fichier");
		@readfile("../../views/memoire/$fichier");		
		

