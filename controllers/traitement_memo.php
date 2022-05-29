<?php
require_once '../configuration.php';
require_once base_app.'core/connection.php';

/* LISTE DES MEMOIRES */
if($_POST['action'] == "liste_memoire"){
	
	$requete = $con->prepare('SELECT * FROM memoire,utilisateur WHERE memoire.id_utilisateur=utilisateur.id order by date_memoire DESC LIMIT 6 ');
	$requete->execute();
	$memoire = $requete->fetchAll();
	$ligne = $requete->rowCount();
	$sortie = '<div class="tab-pane fade show active" id="courses-grid" role="tabpanel" aria-labelledby="courses-grid-tab">				
		<div class="row">
        ';
    if($ligne >0){
				foreach($memoire as $memoire){				
					$sortie .= '
                    <div class="col-lg-4 col-md-6">
                            <div class="singel-course mt-30">
                                <div class="thum">
                                    <div class="image">
                                         <img src="include/images/memoire/pdf.png" alt="Course" height="150" width="50">
                                    </div>                                  
                                </div>
                                <div class="cont">                                    
                                    <a id="lien" onclick="session()"  href="detail.php?code='.$memoire["numero_depot"].'" target="_blank"><h4>'.$memoire["sujet"].'</h4></a>
                                    <div class="course-teacher">
                                        <div class="thum">
										
                                        <a href="#"><img src="data:image/jpeg;base64,'.base64_encode($memoire["photo"]).'" alt="photo" height="50" width="50" ></a>

                                        </div>
                                        <div class="name">
                                            <a href="#"><h6>'.$memoire["nom_complet"].'</h6></a>
                                        </div>
                                        <div class="form-group">
                                            <span>Catégorie<h6 class="text text-center">'.$memoire['categorie'].'</h6></span>
                                        </div>
										 <div class="admin">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-envelope"></i><span>0</span></a></li>
                                                <li><a href="#"><i class="fa fa-heart"></i><span>0</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- singel course -->
                        </div>
                    
					';
		
			}
			
			}else{
				$sortie .= '
				<tr>
				<td>Aucun memoire</td>
				</tr>';			
				}
	$sortie .= '</div>
                </div>';
	echo $sortie;
}
/*----------------RECHERCHE */

if($_POST['action'] == "recherche"){	
    $sujet = $_POST['sujet'];
    $categorie = $_POST['categorie'];

	$requete = $con->prepare("SELECT * FROM memoire,utilisateur WHERE memoire.id_utilisateur=utilisateur.id AND sujet LIKE '%".$sujet."%' OR categorie LIKE '%".$categorie."%' ");
	$requete->execute();
	$memoire = $requete->fetchAll();
	$ligne = $requete->rowCount();
	$sortie = '<div class="tab-pane fade show active" id="courses-grid" role="tabpanel" aria-labelledby="courses-grid-tab">				
		<div class="row">
        ';
    if($ligne >0){
				foreach($memoire as $memoire){				
					$sortie .= '
                    <div class="col-lg-4 col-md-6">
                            <div class="singel-course mt-30">
                                <div class="thum">
                                    <div class="image">
                                         <img src="include/images/memoire/pdf.png" alt="Course" height="150" width="50">
                                    </div>                                  
                                </div>
                                <div class="cont">                                    
                                <a id="lien" name="lien" onclick="return false"  href="detail.php?code='.$memoire["numero_depot"].'" target="_blank"><h4>'.$memoire["sujet"].'</h4></a>
                                <div class="course-teacher">
                                        <div class="thum">
                                        <a href="#"><img src="data:image/jpeg;base64,'.base64_encode($memoire["photo"]).'" alt="photo" height="50" width="50" ></a>

                                        </div>
                                        <div class="name">
                                        <a href="#"><h6>'.$memoire["nom_complet"].'</h6></a>
                                        </div>
                                        <div class="form-group">
                                            <span>Catégorie<h6 class="text text-center">'.$memoire['categorie'].'</h6></span>
                                        </div>
										 <div class="admin">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-envelope"></i><span>31</span></a></li>
                                                <li><a href="#"><i class="fa fa-heart"></i><span>0</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- singel course -->
                        </div>
                    
					';
			}
			
			}else{
				$sortie .= '
				<tr>
				<td>Aucun memoire</td>
				</tr>';			
				}
	$sortie .= '</div>
                </div>';
	echo $sortie;
}

/*-------------- FIN RECHERCHE */