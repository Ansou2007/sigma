<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Admin - Gestion Etat Civil</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="include/css/bootstrap.min.css" rel="stylesheet">
<link href="include/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="include/css/font-awesome.css" rel="stylesheet">
<link href="include/css/style.css" rel="stylesheet">
<link href="include/css/pages/dashboard.css" rel="stylesheet">

</head>
<body>

<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html">Gestion  Etat Civil </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Mon Compte <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Paramétre</a></li>
			  <li><a href="#">Activité</a></li>
              <li><a href="#">Aide</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> Ansoumane Michel<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Profil</a></li>
              <li><a href="#">Déconnexion</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
        </form>
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
        <li class="active"><a href="admin"><i class="icon-dashboard"></i><span>Accueil</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list-alt"></i><span>ETAT CIVIL</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Déclarer Naissance</a></li>
            <li><a href="#">Déclarer Décés</a></li>
			<li><a href="#">Déclarer Mariage</a></li>
            <li><a href="#">Registre Naissance</a></li>
            <li><a href="#">Registre Décés</a></li>
			<li><a href="#">Registre Mariage</a></li>
			<li><a href="#">Naissance</a></li>
            <li><a href="#">Impression Décés</a></li>
			<li><a href="#">Impression Mariage</a></li>			
			<li><a href="#">Résidence</a></li>
            <li><a href="#">Certificat</a></li>
          </ul>
        </li>
				
        <li><a href="statistique"><i class="icon-bar-chart"></i><span>STATISTIQUE</span> </a> </li>
		<li><a href="utilisateur"><i class="icon-group"></i><span>UTILISATEUR</span> </a> </li>
		<li><a href="annee"><i class="icon-calendar"></i><span>ANNEE REGISTRE</span> </a> </li>
		<li><a href="officier"><i class="icon-user"></i><span>OFFICIER</span> </a> </li>
		<li><a href="parametre"><i class="icon-wrench"></i><span>PARAMETRE</span> </a> </li>
		<li><a href="contact"><i class="icon-phone-sign"></i><span>CONTACT</span> </a> </li>
		<li><a href="journal"><i class="icon-eye-open"></i><span>JOURNAL</span> </a> </li>
        
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->

  
   
    
    
<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; <?php echo date('Y');?> <a href="#">Community Tech Up</a>. </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>


<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="include/js/jquery-1.7.2.min.js"></script> 
<script src="include/js/excanvas.min.js"></script> 
<script src="include/js/chart.min.js" type="text/javascript"></script> 
<script src="include/js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="include/js/full-calendar/fullcalendar.min.js"></script>
 
<script src="include/js/base.js"></script> 


</body>
</html>
