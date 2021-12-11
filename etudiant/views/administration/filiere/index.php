<?php
	require_once '../../../Configuration.php';
	include base_app.'/includes/header.php';
	include base_app.'/includes/navbar.php';
	require_once base_app.'/core/connection.php';
	
	if($role=="Super Administrateur" || $role=="Administrateur"){
	 //POUR LA LISTE DEROULANTE DE LA REGION
	$region = $con->prepare('SELECT * FROM region order by nom_region');
	$region->execute();
	//POUR CHARGER LA TABLE DES DEPARTEMENT
	$query = $con->prepare("SELECT departement.id,nom_departement,nom_region FROM departement,region WHERE departement.id_region=region.id order by nom_region,nom_departement");
	$query->execute();
	$departement = $query->fetchAll();
	}else{
		
		exit('<div class="alert alert-danger text-center">Page Non Autorisé</div>');
		
	}
?>

			<!--MODAL-->
			
		
		<div class="modal fade" id="ajout_utilisateur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Département</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="ajout_departement" method="POST">

        <div class="modal-body">

            <div class="form-group">
               <label for="usernames">Région:</label>
                   <select name="region" class="form-control" id="region" onChange="ListeDepartement(this.value);">
						<option value="0">Sélectionner</option>							
						<?php 												
						foreach($region as $region)
						{?>
						<option											
						value="<?php echo  $region['id'] ?>" > 
						<?php echo  $region['nom_region'] ?> 														
						</option>
						<?php }?>												
						</select> 
                        </div>	
			<div class="form-group">
                <label>Département</label>
                <input type="text" name="nom_departement" class="form-control" placeholder="">
            </div>			
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" name="enregistrer" class="btn btn-primary">Enregistrer</button>
        </div>
      </form>

    </div>
  </div>
</div>
		<!--FIN MODAL-->
		
		<!-- Debut Page Contenu -->
        <div class="container-fluid">

          <!-- Nom  Entete -->
          <h1 class="h3 mb-4 text-gray-800">Administration</h1>
        </div>
		<!-- CONTENU--->
		<div class="container-fluid">
		<!-- DataTale -->
		<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajout_utilisateur">
              Ajouter Département
            </button>
			</h6>		
			
  </div>


  <div class="card-body">

    <div class="table-responsive">
			<?php if(isset($_SESSION['ok'])){
					echo '<div class="alert alert-success text-center">'.$_SESSION['ok'].'</div>';							
					} 					
					unset($_SESSION['ok']);
				?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>          
            <th>Région </th>           
			<th>Département</th>
			<th>Editer</th>
			<th>Supprimer</th>
          </tr>
        </thead>
        <tbody> 
			<?php foreach($departement as $departement ){ ?>
          <tr>          
            
			
			<td><?=$departement['nom_region']?> </td>
			<td><?=$departement['nom_departement']?> </td>
             
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id_departement" value="<?=$departement['id']?>">
                    <button  type="submit" name="btn_editer" class="btn btn-success">MODIFIER</button>
                </form>
            </td>
            <td>
                <form action="supprimer_departement" method="post">
                  <input type="hidden" name="id_departement" value="<?=$departement['id']?>">
                  <button type="submit" name="btn_supprimer" onclick="return confirm('Voulez-vous supprimer le departement ?')" class="btn btn-danger">SUPPRIMER</button>
                </form>
            </td>
          </tr>
			<?php }?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>






	<?php
	include base_app.'/includes/footer.php';
	?>

