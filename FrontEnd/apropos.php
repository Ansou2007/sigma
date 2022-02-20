<?php
	require_once('../core/connection.php');
	
	$requete = $con->prepare('SELECT * FROM temoignage');
	$requete->execute();
	$temoignage = $requete->fetchAll();
	
	//print_r($temoignage);

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
   
   <!--====== DEBUT CHARGEMENT SPLASH SCREEN ======-->
    
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
    
    <!--====== FIN CHARGEMENT SPLASH SCREEN ======-->
   
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
                                        <a class="active" href="apropos">A propos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="memo">Mémoire</a>
                                        
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a href="">Contact</a>
                                        
                                    </li>
                                </ul>
                            </div>
                        </nav> <!-- nav -->
                    </div>
                    <div class="col-lg-1 col-md-2 col-sm-3 col-3">
                        <div class="right-icon text-right">
                            <ul>
                                
                                <li><a href="#"><i class="fa fa-user"></i></a></li>
                            </ul>
                        </div> <!-- right icon -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
    </header>
    
    <!--====== FIN MENU ======-->
   
   
   
    <!--====== DEBUT HISTORIQUE ======-->
    
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(include/images/inscription/inscription1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>A Propos</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">A propos</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== FIN HISTORIQUE ======-->
    
    <!--====== DEBUT APROPOS ======-->
    
    <section id="about-page" class="pt-70 pb-110" style="background-image:url(includes/images/equipe/equipe.png);background-repeat:no-repeat">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mt-50">
                        <h5>Apropos</h5>
                        <h2>Bienvenu Chez SIGMA </h2>
                    </div> <!-- section title -->
                    <div class="about-cont">
                        <p style="color:black;font-size:20px">Le systéme intégré
						de gestion des memoires académique est une plateforme numerique pour la 
						gestion et l'informatisation des mémoires académiques. A travers la plateforme chaque étudiant pourra garder et partager son mémoire de fin d'etude  . 
						 <br> <br> 
						</p>
                    </div>
                </div> <!-- about cont -->
                <div class="col-lg-7">
                    <div class="about-image mt-50">
                        <img src="include/images/inscription/inscription1.jpg" alt="apropos">
                    </div>  <!-- about imag -->
                </div> 
            </div> <!-- row -->
            <div class="about-items pt-60">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="about-singel-items mt-30">
                            <span>01</span>
                            <h4>Pourquoi nous ?</h4>
                            <p>Nous sommes une equipe dynamique au service de la communauté</p>
                        </div> <!-- about singel -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="about-singel-items mt-30">
                            <span>02</span>
                            <h4>Notre Mission</h4>
                            <p>Notre mission s'inscrit dans le but d'informatiser tous les mémoires académique</p>
                        </div> <!-- about singel -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-10">
                        <div class="about-singel-items mt-30">
                            <span>03</span>
                            <h4>Notre vission</h4>
                            <p>Nous projetons de faire un libre accés à tous les mémoires des universités publiques
							et privées du Sénégal</p>
                        </div> <!-- about singel -->
                    </div>
                </div> <!-- row -->
            </div> <!-- about items -->
        </div> <!-- container -->
    </section>
    
    <!--====== FIN APROPOS ======-->
    
   
    
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
                            <form action="#">
                                <div class="singel-form">
                                    <input type="text" placeholder="Votre Nom Complet">
                                </div>
                                <div class="singel-form">
                                    <input type="email" placeholder="Votre  Mail institutionnel">
                                </div>
                                <div class="singel-form">
                                    <input type="text" placeholder="téléphone">
                                </div>
                                <div class="singel-form">
                                    <button class="main-btn" type="button">Valider</button>
                                </div>
                            </form>
                        </div>
                    </div> <!-- category form -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== FIN INSCRIPTION ======-->
    
    
    <!--====== DEBUT  TEMOIGNAGE ======-->
    
    <section id="testimonial" class="bg_cover pt-115 pb-120" data-overlay="8" style="background-image: url(include/images/temoignage/nous.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-40">
                        <h5>Témoignage</h5>
                        <h2>Ce qu'ils pensent de nous</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
			
            <div class="row testimonial-slied mt-40">
			<?php foreach($temoignage as $temoignage){?>
                <div class="col-lg-6">
                    <div class="singel-testimonial">
                        <div class="testimonial-thum">
                            <img src="images/testimonial/t-1.jpg" alt="">
                            <div class="quote">
                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
						
                        <div class="testimonial-cont">
                            <p><?=$temoignage['libelle']?></p>
                            <h6><?=$temoignage['id']?></h6>                           
                        </div>
						
                    </div> <!-- singel testimonial -->
                </div>               
               <?php }?>
            </div> <!-- temoignage slide -->
			
        </div> <!-- container -->
    </section>
    
    <!--====== FIN TEMOIGNAGES ======-->
   
    
   
    <!--====== DEBUT LOGO PARTENAIRE ======-->
    
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
    
    <!--====== FIN LOGO PARTENAIRE ======-->
   
    <!--====== DEBUT PIED DE PAGE ======-->
    
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
                                <li><a href="#"><i class="fa fa-angle-right"></i>Mémoire</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Contact</a></li>
                                
                            </ul>
                            
                        </div> <!-- Pied de page  lien -->
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
                                        <p>ansoumanemichel.tamba@uvs.edu.sn</p>
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
    
    <!--====== FIN PIED DE PAGE ======-->
   
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
    
    <!--====== Map js ======-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <script src="include/js/map-script.js"></script>

</body>

</html>
