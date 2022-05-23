<?php 
require_once('../../configuration.php');
require_once base_app.'/core/connection.php';
//include base_app.'/include2/header.php';	


/*-------------CHARGEMENT LISTE---------*/
		if($_POST['action'] == "liste_activite"){	
			$id_utilisateur = $_POST['id_utilisateur'];
			$requet = $con->prepare("SELECT * FROM journal WHERE id_utilisateur=? ORDER BY date_journal DESC LIMIT 15");
			$requet->execute(array($id_utilisateur));
			$activite = $requet->fetchAll();
			$ligne = $requet->rowCount();
			$sortie = '
					<thead>
					<tr>
						<th>N°</th>
						<th>Date</th>
						<th>Message</th>		
					</tr>
				</thead>
				<tbody>';
			if($ligne > 0 ){
				$number = 1;
				foreach($activite as $activite){
					
					$sortie .= '
					
					<tr>
					<td>'.$number.'</td>
					<td>'.$activite["date_journal"].'</td>
					<td>'.$activite["libelle"].'</td>
					</tr>';
					$number ++;
				}
				
			}else{
				$sortie .= '
				
				<tr>
					<td>Aucune Activité Disponible</td>
					
				</tr>';
				}
			
				$sortie .= '</tbody>';
			
			echo $sortie ;
			
		}
		/*-------------FIN CHARGEMENT LISTE---------*/