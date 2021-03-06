
<?php
	session_start();
	require_once 'core/connection.php';
	include('controllers/journal.php');
	/*
	if(empty($_SESSION['time']) && empty($_SESSION['utilisateur'])){
		session_destroy();
		header('location:login.php');
	}else{
		header('location:accueil');
	}
*/
	if(isset($_POST['connexion'])){
		$mail = strip_tags(trim($_POST['mail']));
		$motdepass = strip_tags($_POST['motdepasse']);
		$query=$con->prepare('SELECT * FROM utilisateur WHERE email=?  ');
		$query->execute(array($mail));
		$utilisateur=$query->fetch();
		if(!password_verify($motdepass,$utilisateur['mot_pass']))
		$erreur = "Login ou Mot de passe incorrecte";
		
		else{
			if($utilisateur['etat']==="0" )
			{
				$erreur = "Votre compte n'est pas activé,Contacter l'administrateur";
				
			}else{	
		
			header('location:accueil');
			$_SESSION['utilisateur'] = $utilisateur;
			$_SESSION['time'] = time();
			//$_SESSION['connexion'] = true;
			$id = $_SESSION['utilisateur']['id'];
			notification($id,"access au portail");
			
			
			}
		}
		
	
	}
?>

<!DOCTYPE html>
<html lang="fr">
  
<head>
    <meta charset="utf-8">
    <title>Gestion Mémoire Académique</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="include/login/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="include/login/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="include/login/css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="include/login/css/style.css" rel="stylesheet" type="text/css">
<link href="include/login/css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="#">
				Systéme d'Information Pour la Gestion des Mémoires Académique				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">					
					<li class="btn btn-danger">						
						<a href="index.php" class="">
							Page Accueil
						</a>						
					</li>					
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<div class="account-container">
	
	<div class="content clearfix">
		
		<form  method="post">
		
			<h1 class="alert alert-success">Authentification</h1>		
			
			<div class="login-fields">
				
				<p>Veuillez renseigner les informations</p>
				
				<div class="field">
					<label for="mail">Email</label>
					<input type="text" id="mail" name="mail" value="" placeholder="Votre mail" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="motdepasse">Mot de Passe:</label>
					<input type="password" id="motdepasse" name="motdepasse" value="" placeholder="Mot de passe" class="login password-field"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<span class="login-checkbox">
					<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Se rappeler de moi</label>
				</span>
								
				<button type="submit" name="connexion" class="button btn btn-success btn-large">Connexion</button>				
			</div> <!-- .actions -->
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->

<div class="login-extra">
	<a href="#">Mot de Passe oublié ?</a>
</div> <!-- /login-extra -->


<script src="include/login/js/jquery-1.7.2.min.js"></script>
<script src="include/login/js/bootstrap.js"></script>

<script src="include/login/js/signin.js"></script>
<script>
$(document).ready(function(){
	//e.preventDefault();
	//alert('coucou');
	tester_session();
});
   
  
  function tester_session(){
	  $.ajax({
		  url: './controllers/redirect_session.php',
		  type: 'POST',
		  success:function(data){
			  if(data == 'non connecté'){
				 // window.location.href="login";
				  //alert('veuillez vous connecté');
				  exit();
			  }else{
				window.location.href="accueil";
				//alert(' connecté');

			  }
		  }
	  });
	  
  }
/*
  setInterval(function() {
	tester_session();
  }, 10000); //10000= 10 secondes
  */
</script>
</body>

</html>
