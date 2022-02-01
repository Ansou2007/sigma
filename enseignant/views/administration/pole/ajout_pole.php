<?php
	require_once '../../../Configuration.php';
	require_once base_app.'core/connection.php';
	session_start();
		/*
		if(isset($_POST)) 
			{
            //On nettoie les valeurs
          $nom_region = strip_tags($_POST['nom_region']);             
			        //On prepare la requete
         $query = $con->prepare('INSERT INTO region(nom_region) VALUES(:nom_region)');
                //On accroche les parametre
         $query->bindValue(':nom_region',$nom_region, PDO::PARAM_STR);        
                //On execute la requete
         $query->execute();	 	 
		 $_SESSION['ok']= "Ajout avec succées";	 
		 }else{
			 $message = "Région non enregistré";
			 
		 }
         
	 header("location:region");
	*/
	
	if(!empty($_POST['nom_region'])){
		$nom_region = $_POST['nom_region'];
		//$nom_region = preg_replace('#[^a-Z0-9]#i','',$nom_region);
		if(strlen($nom_region) <5 || strlen($nom_region)>16){
			echo '<br> 4 à 16 caractéres sont autorisés';
			exit();
		}elseif (is_numeric($nom_region[0])){
			echo '</br> Le premier caractere doit etre une lettre ';
			exit();
		}
		
		$query = $con->prepare("SELECT id from region WHERE nom_region=?");
		$query->execute(array($nom_region));
		$resultat = $query->fetchAll();
		elseif($resultat){
			echo '<br/>La région existe déja';
			exit();
		}else{
			echo 'success';
			exit();
		}
		
		
	}
		
	

?>