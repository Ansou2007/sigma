<?php
	session_start();
require_once('../../core/connection.php');

if(isset($_GET['id']) AND (!empty($_GET['id'])) AND isset($_GET['token']) AND !empty($_GET['token'])){
	$id = $_GET['id'];
	$token = $_GET['token'];		
	$requete = $con->prepare('SELECT * FROM utilisateur WHERE id=? AND token=?');	
	$requete->execute(array($id,$token));
	if($requete->rowCount()>0 ){
		$resultat = $requete->fetch();
		if($resultat['etat'] !=1 AND isset($_POST['inscrire'])){
            $id_filiere = $_POST['id_filiere'];
            $mdpass = password_hash($_POST['mdpass1'], PASSWORD_DEFAULT);
			$requete = $con->prepare('UPDATE utilisateur SET etat= ?,id_filiere=?,mot_pass=?,`role`=? WHERE id= ?');			
			$requete->execute(array(1,$id_filiere,$mdpass,"etudiant",$id));
			header('location:login');
		}else{
			//header('location:login');
		}
		
	}else{
		echo "Votre id ou token est introuvable";
        exit();
	}
	
	
}else{
	echo "Aucun Utilisateur";
    exit();
}

//Chargement des filiere

    $req = $con->prepare("SELECT * FROM filiere");
    $req->execute();
    $filiere =$req->fetchAll();
    //print_r($filiere);

?>

<!doctype html>
<html lang="fr">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>SIGMA</title>
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="include/images/favicon.png" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="include/css/slick.css">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="include/css/animate.css">
    
    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="include/css/nice-select.css">
    
    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="include/css/jquery.nice-number.min.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="include/css/magnific-popup.css">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="include/css/bootstrap.min.css">
    
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="include/css/font-awesome.min.css">
    
    <!--====== Default css ======-->
    <link rel="stylesheet" href="include/css/default.css">
    
    <!--====== Style css ======-->
    <link rel="stylesheet" href="include/css/style.css">
    
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="include/css/responsive.css">
  
  
</head>

<body>


<section id="count-down-part" class="bg_cover pt-70 pb-120" data-overlay="8" style="background-image: url(include/images/inscription/inscription1.jpg)">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="count-down-cont pt-50">
                        
                        <h2>Etape 2</h2>
                        
                    </div> <!-- count down cont -->
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-8">
                    <div class="category-form category-form-3 pt-50">
                        <div class="form-title text-center">
                            <h3>INSCRIPTION</h3>                         
                        </div>
                        <div class="main-form">
							<div id="info"></div>
                            <form action="" method="post" >
								<div class="singel-form">
									<label>Filiere</label>
                                    <select class="form-control" name="id_filiere">										
										<option selected disabled class="form-control " >Filiere</option>
                                        <?php foreach($filiere as $filiere){ ?>
                                            <option 										
                                            value="<?php echo  $filiere['id'] ?>"> 
                                            <?php echo  $filiere['designation'] ?> 														
                                            </option>
                                        <?php };?>
									</select>
                                </div>
								<br></br>
								
                                <div class="singel-form"><label>Mot de Passe</label>
                                    <input type="password" placeholder="Votre Mot de pass" id="mdpass1" name="mdpass1">
                                </div>
								
                                <div class="singel-form"><label>Confirmer Mot de passe</label>
                                    <input type="password" id="mdpass2" name="mdpass2" placeholder="Confirmer mot de pass">
									<small id="small_mail"></small>
								</div>
                                
                                <div class="singel-form">
                                    <button class="main-btn" type="submit" name="inscrire">Valider</button>
                                </div>
								
                            </form>
                        </div>
                    </div> <!-- category form -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <!--====== jquery js ======-->
    <script src="include/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="include/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="include/js/bootstrap.min.js"></script>
    
    <!--====== Slick js ======-->
    <script src="include/js/slick.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="include/js/jquery.magnific-popup.min.js"></script>
    
    <!--====== Counter Up js ======-->
    <script src="include/js/waypoints.min.js"></script>
    <script src="include/js/jquery.counterup.min.js"></script>
    
    <!--====== Nice Select js ======-->
    <script src="include/js/jquery.nice-select.min.js"></script>
    
    <!--====== Nice Number js ======-->
    <script src="include/js/jquery.nice-number.min.js"></script>
    
    <!--====== Count Down js ======-->
    <script src="include/js/jquery.countdown.min.js"></script>
    
    <!--====== Validator js ======-->
    <script src="include/js/validator.min.js"></script>
    
    <!--====== Ajax Contact js ======-->
    <script src="include/js/ajax-contact.js"></script>
    
    <!--====== Main js ======-->
    <script src="include/js/main.js"></script>
    
   

		

</body>

</html>
