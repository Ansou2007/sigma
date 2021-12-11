

<?php
	require_once '../../Configuration.php';
	require_once base_app.'/core/connection.php';
	include base_app.'/includes/header.php';
	include base_app.'/includes/navbar.php';
	
		//CHARGEMENT  DE LA LISTE DES CELLULES
		$query = $con->prepare("SELECT cellule.id,id_commune,nom_cellule FROM cellule,commune WHERE cellule.id_commune=commune.id AND id_commune='$id_commune' order by nom_cellule");
		$query->execute();
		$cellule = $query->fetchAll();
		
		//POUR CHARGER LA TABLE DES MILITANTS
	$query = $con->prepare("SELECT * FROM militant,cellule,commune WHERE militant.id_cellule=cellule.id AND cellule.id_commune=commune.id AND id_commune='$id_commune'");
	$query->execute();
	$militant = $query->fetchAll()
?>

			<!--MODAL-->
			
		
		<div class="modal fade" id="ajout_militant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Militant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="ajout_militant" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Nom Complet </label>
                <input type="text" name="nom_complet" class="form-control" required>
            </div>
			<div class="form-group">
                <label> Nom Cellule </label>
                <select class="form-control" name="id_cellule">
				<option value="0">Sélectionner</option>
				<?php 												
				foreach($cellule as $cellule)
				{?>
				<option											
				value="<?php echo  $cellule['id'] ?>" > 
				<?php echo  $cellule['nom_cellule'] ?> 														
				</option>
						<?php }?>
				</select>
            </div>
			<div class="form-group">
                <label> Date Naissance </label>
                <input type="date" name="date_naissance" class="form-control" required>
            </div>
			<div class="form-group">
                <label> Lieu Naissance </label>
                <input type="text" name="lieu_naissance" class="form-control" required >
            </div>
			<div class="form-group">
                <label> Télephone </label>
                <input type="text" name="telephone" class="form-control" required>
            </div>
			<div class="form-group">
                <label> Cin </label>
                <input type="text" name="cin" class="form-control" required>
            </div>
			<div class="form-group">
                <label> Numero d'electeur </label>
                <input type="text" name="numero_electeur" class="form-control" >
            </div>
			<div class="form-group">
                <label> Lieu de Vote </label>
                <input type="text" name="lieu_vote" class="form-control">
            </div>
			<div class="form-group">
                <label> N° Carte Membre </label>
                <input type="text" name="numero_carte" class="form-control">
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
        
		<!-- CONTENU--->
		
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Militant</h1>

        </div>
        <!-- CONTENU--->
		<div class="container-fluid">
		<!-- DataTale -->
		<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajout_militant">
              Ajouter Militant
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
				<?php if(isset($_SESSION['erreur'])){
					echo '<div class="alert alert-danger text-center">'.$_SESSION['erreur'].'</div>';							
					} 					
					unset($_SESSION['erreur']);
				?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>          
            <th>Nom Complet </th>
            <th>Cellule </th>          
            <th>Date Naissance </th>
			<th>Lieu Naissance</th>
			<th>Telephone</th>
			<th>NIN</th>
			<th>N°D'electeur</th>
			<th>Lieu Vote</th>
			<th>Numéro Carte</th>
            <th width="5%">Editer </th>
			<th width="5%">Supprimer </th>
          </tr>
        </thead>
        <tbody>   
		<?php foreach($militant as $militant ){ ?>
          <tr>          
            <td><?=$militant['nom_complet']?></td>
            <td><?=$militant['nom_cellule']?></td>  
			<td><?=$militant['date_naissance']?></td>
            <td><?=$militant['lieu_naissance']?></td> 
			<td><?=$militant['telephone']?></td>
			<td><?=$militant['cin']?></td>
			<td><?=$militant['numero_electeur']?></td>
            <td><?=$militant['lieu_vote']?></td> 
			<td><?=$militant['numero_carte']?></td> 			
            <td>
                <?php
				if($groupe==null || $role=="Super Administrateur"){					
				echo '<form action="" method="post">'
                    .'<input type="hidden" name="edit_id" value='.$militant['id'].'>'
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
								  .'<input type="hidden" name="id_cellule" value='.$militant['id'].'>'
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

