<?php
	require_once '../../configuration.php';
	require_once base_app.'core/connection.php';
	require_once base_app.'views/utilisateur/session.php';		

	include base_app.'controllers/journal.php';
	
	
	
			
		if($_POST['action'] == "ajout")
		{		
		$id_utilisateur = $_POST['id_utilisateur'];
		$message = $_POST['libelle'];
		$date= date('Y-m-d');
		$requete = $con->prepare("INSERT INTO temoignage(id_utilisateur,libelle,date_publication) VALUES(?,?,?)");
		$requete->execute(array($id_utilisateur,$message,$date));
		$libelle = "Temoignage Ajouté";
		notification($id_utilisateur,$libelle);
		echo "<h4 class='alert alert-success'>Ajout avec succées</h4>";		
		}
		/*-------------------SUPRESSION--------------------*/	
		if($_POST['action'] == "supprimer"){
			$id = $_POST['id'];
			$id_journal = $_SESSION['utilisateur']['id'];
			$requete = $con->prepare("DELETE  from temoignage WHERE id=?");
			$requete->execute(array($id));
			$libelle = "Temoignage Supprimé";
			notification($id_journal,$libelle);
			echo "Suppression avec success";
		}
		/*-------------------FIN SUPRESSION--------------------*/	
		/*-------------CHARGEMENT LISTE---------*/
		if($_POST['action'] == "liste_temoignage"){	
			$id_utilisateur = $_POST['id_utilisateur'];
			$requet = $con->prepare("SELECT * FROM temoignage WHERE id_utilisateur=? ");
			$requet->execute(array($id_utilisateur));
			$temoignage = $requet->fetchAll();
			$ligne = $requet->rowCount();
			$sortie = '
					<thead>
					<tr>
						<th>N°</th>
						<th>Date</th>
						<th>Message</th>		
						<th>Approbation</th> 	
						<th width="15%">Modifier </th>
						<th width="15%">Supprimer </th>
					</tr>
				</thead>
				<tbody>';
			if($ligne > 0 ){
				$number = 1;
				foreach($temoignage as $temoignage){
					
					$sortie .= '
					
					<tr>
					<td>'.$number.'</td>
					<td>'.$temoignage["date_publication"].'</td>
					<td>'.$temoignage["libelle"].'</td>
					<td>'.$temoignage["approbation"].'</td>					
					<td>					                    
                    <button  name="editer" id="'.$temoignage["id"].'" class="btn btn-success editer">Modifier</button>					
					</td>
					<td>					
                    <button  name="supprimer" id="'.$temoignage["id"].'" class="btn btn-danger supprimer">Supprimer</button>	
					</td>
					</tr>';
					$number ++;
				}
				
			}else{
				$sortie .= '
				
				<tr>
					<td>Aucun Témoignage Disponible</td>
					
				</tr>';
				}
			
				$sortie .= '</tbody>';
			
			echo $sortie ;
			
		}
		/*-------------FIN CHARGEMENT LISTE---------*/
		if($_POST['action'] == "liste_un"){
			$id = $_POST['id'];	
			//$id_utilisateur = $_POST['id_utilisateur'];
			$requete = $con->prepare("SELECT * FROM temoignage WHERE id=?");			
			$requete->execute(array($id));
			$temoignage = $requete->fetchAll();
			
			foreach($temoignage as $temoignage){
				
				$sortie['id'] = $temoignage['id'];
				$sortie['libelle'] = $temoignage['libelle'];
			}
			echo  json_encode($sortie);
		}
		
		
		/*---------------EDITION------------------*/
		if($_POST['action'] == "edition")
		{			
			//$id = $_POST['hidden_id'];
			$id = $_POST['id'];
			//$id_utilisateur = $_POST['id_utilisateur'];
			$message = $_POST['libelle'];
			$requete = $con->prepare("UPDATE temoignage SET libelle=? WHERE id=?");
			$requete->execute(array($message,$id));
			//$libelle = "Temoignage Modifié";
			//notification($id_utilisateur,$libelle);
						
			echo "<h4 class='alert alert-success'>Modifier avec succées</h4>";
		}
	
		
