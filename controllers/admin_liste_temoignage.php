<?php
	require('../configuration.php');
	require_once base_app.'core/connection.php';

	/* LISTE DES MEMOIRES */
	if($_POST['action'] == "liste"){
	$requete = $con->prepare('SELECT * FROM temoignage,utilisateur WHERE temoignage.id_utilisateur=utilisateur.id ');
	$requete->execute();
	$temoignage = $requete->fetchAll();
	$ligne = $requete->rowCount();
	$sortie = '
					<thead>
					<tr>
						<th>N°</th>
						<th>Utilisateur</th>
						<th>Message</th>		
						<th>Date Publication</th>
						
					</tr>
				</thead>
				<tbody>';
		if($ligne >0){
			$number = 1;
				foreach($temoignage as $temoignage){				
					$sortie .= '<tr>
					<td>'.$number.'</td>
					<td>'.$temoignage["nom_complet"].'</td>
					<td>'.$temoignage["libelle"].'</td>
					<td>'.$temoignage["date_publication"].'</td>
					<td>					
					<div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-cog"></i>Action</a>
                          <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
						  <li><button type="button"  name="supprimer" id="'.$temoignage["id"].'" class="btn btn-success partager"><i class="icon-group icon-large"></i>Publier</button></li>
						  <li><button type="button"  name="supprimer" id="'.$temoignage["id"].'" class="btn btn-warning partager"><i class="icon-group icon-large"></i>Ne Pas publier</button></li>
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



	
	

