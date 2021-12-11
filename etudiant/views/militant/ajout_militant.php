<?php
	require_once '../../Configuration.php';
	require_once base_app.'core/connection.php';
	session_start();
		
		if(isset($_POST['enregistrer'])) 
			{
            //On nettoie les valeurs
				$id_cellule = $_POST['id_cellule'];
				$nom_complet = strip_tags($_POST['nom_complet']);				    
                $date_naissance = $_POST['date_naissance'];
				$lieu_naissance = strip_tags($_POST['lieu_naissance']); 
				$telephone = filter_var($_POST['telephone'],FILTER_SANITIZE_NUMBER_INT); 
				$cin =filter_var($_POST['cin'],FILTER_SANITIZE_NUMBER_INT);
				$numero_electeur = filter_var($_POST['numero_electeur'],FILTER_SANITIZE_NUMBER_INT);
				$lieu_vote = strip_tags($_POST['lieu_vote']);				
				$numero_carte = filter_var($_POST['numero_carte'],FILTER_SANITIZE_NUMBER_INT);
			 if(empty($nom_complet) || is_numeric($nom_complet[0])){
				 $_SESSION['erreur']= "Vérifier le nom complet";
				 header('refresh:2,url=Militant');
			 }elseif($id_cellule == 0){
				 $_SESSION['erreur']= "La cellule est Obligatoire";
				 header('refresh:2,url=Militant');
			 }elseif(!preg_match("#^\+?[0-9\./, -]{9}$#",trim($telephone))){
				 $_SESSION['erreur']= "Le numéro de télephone est invalide";
				  header('refresh:2,url=Militant'); 
			 }elseif(!preg_match("#^\+?[0-9\./, -]{12}$#",trim($cin))){
				 $_SESSION['erreur']= "Le numéro d'identité nationale est invalide";
				  header('refresh:2,url=Militant');
			 }
			 else{
		//On prepare la requete
         $query = $con->prepare('INSERT INTO militant(id_cellule,nom_complet,date_naissance,lieu_naissance,telephone,cin,numero_electeur,lieu_vote,numero_carte) VALUES(:id_cellule,:nom_complet,:date_naissance,:lieu_naissance,:telephone,:cin,:numero_electeur,:lieu_vote,:numero_carte)');
		// $query = $con->prepare('INSERT INTO militant(id_cellule,nom_complet,date_naissance,lieu_naissance,telephone,cin,numero_electeur,lieu_vote,numero_carte) VALUES(:id_cellule,:nom_complet,:date_naissance,:lieu_naissance,:telephone,:cin,:numero_electeur,:lieu_vote,:numero_carte)');
            //On accroche les parametre
		 $query->bindValue(':id_cellule',$id_cellule, PDO::PARAM_INT); 
         $query->bindValue(':nom_complet',$nom_complet, PDO::PARAM_STR); 
		 $query->bindValue(':date_naissance',$date_naissance, PDO::PARAM_STR); 
         $query->bindValue(':lieu_naissance',$lieu_naissance, PDO::PARAM_STR); 
		 $query->bindValue(':telephone',$telephone, PDO::PARAM_STR); 
         $query->bindValue(':cin',$cin, PDO::PARAM_STR); 		         
		 $query->bindValue(':numero_electeur',$numero_electeur,PDO::PARAM_STR);
		 $query->bindValue(':lieu_vote',$lieu_vote,PDO::PARAM_STR);
		 $query->bindValue(':numero_carte',$numero_carte,PDO::PARAM_STR);
                //On execute la requete
         $query->execute();
		 $_SESSION['ok']= "Ajout avec succées";
		 
			}       
		 	 
		 	 
		 
			header("location:Militant"); 
		 }
         
	 


?>