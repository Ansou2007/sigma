<?php

require_once 'Configuration.php';
require_once('core/connection.php');
include('includes/header.php'); 
session_start();

		@$mail = strip_tags(trim($_POST['mail']));
		@$motdepass = strip_tags($_POST['mot_de_passe']);
		
	
	if(isset($_POST["valider"])){
		$query=$con->prepare('select * from utilisateur,pole,filiere,cohorte where email=? and utilisateur.id_cohorte=cohorte.id and utilisateur.id_filiere=filiere.id ');
		
		$query->bindValue(1,$mail);
		$query->execute();
		$utilisateur=$query->fetch();
		if(!password_verify($motdepass,$utilisateur['motdepass']))
		$erreur = "Login ou Mot de passe incorrecte";
		
		else{
			if($utilisateur['etat']==="0" )
			{
				$erreur = "Votre compte n'est pas activé,Contacter l'administrateur sur 774418426";
			}else{			
			header('location:accueil');
			$_SESSION['utilisateur'] = $utilisateur;
			$_SESSION['time'] = time();
			}
		}
	}
?>




<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
			
          <div class="col-lg-12">
		  
            <div class="p-5">
              <div class="text-center">
					 <?php
			
                    if(isset($erreur)) 
                    {
                        echo '<h5 class="bg-danger text-white"> '.$erreur.' </h5>';
							header('refresh:3,url=index');
                        $erreur = null;
                    }
					
                ?>
			  
                <h1 class="h4 text-gray-900 mb-4">SYSTEME D'AUTHENTIFICATION</h1>
               
              </div>

                <form class="user" action="" method="POST">

                    <div class="form-group">
                    <input type="email" name="mail" class="form-control form-control-user" placeholder="Votre email..">
                    </div>
                    <div class="form-group">
                    <input type="password" name="mot_de_passe" class="form-control form-control-user" placeholder="Votre Mot de passe">
                    </div>
            
                    <button type="submit" name="valider" class="btn btn-success btn-user btn-block"> Connecter </button>
                    <hr>
                </form>
					<a class="btn btn-primary btn-block" href="creer_compte">Créer un Compte</a>
					
            </div>
          </div>
        </div>
      </div>
	  <div class="card-footer">
	  <input type="checkbox" name="souvenir"> <span>Se souvenir </span>
	  <a class="float-right" href="recuperation">Mot de passe Oublié ?</a>
	  <b><p class="text-center" style="color:black">Copyright &copy; Ansoumane Michel TAMBA-<?php echo date('Y')?>
	  
	  </div>
    </div>

  </div>

</div>

</div>


<?php
//include('includes/scripts.php'); 
?>