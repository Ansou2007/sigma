<?php

      
		require_once '../../Configuration.php';
	    require_once base_app.'/core/connection.php';
		include base_app.'includes/header.php';
         
		 //POUR LA LISTE DEROULANTE DE LA REGION
	$pole = $con->prepare('SELECT * FROM pole order by code');
	$pole->execute();
		//VERIFICATION DE LA CASE NOM COMPLET
	/*if(!empty($_POST['nom_complet'])){
		$nom_complet = $_POST['nom_complet'];
		if(strlen($nom_complet) < 5  || strlen($nom_complet) > 45){
			echo '<br/>Le nom complet est compris entre 5 à 45 caractéres';
			exit();
		} 
		if(is_numeric($nom_complet[0])){
			echo '<br/>Le  premiers caractéres doit etre une lettre';
			exit();
		}
	}*/
		
            //CHARGEMENT
           if($_POST){
            if(isset($_POST['envoyer'])){ 

          $pole = $_POST['pole'];  
          $filiere = $_POST['filiere'];    
          $cohorte = $_POST['cohorte'];  
          $nom_complet = strip_tags($_POST['nom_complet']) ;              
          $motdepass = password_hash($_POST['motdepass1'],PASSWORD_DEFAULT);
          $telephone = $_POST['telephone'];
          $email=strtolower(filter_var($_POST['email'],FILTER_SANITIZE_EMAIL));
		  $mail_uvs = strstr($email,'@uvs.edu.sn');
          //LISTE DES UTILISATEURS
		
        $query = $con->prepare("SELECT email,telephone FROM utilisateur WHERE  email=? OR telephone=? ");
        $query->execute(array($email,$telephone));
        $resultat = $query->fetchAll();
      
                //CONDITION
        if($_POST['motdepass1'] != $_POST['motdepass2']){
                    $message= '<div class="alert alert-danger text-center">' .'Mot de passe non identique'.'</div>';
				header('refresh:2,url=creer_compte');	
         }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $message= '<div class="alert alert-danger text-center">' .'Mail invalide'.'</div>';
            header('refresh:2,url=creer_compte');
        }elseif(empty($mail_uvs)){
            $message= '<div class="alert alert-danger text-center">' .'Seuls les adresses mail institutionnels sont autorisé '.'</div>';
			header('refresh:5,url=creer_compte');
        }elseif(!preg_match("#^\+?[0-9\./, -]{9}$#",trim($telephone))){
            $message= '<div class="alert alert-danger text-center">' .'Numero de télephone invalide'.'</div>';
			header('refresh:2,url=creer_compte');
        }elseif($resultat){
            $message ='<div class="alert alert-danger text-center">' .'email ou Télephone existant'.'</div>';
			header('refresh:2,url=creer_compte');
		}elseif($_POST['pole']== 0 ){
			 $message ='<div class="alert alert-danger text-center">' .'Le pole est Obligatoire'.'</div>';
			header('refresh:2,url=creer_compte');
		}elseif($_POST['filiere'] == 0 ){
			 $message ='<div class="alert alert-danger text-center">' .'La filiere est Obligatoire'.'</div>';
		header('refresh:2,url=creer_compte');
		}elseif($_POST['cohorte'] == 0 ){
			 $message ='<div class="alert alert-danger text-center">' .'La cohorte est Obligatoire'.'</div>';
			header('refresh:2,url=creer_compte');
		}else{
           
          $query = $con->prepare("INSERT INTO utilisateur(id_pole,id_filiere,id_cohorte,nom_complet,email,motdepass,telephone) VALUES(?,?,?,?,?,?,?)");
			$query->execute(array($pole,$filiere,$cohorte,$nom_complet,$email,$motdepass,$telephone));

       $message= '<div class="alert alert-success text-center">' .'Inscription réussie ! <br> Un Mail vous sera envoyé pour une confirmation du compte'.'</div>';
      header('refresh:3,url="index.php"');
        
             }   
       
    
    }
    }
	
?>		
		 
		  
   	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mt-5 py-3 m-auto">
				<div class="card bg-light ">					
					<div class="card-title">
					<h2 class="text-center">INSCRIPTION</h2>
					<hr>
					</div>
							<?php
							if(isset($message)){
								echo $message;
							}
							?>
					<div id="status"></div>
					<div class="card-body">
						<form class="form" method="post" action="" >
											
                          <label for="nom">Nom Complet:</label>
                        <input type="text" id="nom_complet" name="nom_complet" class="form-control py-2 mb-2" autocomplete="off"  required >
						<small id="out_nom"></small>
						<label for="email">Adresse Mail:</label>
                        <input type="email" name="email" class="form-control py-2 mb-2" required autocomplete="off">
                        <label for="mdp">Mot de Pass:</label>
                        <input type="password" id="motdepass1" name="motdepass1" class="form-control py-2 mb-2" required>
						<small id="out_motdepass1"></small>                                           
                        <label for="confirmation">Confirmation:</label>
                        <input type="password" id="motdepass2" name="motdepass2" class="form-control py-2 mb-2" required >
						<small id="out_motdepass2"></small>                                          											
                        <label for="pole">Pole:</label>
                        <select name="pole" class="form-control py-2 mb-2" id="pole" onChange="ListeFiliere(this.value);">
						<option value="0">Sélectionner</option>
												
						<?php 
						foreach($pole as $pole)
						{?>
						<option style="color:black;"											
						value="<?php echo  $pole['id'] ?>" > 
						<?php echo  $pole['code'] ?> 														
						</option>
						<?php }?>												
						</select>   											
                        <label for="filiere">Filiére:</label>
                        <select name="filiere" class="form-control py-2 mb-2" onChange="ListeCohorte(this.value);" id="list_filiere">
						<option value="0">Sélectionner</option>												
						</select>										
                        <label for="cohorte">Cohorte:</label>
                        <select name="cohorte" class="form-control py-2 mb-2" id="list_cohorte" >
						<option value="0">Sélectionner</select>
						</select>
                        <label for="telephone">Téléphone:</label>
                        <input type="telephone" id="telephone" name="telephone" required class="form-control py-2 mb-2" autocomplete="off" >
						<small id="out_telephone"></small>
                        <button type="submit" name="envoyer" class="btn btn-success btn-block">Envoyer</button>
                        </form>
						<a href="index" class="btn btn-danger btn-block">Annuler</a>
					
					</div>
				</div>
			
			</div>		
		</div>
	</div>
	
			<?php
			include base_app.'/includes/footer.php';
			?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script >
		  	
			function ListeFiliere(val) {
			$.ajax({
			type: "POST",
			url: "liste_filiere.php",
			data:'id_pole='+val,
			success: function(data){
				$("#list_filiere").html(data);
			}
			});
		}	
		  function ListeCohorte(val) {
			$.ajax({
			type: "POST",
			url: "liste_cohorte.php",
			data:'id_filiere='+val,
			success: function(data){
				$("#list_cohorte").html(data);
			}
			});
		}
		
	  
		  </script>

</body>
</html>