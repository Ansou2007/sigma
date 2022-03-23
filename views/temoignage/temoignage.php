<?php 
require_once('../../configuration.php');
require_once base_app.'/core/connection.php';
include base_app.'/include2/header.php';

	
?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
	  <div class="span12">
	  <div class="widget">
	  <div class="widget-content">

<button type="button" class="btn btn-primary" id="add">Ajouter Témoignage</button>
<br>
</br>
	
												
<!--MODAL-->		
	<div class="modal fade" tabindex="-1" id="temoignage"  role="dialog"  aria-hidden="true">
	<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	  <div id="alerte"></div>
        <h5 class="modal-title">Témoignage</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <!--FORM AJOUT DECLARATION-->
      <form  id="formulaire" method="POST" >
        <div class="modal-body">
		<input type="hidden" name="id_utilisateur" id="id_utilisateur" value="<?=$id_utilisateur?>" >
		<input type="text" name="hidden_id" id="hidden_id" >   
		<input type="text" name="action" id="action" value="ajout"/>  		
        <label>Votre Témoignage:</label>
         <div class="form-group">            
         <textarea name="libelle" id="libelle"  class="form-control"></textarea>
         </div>              
        </div>
        <div class="modal-footer">
			<button type="submit" id="enregistrer" name="enregistrer" value="ajout" class="btn btn-success">Enregistrer</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>           
        </div>
      </form>

    </div>
  </div>
</div>
<!--FIN MODAL-->
<div class="module">
   <div class="module-head">
      <h3>Témoignage</h3></div>
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

		liste_temoignage();	
			
	$('#add').click(function(e){
		e.preventDefault();
	$('#temoignage').modal('show');
	$('#formulaire')[0].reset();
	$('.modal-title').text("Ajout Témoignage");
	$('#action').val('ajout');
	$('#enregistrer').text('Enregistrer');
	});
	
	$('#formulaire').submit(function(e){
		e.preventDefault();
		var action = $('#action').val();
		var libelle = $('#libelle').val();		
		var id_utilisateur = $('#id_utilisateur').val();								
					$.ajax({
					url: "traitement_temoignage",
					type: "POST",
					data: {
						action :action,
						id_utilisateur :id_utilisateur,
						libelle :libelle
					},
					success:function(data)
					{						
						//$('#id_utilisateur').val("");
						$('#alerte').html(data).fadeIn().delay(1000).fadeOut();
						$('#formulaire')[0].reset;
						liste_temoignage();
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
			url: "traitement_temoignage",
			type: "POST",
			data: {
				id :id,
				action :action
			},
			success:function(data){
				liste_temoignage();	
				alert(data);
			}
			
		});
		}else{
			return false;
		}		
	});
	/*---------------FIN SUPRESSION------------------*/	
	
			
	/*-------------CHARGEMENT LISTE----------------*/
		function liste_temoignage(){
					var action = "liste_temoignage";
					$.ajax({
						url: "traitement_temoignage",
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
	
		$(document).on('click','.editer',function(e){
			e.preventDefault();
			var action = "liste_un";
			var id = $(this).attr("id");
			$.ajax({
				url: "traitement_temoignage",
				type: "POST",
				dataType: "json",
				data:{
					action :action,
					id :id
					
					},
					success:function(data){
												
						$('#libelle').val(data.libelle);
						$('#hidden_id').val(id);
						$('.modal-title').text('Edition');
						$('#enregistrer').text('Modifier');
						$('#action').val('editer');
						$('#temoignage').modal('show');
						$('#alerte').html(data);
						//$('#alerte').html(data).fadeIn().delay(1000).fadeOut();
						liste_temoignage();	
						
					}
			})
		});
	
			
	/*		})*/
</script>
<?php
include base_app.'/include2/footer.php';
?>
