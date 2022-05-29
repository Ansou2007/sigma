<?php
	require('../configuration.php');
	require_once base_app.'core/connection.php';


    /*AJOUT categorie */
    if($_POST['action'] == "ajout")
		{		
		$nom_categorie = $_POST['libelle'];
		$requete = $con->prepare("INSERT INTO categorie(nom_categorie) VALUES(?)");
		$requete->execute(array($nom_categorie));
		echo "<h4 class='alert alert-success'>Catégorie ajoutée avec succées</h4>";		
		}
    /*-------------------SUPRESSION--------------------*/	
		if($_POST['action'] == "supprimer"){
			$id = $_POST['id'];
			$requete = $con->prepare("DELETE  from categorie WHERE id=?");
			$requete->execute(array($id));
			echo "Suppression avec success";
		}
		/*-------------------FIN SUPRESSION--------------------*/	
	/* LISTE DES categorie */
	if($_POST['action'] == "liste"){
	$requete = $con->prepare('SELECT * FROM categorie');
	$requete->execute();
	$categorie = $requete->fetchAll();
	$ligne = $requete->rowCount();
	$sortie = '
					<thead>
					<tr>
						<th>N°</th>
						<th>categorie</th>
                        <th>Action</th>
					</tr>
				</thead>
				<tbody>';
		if($ligne >0){
			$number = 1;
				foreach($categorie as $categorie){				
					$sortie .= '<tr>
					<td>'.$number.'</td>
					<td>'.utf8_encode($categorie["nom_categorie"]).'</td>
					<td>					
					<div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-cog"></i>Action</a>
                          <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
						  <li><button type="button"  name="supprimer" id="'.$categorie["id"].'" class="btn btn-success partager"><i class="icon-group icon-large"></i>Publier</button></li>
						  <li><button type="button"  name="supprimer" id="'.$categorie["id"].'" class="btn btn-warning partager"><i class="icon-group icon-large"></i>Ne Pas publier</button></li>
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
        $requete = $con->prepare("SELECT * FROM categorie WHERE id=?");			
        $requete->execute(array($id));
        $categorie = $requete->fetchAll();
        
        foreach($categorie as $categorie){
            
            $sortie['id'] = $categorie['id'];
            $sortie['libelle'] = $categorie['designation'];
        }
        echo  json_encode($sortie);
    }
    
    
    /*---------------EDITION------------------*/
    if($_POST['action'] == "edition")
    {			
        //$id = $_POST['hidden_id'];
        $id = $_POST['id'];
        //$id_utilisateur = $_POST['id_utilisateur'];
        $nom_categorie = $_POST['libelle'];
        $requete = $con->prepare("UPDATE filiere SET designation=? WHERE id=?");
        $requete->execute(array($nom_categorie,$id));
        //$libelle = "Temoignage Modifié";
        //notification($id_utilisateur,$libelle);
                    
        echo "<h4 class='alert alert-success'>Modifier avec succées</h4>";
    }

	
	

