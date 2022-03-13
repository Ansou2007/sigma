<?php
	require_once '../../configuration.php';
	require_once base_app.'core/connection.php';

	
	//extract($_POST);
	
if($_POST['action'] == "ajout"){ 
	$code = "DPT-".strtoupper(substr(md5(uniqid()),0,4)).date('dy');
	if(!empty($_FILES)){	
	$id_utilisateur = $_POST['id_utilisateur'];
	$categorie = $_POST['categorie'];
	$date = date('Y-m-d');
	$sujet = $_POST['sujet'];
	$auteur = "Ansoumane Michel TAMBA";
	$mots_cles = $_POST['mot_cle'];
	$mail = $_POST['mail'];
	$document_name = $_FILES['document']['name'];
	$document_tmp = $_FILES['document']['tmp_name'];
	$document_destination = "Depot/$mail/".$document_name;
	//$document_destination ='../../depot/'.$document_name;
	$document_extension = strrchr($document_name, ".");
	$extension_autorise = array('.pdf','.PDF');
	if(in_array($document_extension,$extension_autorise)){
		
		if(move_uploaded_file($document_tmp,$document_destination)){

			$requete = $con->prepare("INSERT INTO memoire(id_utilisateur,numero_depot,categorie,date_memoire,sujet,lien_memoire,auteur,mots_cles)VALUES(?,?,?,?,?,?,?,?) ");
			$requete->execute(array($id_utilisateur,$code,$categorie,$date,$sujet,$document_destination,$auteur,$mots_cles));	
			
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
	$id_utilisateur = $_POST['id_utilisateur'];
	$requete = $con->prepare('SELECT * FROM memoire WHERE id_utilisateur=?');
	$requete->execute(array($id_utilisateur));
	$memoire = $requete->fetchAll();
	$ligne = $requete->rowCount();
	$sortie = '
					<thead>
					<tr>
						<th>Catégorie</th>		
						<th>Code Dépot</th>	
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
					<td>'.$memoire["numero_depot"].'</td>
					<td>'.$memoire["date_memoire"].'</td>
					<td>'.$memoire["sujet"].'</td>	
					<td><a href="lecture.php?code='.$memoire["numero_depot"].'" target="_blank"><i class="icon-eye-open"></i>Voir</a></td>	
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


if($_POST['action'] == "liste_un")
{
	$id = $_POST['id'];
	$requete = $con->prepare("SELECT * FROM memoire WHERE id=?");
	$requete->execute(array($id));
	$memoire = $requete->fetchAll();
	
	foreach($memoire as $memoire){
		
		$sortie['categorie'] = $memoire['categorie'];
		$sortie['sujet'] = $memoire['sujet'];
		$sortie['auteur'] = $memoire['auteur'];
		$sortie['mot_cle'] = $memoire['mots_cles'];
		//$sortie['document'] = base_app.'views/memoire/'.$memoire['lien_memoire'];
	}
	echo utf8_encode(json_encode($sortie));
}
/*--------------EDITION-------------*/
if($_POST['action'] == "editer"){
	$id = $_POST['hidden_id'];
	$categorie = $_POST['categorie'];
	$sujet = $_POST['sujet'];
	$auteur =$_POST['auteur'];
	$mot_cle =$_POST['mot_cle'];
	$document_name = $_FILES['document']['name'];
	$document_tmp = $_FILES['document']['tmp_name'];
	$document_destination = 'doc/'.$document_name;
	$document_extension = strrchr($document_name, ".");
	$extension_autorise = array('.pdf','.PDF');
	$requete = $con->prepare("UPDATE memoire SET categorie=?, sujet=?, auteur=?, mots_cles=? WHERE id=? ");
	$requete->execute(array($categorie,$sujet,$auteur,$mot_cle,$id));
	echo "<h4 class='alert alert-success'>Modification avec success</h4>";
}
	
	

/*SUPPRESSION MEMOIRE*/
if($_POST['action'] == "supprimer"){
	$id = $_POST['id_memoire'];
	$requete = $con->prepare('DELETE FROM memoire WHERE id=?');
	$requete->execute(array($id));
}