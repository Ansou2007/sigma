<?php 
require('../../configuration.php');
include base_app.'views/admin/include/header.php';


?>


<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
	  <div class="span12">
	  <div class="widget">
	  <div class="widget-content">

<button type="button" class="btn btn-primary" name="add" id="add">Ajouter Catégorie</button>
<br>
</br>
	
												
<!--MODAL-->		
	<div class="modal fade" tabindex="-1" id="categorie"  role="dialog"  aria-hidden="true">
	<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	  <div id="alerte"></div>
        <h5 class="modal-title">CATEGORIE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <!--FORM AJOUT DECLARATION-->
      <form  id="formulaire" method="POST" >
        <div class="modal-body">
		<input type="hidden" name="id_utilisateur" id="id_utilisateur" value="<?=$id_utilisateur?>" >
		<input type="hidden" id="hidden_id" name="hidden_id" >   
		<input type="hidden" name="action" id="action" value="ajout"/>  		
        <label>Categorie:</label>
         <div class="form-group">            
         <input type="text" name="libelle" id="libelle"  class="form-control" required>
         </div>              
        </div>
        <div class="modal-footer">
			<input type="submit" id="enregistrer" name="enregistrer" value="ajout" class="btn btn-success"/>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>           
        </div>
      </form>

    </div>
  </div>
</div>
<!--FIN MODAL-->
<div class="module">
   <div class="module-head">
      <h3>Liste Categorie</h3></div>
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

		liste_categorie();	
			
	$('#add').click(function(e){
		e.preventDefault();
	$('#filiere').modal('show');
	$('#formulaire')[0].reset();
	$('.modal-title').text("Ajout Categorie");
	$('#action').val('ajout');
	$('#enregistrer').text('Enregistrer');
	});
	
	$('#formulaire').submit(function(e){
		e.preventDefault();
		var action = $('#action').val();
		var libelle = $('#libelle').val();		
									
					$.ajax({
					url: "listecategorie",
					type: "POST",
					data: {
						action :action,
						libelle :libelle
					},
					success:function(data)
					{						
						//$('#id_utilisateur').val("");
						$('#alerte').html(data).fadeIn().delay(1000).fadeOut();
						$('#formulaire')[0].reset();
						liste_categorie();
					}
				});		
		
	});
	/*---------------SUPRESSION------------------*/
	$(document).on('click','.supprimer',function(e){
		e.preventDefault();
		var action = "supprimer";
		var id = $(this).attr("id");
		if(confirm("Voulez-vous supprimer ce temoignage")){
			$.ajax({
			url: "listecategorie",
			type: "POST",
			data: {
				id :id,
				action :action
			},
			success:function(data){
				liste_categorie();	
				alert(data);
			}
			
		});
		}else{
			return false;
		}		
	});
	/*---------------FIN SUPRESSION------------------*/	
	
			
	/*-------------CHARGEMENT LISTE----------------*/
		function liste_categorie(){
					var action = "liste";
					var id_utilisateur = $('#id_utilisateur').val();	
					$.ajax({
						url: "listecategorie",
						type: "POST",
						data: {
							action :action
						},
						success:function(data){
							$('#donnees').html(data);
						}
						
					});
				}
	/*-------------FIN CHARGEMENT LISTE---------*/
	
		$(document).on('click','.editer',function(){
			var id = $(this).attr("id");
			var action = "liste_un";
			$.ajax({
				url: "listecategorie",
				type: "POST",
				dataType: "json",
				data:{
					id :id,
					action :action
					},
					success:function(data){
												
						$('#libelle').val(data.libelle);						
						$('.modal-title').text('Edition');
						$('#enregistrer').val('Modifier');
						$('#action').val('edition');
						$('#hidden_id').val(id);
						$('#categorie').modal('show');
						$('#alerte').html(data);
						
						liste_categorie();	
						
					}
			});
		});
	
			
	/*		})*/
</script>
<?php
include base_app.'/include2/footer.php';
?>
