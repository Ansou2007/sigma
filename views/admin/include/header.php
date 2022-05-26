<?php
		require_once base_app.'views/utilisateur/session.php';		
		$id_utilisateur = $_SESSION['utilisateur']['id'];		
		$nom_complet = $_SESSION['utilisateur']['nom_complet'];
		$mail = $_SESSION['utilisateur']['email'];
		$role = $_SESSION['utilisateur']['role'];		
		
		

		
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8"/>
<title>Gestion Des Mémoires</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="<?php echo base_url?>include2/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url?>include2/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="<?php echo base_url?>include2/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url?>include2/css/style.css" rel="stylesheet">
<link href="<?php echo base_url?>include2/css/pages/plans.css" rel="stylesheet"> 
<link href="<?php echo base_url?>include2/css/pages/dashboard.css" rel="stylesheet">
<script src="<?php echo base_url?>views/admin/include/js/jquery-1.7.2.min.js"></script> 


</head>
<body>

<div class="navbar navbar-fixed-top ">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="<?php echo base_url?>index">SIGMA</a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Mon Compte <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="">Paramétre</a></li>
			  <li><a href="">Activité</a></li>
              <li><a href="">Aide</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> <?php echo strtoupper($nom_complet)?><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url?>admin_profil">Profil</a></li>
              <li><a href="<?php echo base_url?>deconnexion">Déconnexion</a></li>
            </ul>
          </li>
        </ul>       
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class=""><a href="<?php echo base_url?>admin"><i class="icon-dashboard"></i><span>Accueil</span> </a> </li>
        <li class=""><a href="<?php echo base_url?>liste_memoire" > <i class="icon-list-alt"></i><span>Mémoire</span> <b class="caret"></b></a>         
        </li>
		<li class=""><a href="<?php echo base_url?>liste_temoignage" > <i class="icon-book"></i><span>Témoignage</span> <b class="caret"></b></a></li>       		
		<li><a href="<?php echo base_url?>liste_message"><i class="icon-envelope"></i><span>Message</span> </a> </li>       
        <li class=""><a href="<?php echo base_url?>liste_activite" > <i class="icon-long-arrow-down"></i><span>Activité</span> <b class="caret"></b></a>
        <li class=""><a href="<?php echo base_url?>categorie" > <i class="icon-inbox"></i><span>Catégorie</span> <b class="caret"></b></a>
        <li class=""><a href="<?php echo base_url?>filiere" > <i class="icon-hdd"></i><span>Filiére</span> <b class="caret"></b></a>
        <li class=""><a href="<?php echo base_url?>liste_utilisateur" > <i class="icon-user"></i><span>Utilisateur</span> <b class="caret"></b></a>
          
        </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->