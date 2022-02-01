
<?php
	require_once '../../../Configuration.php';
	require_once base_app.'core/connection.php';
	session_start();
		
		if(isset($_POST['supprimer'])) 
			{
            //On nettoie les valeurs
				$id_region = $_POST['id_region'];
				
			        //On prepare la requete

			$query =$con->prepare('DELETE FROM region WHERE id=:id');           
            $query->execute(array(':id'=>$id_region));                      
			$_SESSION['ok']= "Région Supprimé";	 
			}else{
			 $message = "Région non supprimé";			 
		 }        
		header("location:region");


?>

