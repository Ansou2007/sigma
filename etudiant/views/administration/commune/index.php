<?php
	
	require_once '../../../Configuration.php';
	include base_app.'/includes/header.php';
	include base_app.'/includes/navbar.php';
	include base_app.'core/connection.php';
	
	if($role=="Super Administrateur" || $role=="Administrateur"){
			
	//CHARGER LA REGION
	$query = $con->prepare("SELECT * FROM region order by nom_region");
	$query->execute();
	$region = $query->fetchAll();
	
	//CHARGER LA LISTE DES COMMUNES
	$query = $con->prepare("SELECT commune.id,nom_commune,nom_departement,nom_region FROM commune,departement,region WHERE commune.id_departement=departement.id AND departement.id_region=region.id order by nom_region,nom_departement,nom_commune");
	$query->execute();
	$commune = $query->fetchAll();
	}else{
		
		exit('<div class="alert alert-danger text-center">Page Non Autorisé</div>');
		
	}
	
?>
			<script  src="<?php echo base_url?>/views/utilisateur/liste_deroulante.js" ></script>
			<!--MODAL-->
			
		
		<div class="modal fade" id="ajout_commune" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Département</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="ajout_commune" method="POST">

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
            <label for="departement">Département:</label>
            <select name="id_departement" class="form-control" onChange="ListeCommune(this.value);" id="list_depart">
			<option value="0">Sélectionner</option>
			</select>
            </div>
			<div class="form-group">
                <label>Commune</label>
                <input type="text" name="nom_commune" class="form-control" required>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajout_commune">
              Ajouter Commune			  
            </button>
			
			</h6>		
			
  </div>
		

  <div class="card-body">
		
    <div class="table-responsive">
				<?php if(isset($_SESSION['supprime_ok'])){
					echo '<div class="alert alert-success text-center">'.$_SESSION['supprime_ok'].'</div>';							
					} 					
					unset($_SESSION['supprime_ok']);
				?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>          
            <th>Région </th>           
			<th>Département</th>
			<th>Commune</th>
			<th>Editer</th>
			<th>Supprimer</th>
          </tr>
        </thead>
        <tbody>   
		<?php foreach($commune as $commune){ ?>
          <tr>          
            	
			<td><?=$commune['nom_region']?></td>
			<td><?=$commune['nom_departement']?></td>
			<td><?=$commune['nom_commune']?></td>
             
            <td>
			
                <form action="" method="post">
                    <input type="hidden" name="edit_id" value="">
                    <button  type="submit" name="edit_btn" class="btn btn-success">MODIFIER</button>
                </form>
            </td>
            <td>
			<?php
				if($role=="Administrateur" || $role=="Operateur"){
					echo '<div class="alert alert-danger text-center">Pas autorisé</div>';				
				}else{
					echo  '<form action="supprimer_commune" method="post">'
                  .'<input type="hidden" name="id_commune" value='.$commune['id'].'>'
                  .'<button type="submit" name="supprimer" onclick="return confirm("Voulez-vous supprimer la cellule ?")" class="btn btn-danger">SUPPRIMER</button>'
                .'</form>';
				};
                
            ?>
                
            </td>
          </tr>
		<?php } ?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>






	<?php
	include base_app.'/includes/footer.php';
	?>

