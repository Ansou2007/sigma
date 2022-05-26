<?php
	require('../configuration.php');
	require_once base_app.'core/connection.php';


    /*AJOUT FILIERE */
    if($_POST['action'] == "ajout")
		{		
		$nom_filiere = $_POST['libelle'];
		$requete = $con->prepare("INSERT INTO filiere(designation) VALUES(?)");
		$requete->execute(array($nom_filiere));
		echo "<h4 class='alert alert-success'>Filiére ajoutée avec succées</h4>";		
		}
    /*-------------------SUPRESSION--------------------*/	
		if($_POST['action'] == "supprimer"){
			$id = $_POST['id'];
			$requete = $con->prepare("DELETE  from filiere WHERE id=?");
			$requete->execute(array($id));
			echo "Suppression avec success";
		}
		/*-------------------FIN SUPRESSION--------------------*/	
	/* LISTE DES FILIERES */
	if($_POST['action'] == "liste"){
	$requete = $con->prepare('SELECT * FROM filiere');
	$requete->execute();
	$filiere = $requete->fetchAll();
	$ligne = $requete->rowCount();
	$sortie = '
					<thead>
					<tr>
						<th>N°</th>
						<th>Filiére</th>
                        <th>Action</th>
					</tr>
				</thead>
				<tbody>';
		if($ligne >0){
			$number = 1;
				foreach($filiere as $filiere){				
					$sortie .= '<tr>
					<td>'.$number.'</td>
					<td>'.utf8_encode($filiere["designation"]).'</td>
					<td>					
					<div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-cog"></i>Action</a>
                          <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
						  <li><button type="button"  name="supprimer" id="'.$filiere["id"].'" class="btn btn-success partager"><i class="icon-group icon-large"></i>Publier</button></li>
						  <li><button type="button"  name="supprimer" id="'.$filiere["id"].'" class="btn btn-warning partager"><i class="icon-group icon-large"></i>Ne Pas publier</button></li>
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

	/*-------------FIN CHARGEMENT LISTE---------*/
    if($_POST['action'] == "liste_un"){
        $id = $_POST['id'];	
        //$id_utilisateur = $_POST['id_utilisateur'];
        $requete = $con->prepare("SELECT * FROM filiere WHERE id=?");			
        $requete->execute(array($id));
        $filiere = $requete->fetchAll();
        
        foreach($filiere as $filiere){
            
            $sortie['id'] = $filiere['id'];
            $sortie['libelle'] = $filiere['designation'];
        }
        echo  json_encode($sortie);
    }
    
    
    /*---------------EDITION------------------*/
    if($_POST['action'] == "edition")
    {			
        //$id = $_POST['hidden_id'];
        $id = $_POST['id'];
        //$id_utilisateur = $_POST['id_utilisateur'];
        $nom_filiere = $_POST['libelle'];
        $requete = $con->prepare("UPDATE filiere SET designation=? WHERE id=?");
        $requete->execute(array($nom_filiere,$id));
        //$libelle = "Temoignage Modifié";
        //notification($id_utilisateur,$libelle);
                    
        echo "<h4 class='alert alert-success'>Modifier avec succées</h4>";
    }

	
	

