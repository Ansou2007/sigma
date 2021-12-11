
<?php
	require_once '../../../Configuration.php';
	require_once base_app.'core/connection.php';
	session_start();
		
		if(isset($_POST['supprimer'])) 
			{
            //On nettoie les valeurs
				$id_commune = $_POST['id_commune'];
				
			        //On prepare la requete

			$query =$con->prepare('DELETE FROM commune WHERE id=:id');           
            $query->execute(array(':id'=>$id_commune));                      
			$_SESSION['supprime_ok']= "Commune supprimée avec succées";	 
			}else{
			 $message = "Commune non supprimé";			 
		 }        
		header("location:commune");


?>

