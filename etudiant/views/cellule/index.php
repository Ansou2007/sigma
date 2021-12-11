<?php
	require_once '../../Configuration.php';
	include base_app.'/includes/header.php';
	include base_app.'/includes/navbar.php';
	include base_app.'core/connection.php';
	
	if($groupe=="Departement"){
		
	$query = $con->prepare("SELECT * FROM cellule,commune,departement WHERE cellule.id_commune=commune.id AND commune.id_departement=departement.id AND id_departement='$id_departement' order by nom_cellule");
	$query->execute();
	$cellule = $query->fetchAll();
	}elseif($groupe=="Region")
	{	
	$query = $con->prepare("SELECT * FROM cellule,commune,departement,region WHERE cellule.id_commune=commune.id AND commune.id_departement=departement.id AND departement.id_region=region.id AND id_region='$id_region' order by nom_cellule");
	$query->execute();
	$cellule = $query->fetchAll();
	}else{
		
		$query = $con->prepare("SELECT cellule.id,nom_cellule,nom_commune FROM cellule,commune WHERE cellule.id_commune=commune.id AND id_commune='$id_commune' order by nom_cellule");
		$query->execute();
		$cellule = $query->fetchAll();
	}
	
?>

			<!--MODAL-->
			
		
		<div class="modal fade" id="ajout_cellule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cellule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="ajout_cellule" method="POST">

        <div class="modal-body">
				<input type="hidden" name="id_commune" value="<?php echo $id_commune ?>">
            <div class="form-group">
                <label> Nom Cellule </label>
                <input type="text" name="nom_cellule" class="form-control" required>
            </div>
			<div class="form-group">
                <label> Commune </label>
                <input type="text" name="nom_commune" value="<?php echo $commune ?>" class="form-control" disabled >
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
          <h1 class="h3 mb-4 text-gray-800">Cellule</h1>
        </div>
		<!-- CONTENU--->
		<div class="container-fluid">
		<!-- DataTale -->
		<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajout_cellule">
              Ajouter Cellule
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">
		<?php 
		if(isset($_SESSION['erreur'])){
		echo $_SESSION['erreur'];							
		unset($_SESSION['erreur']);
		}elseif(isset($_SESSION['supprime_ok'])){
			echo '<div class="alert alert-success text-center">'.$_SESSION['supprime_ok'].'</div>';	
			unset($_SESSION['supprime_ok']);	
		} 					
		
		?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>          
            <th>Cellule </th>
            <th>Commune </th>  
			<th><?php if($groupe=="Departement" || $groupe=="Region" || $role=="Super Administrateur"){ 
				echo "Département";
			}						
			?>			
			</th>
			<th>
			<?php if($groupe=="Region" || $role=="Super Administrateur"){ 
				echo "Région";
			}						
			?>			
			</th> 
            <th width="15%">Modifier </th>
            <th width="15%">Supprimer </th>
          </tr>
        </thead>
        <tbody>   
			<?php foreach($cellule as $cellule ){ ?>
          <tr>          
            <td class="text-center"><?=$cellule['nom_cellule']?></td>
            <td class="text-center"><?=$cellule['nom_commune']?></td>
			<td><?php if($groupe=="Departement" || $groupe=="Region" ){ 
				echo $cellule['nom_departement'];
			}						
			?>			
			</td>
            <td><?php if($groupe=="Region" ){
				echo $cellule['nom_region'];
			}			
			?>
			</td> 			
            <td>
			<?php
			
			if($groupe==null || $role=="Super Administrateur"){
					
					echo '<form action="" method="post">'
                    .'<input type="hidden" name="edit_id" value='.$cellule['id'].'>'
                    .'<button  type="submit" name="edit_btn" class="btn btn-success">MODIFIER</button>'
                .'</form>';
				
				}else{
					echo '<div class="alert alert-danger text-center">Pas autorisé</div>';
				};
			
            ?>
			</td>
            <td>
			<?php
			
				if($groupe==null || $role=="Super Administrateur"){
					
					echo  '<form action="supprimer_cellule" method="post">'
                  .'<input type="hidden" name="id_cellule" value='.$cellule['id'].'>'
                  .'<button type="submit" name="btn_supprimer" onclick="return confirm("Voulez-vous supprimer la cellule ?")" class="btn btn-danger">SUPPRIMER</button>'
                .'</form>';	
				}else{
					echo '<div class="alert alert-danger text-center">Pas autorisé</div>';
				};
                
            ?>
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

