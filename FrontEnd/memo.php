<?php
	require_once('../configuration.php');
	require_once base_app.'/core/connection.php';
	include base_app.'/fonction.php';
	
	
	// Chargement Mémoire
	$requete = $con->prepare('SELECT * FROM memoire,utilisateur WHERE memoire.id_utilisateur=utilisateur.id order by date_memoire LIMIT 5 ');
	$requete->execute();
	$memoire = $requete->fetchAll();

	
	
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
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">

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
    <!--MODAL-->		
	<div class="modal fade" tabindex="-1" id="Modal_login"  role="dialog"  aria-hidden="true">
	<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	  <div id="alerte"></div>
        <h5 class="modal-title">Alerte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
		<h4>Vous n'etes pas Connecté(e)</h4>
		<p>Veuillez vous inscrire si vous n'avez pas encore de compte</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>           
        </div>
      

    </div>
  </div>
</div>
<!--FIN MODAL-->
   <!--====== PRELOADER PART START ======-->
    
    <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div>
    
    <!--====== PRELOADER PART START ======-->
   
    <!--====== MENU ======-->
    
    <header id="header-part">        
        <div class="navigation navigation-2 navigation-3">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-11 col-md-10 col-sm-9 col-9">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="">
                                <img src="images/logo-2.png" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a  href="index.php">Accueil</a>
										
                                    </li>
                                    <li class="nav-item">
                                        <a href="apropos">A propos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="active" href="memo">Mémoire</a>
                                        
                                    </li>
                                    <li class="nav-item">
                                        <a id="btn_connexion" href="login"><i class="fa fa-user-circle"></i> Connexion</a>
                                        
                                    </li>
                                   
                                </ul>
                            </div>
                        </nav> <!-- nav -->
                    </div>
                   <!--  <div class="col-lg-1 col-md-2 col-sm-3 col-3">
                        <div class="right-icon text-right">
                            <ul>
                                
                                <li><a class="" href="login"><i class="fa fa-user">Connexion</i></a></li>
                            </ul>
                        </div> right icon 
                    </div> -->
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
    </header>
    
    <!--====== FIN MENU ======-->
   
   
   
    <!--====== SLIDER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(include/images/inscription/inscription1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Mémoire</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Mémoire</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== SLIDER PART ENDS ======-->
    
    <!--====== DEBUT LISTE MEMOIRE ======-->
    
    <section id="courses-part" class="pt-120 pb-120 gray-bg">
        <div class="container">
			<!--BOUTON RECHERCHE-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="courses-top-search">                       
                        <div class="courses-search float-left">
                            <form action="#">
                                <input type="text" id="rechercher" placeholder="rechercher">
                                <button type="button"><i class="fa fa-search"></i></button>
                            </form>
                        </div> 
						
                    </div> 
                </div>
            </div> <!-- row -->
			<!-- FIN BOUTON RECHERCHE--->
			<!--TABLEAU CONTENU-->
            <div class="tab-content" id="memoire">
              
            </div>               
            </div> 
			<!-- FIN TABLEAU CONTENU -->
            <!--PAGINATION-->
            <div class="row">
                <div class="col-lg-12">
                    <nav class="courses-pagination mt-50">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a href="#" aria-label="Précedent">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="active" href="#">1</a></li>
                            <li class="page-item"><a href="#">2</a></li>
                            
                            <li class="page-item">
                                <a href="#" aria-label="Suivant">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>  <!--  pagination -->
                </div>
            </div>  <!-- row -->
            <!--FIN PAGINATION-->
        </div> <!-- container -->
    </section>
    
    <!--====== MEMOIRE LISTE FIN ======-->
    
   
    
    <!--====== DEBUT INSCRIPTION ======-->
    
    <section id="count-down-part" class="bg_cover pt-70 pb-120" data-overlay="8" style="background-image: url(images/inscription/inscription1.jpg)">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="count-down-cont pt-50">
                        <h3>NB: Seul les emails institutionnel sont autorisés</h3>
                        <h2>Inscription</h2>
                        
                    </div> <!-- count down cont -->
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-8">
                    <div class="category-form category-form-3 pt-50">
                        <div class="form-title text-center">
                            <h3>S'inscrire</h3>                         
                        </div>
                        <div class="main-form">
                             <form   id="form_inscription" onsubmit="return false;">
                                <div class="singel-form">
									<input type="hidden" name="action" id="action" value="inscription">
                                    <input type="text" placeholder="Votre Nom Complet" id="nom_complet" name="nom_complet">
                                </div>
                                <div class="singel-form">
                                    <input type="email" id="mail" name="mail" autocomplete="off" placeholder="Votre  Mail institutionnel" name="mail">
									<small id="small_mail"></small>
								</div>
                                <div class="singel-form">
                                    <input type="text" placeholder="téléphone" name="telephone" id="telephone">
                                </div>
                                <div class="singel-form">
                                    <button class="main-btn" type="submit" id="inscrire" name="inscrire">Valider</button>
                                </div>
								
                            </form>
                        </div>
                    </div> <!-- category form -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== FIN INSCRIPTION ======-->
    
    
    
    
   
    <!--====== PARTNAIRE LOGO DEBUT ======-->
    
    <div id="patnar-logo" class="pt-40 pb-80 gray-bg">
        <div class="container">
            <div class="row patnar-slied">
                <div class="col-lg-12">
                    <div class="singel-patnar text-center mt-40">
                        <img src="include/images/partenaire-logo/logo-UVS.jpg" width="82" height="82" alt="Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="singel-patnar text-center mt-40">
                        <img src="include/images/partenaire-logo/ucad.png" width="82" height="82" alt="Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="singel-patnar text-center mt-40">
                        <img src="include/images/partenaire-logo/ugb.jpg" width="82" height="82" alt="Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="singel-patnar text-center mt-40">
                        <img src="include/images/partenaire-logo/univ-thies.png" width="82" height="82" alt="Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="singel-patnar text-center mt-40">
                        <img src="include/images/partenaire-logo/zig.jpg" width="82" height="82" alt="Logo">
                    </div>
                </div>
                
            </div> <!-- row -->
        </div> <!-- container -->
    </div> 
    
    <!--====== PARTNAIRE LOGO FIN ======-->
   
    <!--====== FOOTER PART START ======-->
    
    <footer id="footer-part">
        <div class="footer-top pt-40 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-about mt-40">
                            <div class="logo">
                                <a href="#"><img src="images/logo-2.png" alt="Logo"></a>
                            </div>
                            <p>Systéme d'information pour la gestion mémoire académique</p>
                            <ul class="mt-20">
                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-link mt-40">
                            <div class="footer-title pb-25">
                                <h6>Sitemap</h6>
                            </div>
                            <ul>
                                <li><a href="index.php"><i class="fa fa-angle-right"></i>Accueil</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>A Propos</a></li>
                                <li><a href="memo"><i class="fa fa-angle-right"></i>Mémoire</a></li>
                                
                                
                            </ul>
                            
                        </div> <!-- footer link -->
                    </div>
                    
					
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-address mt-40">
                            <div class="footer-title pb-25">
                                <h6>Nous Contacter</h6>
                            </div>
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <p>Université Virtuelle du Sénégal</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="cont">
                                        <p>774418426</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="cont">
                                        <p>ansou13@gmail.com</p>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- footer address -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer top -->
        
        <div class="footer-copyright pt-10 pb-25">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright text-md-left text-center pt-15">
                            <p><a target="_blank" href="https://www.githup.com/ansou2007">Participer au projet</a> </p>
							
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="copyright text-md-right text-center pt-15">
                           <p>IDA-2021</p>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>
    
    <!--====== FOOTER PART ENDS ======-->
   
    <!--====== BACK TO TP PART START ======-->
    
    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
    
    <!--====== BACK TO TP PART ENDS ======-->
   
    
    
    
    
    
    
    
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
    
    
    
<script>
   /*----------CHARGEMENT--------------*/
$(document).ready(function(){
Liste_memoire();

tester_session();
    $("#rechercher").keyup(function(e){
        e.preventDefault();
        var txt = $(this).val();
            var action = "recherche";
            if(txt != ''){          
            $.ajax({
                    url : "traitement_memo",
                    type : "POST",
                    data : {
                        action :action,
                        sujet :txt,
                        categorie :txt
                    },
                    success:function(data){
                    $('#memoire').html(data);
                    }
                 });
                }else{
                    Liste_memoire();
                }
    })
});

  /* TESTER session*/
  function tester_session(){
      
      $.ajax({
          url: './controllers/control_session.php',
          type: 'POST',
          success:function(data){
              if(data == 'non connecté'){
                  $('#Modal_login').modal('show');
                  
              }else{
                //  $('#btn_connexion').val("Vous etes Connecté !") ;
                  $('#btn_connexion').text("Vous etes Connecté !") ;
              }
          }
      })
      
  }
  /*LISTE MEMOIRE*/
function Liste_memoire(){
	var action = "liste_memoire";
	$.ajax({
		url: "traitement_memo",
		type: "POST",
		data: {action :action},
		success:function(data){
			$('#memoire').html(data);
		}
	});
}
/*----------FIN CHARGEMENT--------------*/

  //INSCRIPTION
			   $("#mail").keyup(function(e){
				   e.preventDefault();
				   var extension = $('#mail').val().split('@').pop().toLowerCase();
				if(jQuery.inArray(extension,['uvs.edu.sn','uadb.edu.sn','ucad.edu.sn']) == -1){
					$('#small_mail').html('<h6 class="alert alert-danger">Adresse mail Invalide</h6>').fadeIn().delay(100).fadeOut();					
                    return false;
                }
				Check_mail();
			   });
			  function Check_mail(){
				  var action = "verifier";	
					var email = $('#mail').val();
					$.ajax({
						url: "traitement_activation.php",
						type: "POST",
						data:{
							action :action,
							email :email 
						},
						success:function(data){
							if(data == "success"){
								$('#small_mail').html('<h6 class="alert alert-success">Adresse mail Valide</h6>').fadeIn().delay(1).fadeOut();
							//$('#small_mail').html(data).fadeIn(500);
							return true;
							}else{
								$('#small_mail').html(data).fadeIn().delay(1).fadeOut();
							}
							
						}
						
					});
				}

			  
			   $('#form_inscription').submit(function(e){
				   e.preventDefault();
				   var extension = $('#mail').val().split('@').pop().toLowerCase();
				   var action = $('#action').val();
				   var nom_complet = $('#nom_complet').val();
				   var mail = $('#mail').val();
				   var telephone = $('#telephone').val();
				   
				   if(nom_complet == '' || mail == '' || telephone == ''){
					   $('#info').html("<h4 class='alert alert-danger'>Tous les champs doivent etre remplies</h4>").fadeIn().delay(500).fadeOut() ;
					  return false;
				   }else if(jQuery.inArray(extension,['uvs.edu.sn','uadb.edu.sn','ucad.edu.sn']) == -1){
					$('#info').html('<h6 class="alert alert-danger">Adresse mail Invalide</h6>').fadeIn().delay(100).fadeOut();					
					return false;
				   }
				   else{
					   $.ajax({
						   url: "traitement_inscription.php",
						   type: "POST",
						   data: {
							   action :action,
							   nom_complet :nom_complet,
							   mail :mail,
							   telephone :telephone
						   },
						   success:function(data){
							$('#info').html(data).fadeIn().delay(500).fadeOut() ;								
								$('#form_inscription')[0].reset();
								return true;
						   }
								
					   });
				   } 
			   });
		 //FIN INSCRIPTION
         /* LIEN CLIQUABLE*/
         function session(){   
             
        $.ajax({
          url: 'controllers/control_session.php',
          type: 'POST',
          success:function(data){
              if(data == 'non connecté'){     
                    $('#Modal_login').modal('show'); 
                    return false;      
              }else{
                  $('#btn_connexion').text("Vous etes Connecté !") ;
                  return true;
              }
          }
          });
         };
        
</script>
</body>

</html>
