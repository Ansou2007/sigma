
<?php
	require_once '../../Configuration.php';
	require_once base_app.'core/connection.php';
	session_start();
		
		if(isset($_POST['supprimer'])) 
			{
            //On nettoie les valeurs
				$id_utilisateur = $_POST['id_utilisateur'];
				
			        //On prepare la requete

			$query =$con->prepare('DELETE FROM utilisateur WHERE id=:id');           
            $query->execute(array(':id'=>$id_utilisateur));                      
			$_SESSION['ok']= "Ajout avec succées";	 
			}else{
			 $message = "Utilisateur non supprimé";			 
		 }        
		header("location:utilisateur");


?>

