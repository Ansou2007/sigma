<?php
	require_once '../../configuration.php';
	require_once base_app.'core/connection.php';
extract($_POST);
//if(isset($_POST['action'])){
	
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

	
	
//}