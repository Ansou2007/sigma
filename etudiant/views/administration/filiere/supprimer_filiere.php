
<?php
	require_once '../../../Configuration.php';
	require_once base_app.'core/connection.php';
	session_start();
		
		if(isset($_POST['btn_supprimer'])) 
			{
            //On nettoie les valeurs
				$id_departement = $_POST['id_departement'];
				
			        //On prepare la requete

			$query =$con->prepare('DELETE FROM departement WHERE id=:id');           
            $query->execute(array(':id'=>$id_departement));                      
			$_SESSION['ok']= "Supprimé avec succées";	 
			}else{
			 $message = "Utilisateur non supprimé";			 
		 }        
		header("location:departement");


?>

