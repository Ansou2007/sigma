<?php
	require_once '../../Configuration.php';
	include base_app.'/includes/header.php';
	include base_app.'/includes/navbar.php';
	include base_app.'core/connection.php';
	
	if($role=="Super Administrateur" || $role=="Administrateur"){
		
		$query = $con->prepare('SELECT * FROM utilisateur');		
		$query->execute();
		$utilisateur = $query->fetchAll();
	}else{
		
		exit('<div class="alert alert-danger text-center">Page Non Autorisé</div>');
		
	}
?>

			<!--MODAL-->
			
		
		<div class="modal fade" id="ajout_utilisateur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Utilisateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="ajout_cellule.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Nom Complet </label>
                <input type="text" name="nom_cellule" class="form-control" >
            </div>
			<div class="form-group">
                <label> Login </label>
                <input type="text" name="login" value="" class="form-control" >
            </div>
			<div class="form-group">
                <label> Mot de Passe </label>
                <input type="password" name="motdepass" value="" class="form-control" >
            </div>
			<div class="form-group">
                <label> Confirmation Mot de passe </label>
                <input type="password" name="motdepass1" value="" class="form-control" >
            </div>
			<div class="form-group">
                <label> Téléphone </label>
                <input type="text" name="telephone" value="" class="form-control" >
            </div>
			<div class="form-group">
                <label> Email </label>
                <input type="text" name="email" value="" class="form-control" >
            </div>
			<div class="form-group">
                <label> Role </label>
                <input type="text" name="role" value="" class="form-control" >
            </div>
      
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Enregistrer</button>
        </div>
      </form>

    </div>
  </div>
</div>
		<!--FIN MODAL-->
		
		<!-- Debut Page Contenu -->
        <div class="container-fluid">

          <!-- Nom  Entete -->
          <h1 class="h3 mb-4 text-gray-800">Utilisateur</h1>
        </div>
		<!-- CONTENU--->
		<div class="container-fluid">
		<!-- DataTale -->
		<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajout_utilisateur">
              Ajouter Utilisateur
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>          
            <th>Nom Complet </th>
            <th>Login </th>          
            <th>Télephone </th>
            <th>Email</th>
			<th>Role</th>
			<th>Etat Compte </th>
			<th>Commune</th>
			<th>Département</th>
			<th>Région</th>
			<th>Editer</th>
			<th>Supprimer</th>
          </tr>
        </thead>
        <tbody>   
		<?php foreach($utilisateur as $utilisateur){?>
          <tr>          
            <td><?=$utilisateur['nom_complet']?></td>
            <td><?=$utilisateur['login']?></td>
			<td><?=$utilisateur['telephone']?></td>
            <td><?=$utilisateur['email']?></td> 
			<td><?=$utilisateur['role']?></td>
            <td><?php if($utilisateur['etat']==1){
					echo '<div class="alert alert-success text-center">Activé</div>';
			}else{
				echo '<div class="alert alert-danger text-center">Désactivé</div>';
			}
				?>
			</td> 
			<td><?=$utilisateur['groupe']?></td>
            <td></td> 
			<td> </td>
             
            <td>
                <form action="" method="post">
                    <input type="hidden" name="edit_id" value="">
                    <button  type="submit" name="edit_btn" class="btn btn-success">MODIFIER</button>
                </form>
            </td>
            <td>
                <form action="supprimer_utilisateur" method="post">
                  <input type="hidden" name="id_utilisateur" value="<?=$utilisateur['id']?>">
                  <button type="submit" name="supprimer" class="btn btn-danger">SUPPRIMER</button>
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

