<?php
	require('../configuration.php');
	require_once base_app.'core/connection.php';

	/* LISTE DES MEMOIRES */
	if($_POST['action'] == "liste"){
	$requete = $con->prepare('SELECT * FROM utilisateur');
	$requete->execute();
	$utilisateur = $requete->fetchAll();
	$ligne = $requete->rowCount();
	$sortie = '
					<thead>
					<tr>
						<th>N°</th>
						<th>Utilisateur</th>
						<th>Email</th>
						<th>Role</th>		
						<th>Date Naissance</th>
						<th>Lieu Naissance</th>
                        <th>Université</th>
                        <th>Action</th>
						
						
						
					</tr>
				</thead>
				<tbody>';
		if($ligne >0){
			$number = 1;
				foreach($utilisateur as $utilisateur){				
					$sortie .= '<tr>
					<td>'.$number.'</td>
					<td>'.$utilisateur["nom_complet"].'</td>
					<td>'.$utilisateur["email"].'</td>
					<td>'.$utilisateur["role"].'</td>
					<td>'.$utilisateur["date_naissance"].'</td>
                    <td>'.$utilisateur["lieu_naissance"].'</td>
                    <td>'.$utilisateur["universite"].'</td>
					<td>					
					<div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-cog"></i>Action</a>
                          <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
						  <li><button type="button"  name="supprimer" id="'.$utilisateur["id"].'" class="btn btn-success partager"><i class="icon-group icon-large"></i>Publier</button></li>
						  <li><button type="button"  name="supprimer" id="'.$utilisateur["id"].'" class="btn btn-warning partager"><i class="icon-group icon-large"></i>Ne Pas publier</button></li>
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



	
	

