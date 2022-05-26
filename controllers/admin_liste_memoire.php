<?php
	require('../configuration.php');
	require_once base_app.'core/connection.php';

	/* LISTE DES MEMOIRES */
	if($_POST['action'] == "liste"){
	$requete = $con->prepare('SELECT * FROM memoire,utilisateur WHERE memoire.id_utilisateur=utilisateur.id ');
	$requete->execute();
	$memoire = $requete->fetchAll();
	$ligne = $requete->rowCount();
	$sortie = '
					<thead>
					<tr>
						<th>N°</th>
						<th>Utilisateur</th>
						<th>Catégorie</th>		
						<th>Code Dépot</th>	
						<th>Date Publication</th>
						<th>Sujet</th>
						<th>lien</th>
						<th>Auteur</th>
						<th>Mots Clés</th>
						<th>Publier</th>
						
						
						
					</tr>
				</thead>
				<tbody>';
		if($ligne >0){
			$number = 1;
				foreach($memoire as $memoire){				
					$sortie .= '<tr>
					<td>'.$number.'</td>
					<td>'.$memoire["nom_complet"].'</td>
					<td>'.$memoire["categorie"].'</td>
					<td>'.$memoire["numero_depot"].'</td>
					<td>'.$memoire["date_memoire"].'</td>
					<td>'.$memoire["sujet"].'</td>	
					<td>
					<form action="lecture.php" method="POST">
					<input  type="hidden" name="numero_depot" value="'.$memoire["numero_depot"].'">
					<Button type="submit" name="voir"><i class="icon-eye-open"></i>Voir</Button>
					</form>
					</td>	
					<td>'.$memoire["auteur"].'</td>	
					<td>'.$memoire["mots_cles"].'</td>	
					
					<td>					
					<div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-cog"></i>Action</a>
                          <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
						  <li><button type="button"  name="supprimer" id="'.$memoire["id"].'" class="btn btn-success partager"><i class="icon-group icon-large"></i> Partagé</button></li>
						  <li><button type="button"  name="supprimer" id="'.$memoire["id"].'" class="btn btn-success partager"><i class="icon-group icon-large"></i> Partagé</button></li>
                          </ul>
                        </div>
						</td>
					</tr>';
			$number++;
			}
			
			}else{
				$sortie .= '
				<tr>
				<td>Aucun enregistrement</td>
				</tr>';			
				}
	$sortie .= '</tbody>';
	
	echo $sortie;
}



	
	

