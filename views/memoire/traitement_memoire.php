<?php
	require_once '../../configuration.php';
	require_once base_app.'core/connection.php';

	
	//extract($_POST);
	
if($_POST['action'] == "ajout"){ 
	$code = "DT-".strtoupper(substr(md5(uniqid()),0,4)).date('dy');
	if(!empty($_FILES)){	
	$id_utilisateur = $_POST['id_utilisateur'];
	$categorie = $_POST['categorie'];
	$date = date('Y-m-d');
	$sujet = $_POST['sujet'];
	$auteur = "Ansoumane Michel TAMBA";
	$mots_cles = $_POST['mot_cle'];
	$document_name = $_FILES['document']['name'];
	$document_tmp = $_FILES['document']['tmp_name'];
	$document_destination = 'doc/'.$document_name;
	$document_extension = strrchr($document_name, ".");
	$extension_autorise = array('.pdf','.PDF');
	if(in_array($document_extension,$extension_autorise)){
		
		if(move_uploaded_file($document_tmp,$document_destination)){

			$requete = $con->prepare("INSERT INTO memoire(id_utilisateur,categorie,date_memoire,sujet,lien_memoire,auteur,mots_cles)VALUES(?,?,?,?,?,?,?) ");
			$requete->execute(array($id_utilisateur,$categorie,$date,$sujet,$document_destination,$auteur,$mots_cles));	
			
			echo "<h4 class='alert alert-success'>Ajout avec success</h4>";
		}else{
			
			echo "<h4 class='alert alert-danger'>Une erreur s'est produit</h4>";
		}
	}else{
		echo "<h4 class='alert alert-danger'>Seuls les fichiers pdf sont autorisé</h4>";
		}
	
	}else{
		echo "<h4 class='alert alert-danger'>Vous devez choisir un document</h4>";
	}
	
}
	
	
	/* LISTE DES MEMOIRES */
	if($_POST['action'] == "liste_memoire"){
	
	$requete = $con->prepare('SELECT * FROM memoire');
	$requete->execute();
	$memoire = $requete->fetchAll();
	$ligne = $requete->rowCount();
	$sortie = '
					<thead>
					<tr>
						<th>Catégorie</th>						
						<th>Date Publication</th>
						<th>Sujet</th>
						<th>lien</th>
						<th>Auteur</th>
						<th>Mots Clés</th>
						<th>Modfifier</th>
						<th>Supprimer</th>
					</tr>
				</thead>
				<tbody>';
	if($ligne >0){
				foreach($memoire as $memoire){				
					$sortie .= '<tr>
					<td>'.$memoire["categorie"].'</td>
					<td>'.$memoire["date_memoire"].'</td>
					<td>'.$memoire["sujet"].'</td>	
					<td><a href="lecture.php?id='.$memoire["id"].'" target="_blank"><i class="icon-eye-open"></i>Voir</a></td>	
					<td>'.$memoire["auteur"].'</td>	
					<td>'.$memoire["mots_cles"].'</td>	
					<td>					                    
                    <button type="button" name="editer" id="'.$memoire["id"].'" class="btn btn-success editer">Modifier</button>					
					</td>
					<td>					
                    <button type="button"  name="supprimer" id="'.$memoire["id"].'" class="btn btn-danger supprimer">Supprimer</button>	
					</td>
					</tr>';
		
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

/*SUPPRESSION MEMOIRE*/

if($_POST['action'] == "supprimer"){
	$id = $_POST['id_memoire'];
	$requete = $con->prepare('DELETE FROM memoire WHERE id=?');
	$requete->execute(array($id));
}