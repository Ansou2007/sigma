<?php
	require_once '../../Configuration.php';
	require_once base_app.'core/connection.php';
	session_start();
		
		if(isset($_POST['enregistrer'])){
			
            //On nettoie les valeurs
			$id_commune = strip_tags($_POST['id_commune']);    
            $nom_cellule = strip_tags($_POST['nom_cellule']); 
		
		$query = $con->prepare("SELECT nom_cellule FROM cellule WHERE nom_cellule=? ");
        $query->execute(array($nom_cellule));
        $resultat = $query->fetchAll();
		
		if(strlen($nom_cellule) < 5){
			$_SESSION['erreur']=$message = '<div class="alert alert-danger">Au moins 5 caractéres</div>';
		}elseif(is_numeric($nom_cellule[0])){
		$_SESSION['erreur']=$message = '<div class="alert alert-danger">Le nom de cellule doit commencer par une lettre</div>';	
		}elseif($resultat){			
			$_SESSION['erreur']=$message = '<div class="alert alert-danger">Cellule existe déja</div>';			
		}
		else{
			//On prepare la requete
         $query = $con->prepare('INSERT INTO cellule(id_commune,nom_cellule) VALUES(:id_commune,:nom_cellule)');
                //On accroche les parametre
		 $query->bindValue(':id_commune',$id_commune, PDO::PARAM_INT); 
         $query->bindValue(':nom_cellule',$nom_cellule, PDO::PARAM_STR);        
                //On execute la requete
         $query->execute();	
			$_SESSION['ok']=$message = '<div class="alert alert-success">Cellule enregistrée</div>';		 
		}
		
			 header("location:cellule");
		}
	


?>