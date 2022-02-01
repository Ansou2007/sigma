
<?php
	require_once '../../Configuration.php';	
	include base_app.'core/connection.php';
	session_start();
		if(isset($_POST['btn_supprimer'])) 
			{
            //On nettoie les valeurs
				$id_militant = $_POST['id_militant'];
				
			        //On prepare la requete

			$query =$con->prepare('DELETE FROM militant WHERE id=:id');           
            $query->execute(array(':id'=>$id_cellule));                      
			$_SESSION['ok']= "Militant Supprimé";	 
			}else{
			 $message = "Militant non supprimé";			 
		 }        
		header("location:Militant");


?>

