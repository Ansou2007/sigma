<?php
require_once('../../configuration.php');
require_once base_app.'/core/connection.php';
include base_app.'/include2/header.php';

	$requete = $con->prepare("SELECT * FROM memoire");
	$requete->execute();
	$memoire = $requete->fetchAll();
	//print_r($memoire);
	$requet = $con->prepare("SELECT nom_categorie FROM categorie");
	$requet->execute();
	$categorie = $requet->fetchAll();
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
	  <div class="span12">
	  <div class="widget">
	  <div class="widget-content">	

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#memoire">Ajouter Mémoire</button>
<br>
</br>
	
<!--MODAL-->		
	<div class="modal hide fade" tabindex="-1" id="memoire"  role="dialog"  aria-hidden="true">
	<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	  <div id="alerte"></div>
        <h5 class="modal-title">Mémoire</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <!--FORM AJOUT DECLARATION-->
      <form action="traitement_memoire" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
		<input type="hidden" name="id_utilisateur" id="id_utilisateur" value="1">     
        
         <div class="form-group">
		 <label>Catégorie:</label>            
         <select name="categorie" id="categorie" class="form-control" >
		  <option disabled selected>Choisir</option>
			<?php foreach($categorie as $categorie){ ?>
			<option 
				value="<?=$categorie['nom_categorie']?>"><?php echo $categorie['nom_categorie']?>
			</option>
			<?php }?>
		 </select>
         </div> 
		 <div class="form-group">
			<label>Sujet</label>
			<textarea name="sujet" id="sujet" class="form-control" required></textarea>
		 </div>
		 <div class="control-group ">
		<label>Etes-vous l'auteur du mémoire ? (Oui ou Non)</label>			
		<input class="form-control auteur_document" value="oui" name="auteur_document" type="radio" checked  />
		<span>Oui</span>						  
		<input class="form-control auteur_document" value="non" name="auteur_document" type="radio"  />
		<span>Non</span>								    
		</div>
		
		 <div class="form-group ">
			<label>Auteur:</label>
			<textarea name="auteur" id="auteur" class="form-control"></textarea>
		 
		 </div>
		 <div class="form-group ">
			<label>Mots Clés:</label>
			<textarea name="mots_cles" id="mots_cles" class="form-control"></textarea>
		 </div>
		 <div class="form-group ">
			<label>Document:</label>
			<input type="file" name="document" id="document" class="form-control" required>
		 </div>
        </div>
        <div class="modal-footer">
			<button type="submit"  name="enregistrer" class="btn btn-success">Enregistrer</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
            
        </div>
      </form>

    
  </div>
</div>
</div>
<!--FIN MODAL-->	
<div class="module">
   <div class="module-head">
      <h3>Liste Mémoire</h3></div>
        <div class="module-body">
            <table class="table table-striped">
				 <thead>
					<tr>
						
						<th>Catégorie</th>						
						<th>Date Publication</th>
						<th>Sujet</th>
						<th>lien</th>
						<th>Auteur</th>
						<th>Mots Clés</th>
						<th>Modfifier</th>
						<th>Supprimer</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($memoire as $memoire){ ?>
					
				
				<tr>
					<td><?=$memoire['categorie']?></td>
					<td><?=$memoire['date_memoire']?></td>
					<td><?=$memoire['sujet']?></td>
					<!--<td><a href="<?php //echo base_url.'views/memoire/'.$memoire['lien_memoire']?>" target="_blank">Voir</a></td> -->
					<td><a href="<?php echo base_url.'views/memoire/'.$memoire['lien_memoire']?>" target="_blank">Voir</a></td>		
					<td><?=$memoire['auteur']?></td>
					<td><?=$memoire['mots_cles']?></td>
					
					<td>
					<form action="" method="post">
                    <input type="hidden" name="edit_id" value="">
                    <button  type="submit" name="edit_btn" class="btn btn-success">Modifier</button>
					</form>
					</td>
					<td>
					<form action="" method="post">
                    <input type="hidden" name="delete_id" value="">
                    <button  type="submit" name="delete_btn" class="btn btn-danger">Supprimer</button>
					</form>
					</td>
					</tr>		
				<?php }		?>
					</tbody>
					</table>
        </div>
</div>

</div> <!-- /widget-content -->
	
</div> <!-- /widget -->

</div> <!-- /span12 -->

</div> <!-- /row -->

</div> <!-- /container -->

</div> <!-- /main-inner -->

</div> <!-- /main -->
			<script>

			</script>
<?php
include base_app.'/include2/footer.php';
?>