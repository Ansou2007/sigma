<?php
	require_once '../../../Configuration.php';
	require_once base_app.'core/connection.php';
	session_start();
		
		if(isset($_POST['enregistrer'])) 
			{
            //On nettoie les valeurs
		$region = $_POST['region'];
        $nom_departement = strip_tags($_POST['nom_departement']);             
			        //On prepare la requete
         $query = $con->prepare('INSERT INTO departement(id_region,nom_departement) VALUES(:id_region,:nom_departement)');
                //On accroche les parametre
		 $query->bindValue(':id_region',$region, PDO::PARAM_INT); 
         $query->bindValue(':nom_departement',$nom_departement, PDO::PARAM_STR);        
                //On execute la requete
         $query->execute();	 	 
		 $_SESSION['ok']= "Ajout avec succées";	 
		 }else{
			 $message = "Région non enregistré";
			 
		 }
         
	 header("location:departement");


?>