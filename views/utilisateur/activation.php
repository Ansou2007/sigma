<?php
	session_start();
require_once('../../core/connection.php');

if(isset($_GET['id']) AND (!empty($_GET['id'])) AND isset($_GET['token']) AND !empty($_GET['token'])){
	$id = $_GET['id'];
	$token = $_GET['token'];
	
	$requete = $con->prepare('SELECT * FROM utilisateur WHERE id=? AND token=?');	
	$requete->execute(array($id,$token));
	if($requete->rowCount()>0 ){
		$resultat = $requete->fetch();
		if($resultat['status'] !=1){
			$requete = $con->prepare('UPDATE utilisateur SET status= ? WHERE id= ?');
			$requete->execute(array(1,$id));
			header('location:login');
		}else{
			header('location:login');
		}
		
	}else{
		echo "Votre id ou token est introuvable";
	}
	
	
}else{
	echo "Aucun Utilisateur";
}