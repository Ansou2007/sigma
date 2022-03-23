<?php
	require_once '../../configuration.php';
	require_once base_app.'core/connection.php';
	
	
	
	if(isset($_POST["action"]))
{		
			
		if($_POST['action'] == "ajout")
		{		
		$id_utilisateur = $_POST['id_utilisateur'];
		$message = $_POST['message'];
		$date= date('Y-m-d');
		$requete = $con->prepare("INSERT INTO temoignage(id_utilisateur,libelle,date_publication) VALUES(?,?,?)");
		$requete->execute(array($id_utilisateur,$message,$date));	
		echo "<h4 class='alert alert-success'>Ajout avec succées</h4>";		
		}
		/*-------------------SUPRESSION--------------------*/	
		if($_POST['action'] == "supprimer"){
			$id = $_POST['id'];
			$requete = $con->prepare("DELETE  from temoignage WHERE id=?");
			$requete->execute(array($id));
			echo "Suppression avec success";
		}
		/*-------------------FIN SUPRESSION--------------------*/	
		/*-------------CHARGEMENT LISTE---------*/
		if($_POST['action'] == "liste_temoignage"){			
			$requet = $con->prepare("SELECT * FROM temoignage");
			$requet->execute();
			$temoignage = $requet->fetchAll();
			$ligne = $requet->rowCount();
			$sortie = '
					<thead>
					<tr>
						<th>Date</th>
						<th>Message</th>		
						<th>Approbation</th> 	
						<th width="15%">Modifier </th>
						<th width="15%">Supprimer </th>
					</tr>
				</thead>
				<tbody>';
			if($ligne > 0 ){
				
				foreach($temoignage as $temoignage){
					
					$sortie .= '
					
					<tr>
					<td>'.$temoignage["date_publication"].'</td>
					<td>'.$temoignage["libelle"].'</td>
					<td>'.$temoignage["approbation"].'</td>					
					<td>					                    
                    <button type="button" name="editer" id="'.$temoignage["id"].'" class="btn btn-success editer">Modifier</button>					
					</td>
					<td>					
                    <button  name="supprimer" id="'.$temoignage["id"].'" class="btn btn-danger supprimer">Supprimer</button>	
					</td>
					</tr>';
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
			$requete = $con->prepare("SELECT * FROM temoignage WHERE id=?");			
			$requete->execute(array($id));
			$temoignage = $requete->fetchAll();
			
			foreach($temoignage as $temoignage){
				
				$sortie['libelle'] = $temoignage['libelle'];
			}
			echo  json_encode($sortie);
		}
		
		/*---------------EDITION------------------*/
		if($_POST['action'] == "editer")
		{
			
			$id = $_POST['hidden_id'];
			$message = $_POST['libelle'];
			$requete = $con->prepare("UPDATE temoignage SET libelle=? WHERE id=?");
			$requete->execute(array($message,$id));
			$requete->execute();
			echo "<h4 class='alert alert-success'>Modifier avec succées</h4>";
		}
	
		
}