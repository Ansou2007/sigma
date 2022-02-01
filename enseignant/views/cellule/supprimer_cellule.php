
<?php
	require_once '../../Configuration.php';	
	include base_app.'core/connection.php';
	session_start();
		if(isset($_POST['btn_supprimer'])) 
			{
            //On nettoie les valeurs
				$id_cellule = $_POST['id_cellule'];
				
			        //On prepare la requete

			$query =$con->prepare('DELETE FROM cellule WHERE id=:id');           
            $query->execute(array(':id'=>$id_cellule));                      
			$_SESSION['supprime_ok']= "Cellule Supprimée";	 
			}else{
			 $message = "Cellule non supprimée";			 
		 }        
		header("location:cellule");


?>

