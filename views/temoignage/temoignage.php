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

<button type="button" id="test" role="button" data-toggle="modal">Test</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#temoignage">Ajouter Témoignage</button>
<br>
</br>
	
												
<!--MODAL-->		
	<div class="modal hide fade" tabindex="-1" id="temoignage"  role="dialog"  aria-hidden="true">
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
      <form action="ajout_temoignage" method="POST">
        <div class="modal-body">
		<input type="hidden" name="id_utilisateur" id="id_utilisateur" >     
        <label>Votre Témoignage:</label>
         <div class="form-group">            
         <textarea name="message" id="message" required class="form-control"></textarea>
         </div>              
        </div>
        <div class="modal-footer">
			<button type="button" onclick="AjouterTemoignage()" name="enregistrer" class="btn btn-success">Enregistrer</button>
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
/*	$(document).ready(function(){
			
				alert('coucou');
			*/
		liste_temoignage();	
			$('#test').click(function(){
				$('#temoignage').modal('show');
			});
	
		
			function AjouterTemoignage(){
				var action = "ajouter"
				var id_utilisateur = $('#id_utilisateur').val();
				var message = $('#message').val();
				if($('#message').val().length == 0){
					$('#alerte').html('<h4 class="alert alert-danger">le message est obligatoire<h4>').fadeIn().delay(500).fadeOut();
				}else{
					$.ajax({
					url: "traitement_temoignage.php",
					type: "POST",
					data: {
						action :action,
						id_utilisateur :id_utilisateur,
						message :message
					},
					success:function(data){
						$('#message').val("");
						$('#id_utilisateur').val("");
						$('#alerte').html('<h4 class="alert alert-success">Ajout avec success</h4>').fadeIn().delay(500).fadeOut();
						liste_temoignage();
					}
				});
				}
				
			}
			
			function Supprimer(){
				
				var action = "supprimer";
				var id = $('#id_temoignage').val();				
				$.ajax({
					url:"traitement_temoignage.php",
					type: "POST",
					data:{	
						id :id,
						action :action
						},
					success:function(data){
						alert('supprimer avec success');
					}
				});
			}
			
		function liste_temoignage(){
					var action = "liste_temoignage";
					$.ajax({
						url: "traitement_temoignage.php",
						type: "POST",
						data: {
							action :action
						},
						success:function(data){
							$('#donnees').html(data);
						}
						
					});
				}
			
	
		$(document).on('click','.editer',function(){
			
			var action = "editer";
			var id = $(this).attr("id");
			$.ajax({
				url: "traitement_temoignage.php",
				type: "POST",
				dataType: "json",
				data:{
					id :id,
					action :action
					},
					success:function(data){
						//console.log("success");
						
						$('#message').val(data.message);
						$('#id_utilisateur').val(id);
						$('#temoignage').modal('show');
						
					}
			})
		});
	
			
	/*		})*/
</script>
<?php
include base_app.'/include2/footer.php';
?>
