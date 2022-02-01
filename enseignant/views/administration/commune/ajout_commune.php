<?php
	require_once '../../../Configuration.php';
	require_once base_app.'core/connection.php';
	session_start();
		
		if(isset($_POST['enregistrer'])) 
			{
            //On nettoie les valeurs
		$id_departement = $_POST['id_departement'];
        $nom_commune = strip_tags($_POST['nom_commune']);             
			        //On prepare la requete
         $query = $con->prepare('INSERT INTO commune(id_departement,nom_commune) VALUES(:id_departement,:nom_commune)');
                //On accroche les parametre
		 $query->bindValue(':id_departement',$id_departement, PDO::PARAM_INT); 
         $query->bindValue(':nom_commune',$nom_commune, PDO::PARAM_STR);        
                //On execute la requete
         $query->execute();	 	 
		 $_SESSION['ok']= "Ajout avec succées";	 
		 }else{
			 $message = "commune non enregistré";
			 
		 }
         
	 header("location:commune");


?>