<?php
require_once('../../configuration.php');
require_once base_app.'/core/connection.php';
include base_app.'/include2/header.php';


	/*
	$requete = $con->prepare("SELECT * FROM memoire");
	$requete->execute();
	$memoire = $requete->fetchAll();
	//print_r($memoire);
	*/
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

<button type="button" class="btn btn-primary" name="add" id="add">Ajouter</button>
<br>
</br>
	
<!--MODAL-->		
	<div class="modal fade" tabindex="-1" id="memoire"  role="dialog"  aria-hidden="true">
	<div class="modal-dialog">    
      <div class="modal-header">
	  
        <h5 class="modal-title">Mémoire</h5>
		<div id="alerte"></div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <!--FORM AJOUT DECLARATION-->
      <form id="formulaire"  method="POST" enctype="multipart/form-data">
        <div class="modal-body">
		<input type="hidden" name="id_utilisateur" id="id_utilisateur" value="<?=$id_utilisateur?>">  
		<input type="hidden" name="nom_complet" id="nom_complet" value="<?=$nom_complet?>">  
		<input type="hidden" name="hidden_id" id="hidden_id" > 
		<input type="hidden" name="mail" id="mail" value="<?=$mail?>">
		<input type="hidden" name="action" id="action" value="ajout"/>  
         <div class="form-group">
		 <label>Catégorie:</label>            
         <select name="categorie" id="categorie" class="form-control">
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
			<textarea name="sujet" id="sujet" class="form-control" ></textarea>
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
			<textarea name="mot_cle" id="mot_cle" class="form-control"></textarea>
		 </div>
		 <div class="form-group ">
			<label>Document:</label>
			<input type="file" name="document" id="document" class="form-control" >
		 </div>
        </div>
        <div class="modal-footer">
			<input type="submit" name="enregistrer" id="enregistrer" value="ajout" class="btn btn-success">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>           
        </div>
      </form>    
</div>
</div>
<!--FIN MODAL-->	
<div class="module">
   <div class="module-head">
      <h3>Liste Mémoire</h3></div>
        <div class="module-body">
            <table class="table table-striped" id="donnees">
				 
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

	Liste();
	/*----------AJOUT--------------*/
$('#add').click(function(){
	$('#memoire').modal('show');
	$('#formulaire')[0].reset();
	$('.modal-title').text("Ajout Mémoire");
	$('#action').val('ajout');
	$('#enregistrer').val('Ajout');
});
$('#formulaire').submit(function(event){
		event.preventDefault();				
				var categorie = $('#categorie').val();
				var sujet = $('#sujet').val();
				var mot_cle = $('#mot_cle').val();
				var id_utilisateur = $('#id_utilisateur').val();
				var mail = $('#mail').val();
				var document = $('#document').val();
				var nom_complet = $('#nom_complet').val();
				 
				$.ajax({
					url: "traitement_m.php",
					type:"POST",
					data:new FormData(this),
					contentType: false,
					processData: false,
						success:function(data){							
							$('#alerte').html(data).fadeIn().delay(1000).fadeOut();
							//$('#alerte').html(data).fadeIn();
							$('#formulaire')[0].reset();
							Liste();
						}
					
				});
		
		
	});
/*----------FIN AJOUT--------------*/


/*----------CHARGEMENT--------------*/
function Liste(){
	var action = "liste_memoire";
	var id_utilisateur = $('#id_utilisateur').val();
	$.ajax({
		url: "traitement_m",
		type: "POST",
		data: {
			id_utilisateur :id_utilisateur,
				action :action},
		success:function(data){
			$('#donnees').html(data);
		}
	});
}
/*----------FIN CHARGEMENT--------------*/


	$(document).on('click','.editer',function(e)
	{				
				e.preventDefault();
				var id = $(this).attr('id');
				var action = "liste_un";
				
				$.ajax({
					url: "traitement_m",
					type: "POST",
					dataType: "json",
					data:{
						action :action,
						id :id
					},
					success:function(data){				
						$('#categorie').val(data.categorie);
						$('#sujet').val(data.sujet);
						$('#auteur').val(data.auteur);
						$('#mot_cle').val(data.mot_cle);
						$('#hidden_id').val(id);
						//$('#document').val(data.document);
						$('.modal-title').text('EDITION');
						$('#enregistrer').val('Modifier');
						$('#action').val('editer');
						$('#memoire').modal('show');
						Liste();
						
					}
				})
				
				
								
		});
			/*---------------SUPPRESSION-------------------*/
			$(document).on('click','.supprimer',function(e){
				e.preventDefault();
				var action = "supprimer";
				var id_memoire = $(this).attr('id');				
				if(confirm("Voulez-vous supprimer le mémoire ?")){				
					$.ajax({
						url: "traitement_m.php",
						type: "POST",
						data :{
							id_memoire :id_memoire,
							action :action
						},success:function(data){							
							Liste();
							alert('suppression avec success');
						}
					});
					
				}else{
					
				}
			});
			/*---------------FIN SUPPRESSION-------------------*/
</script>
<?php
include base_app.'/include2/footer.php';
?>