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
<br>
</br>

<div class="module">
    <input type="hidden" name="id_utilisateur" id="id_utilisateur" value="<?=$id_utilisateur?>" >
   <div class="module-head">
      <h3>Journal d'Activité</h3></div>
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

liste_activite();	
			
	/*-------------CHARGEMENT LISTE----------------*/
		function liste_activite(){
					var action = "liste_activite";
					var id_utilisateur = $('#id_utilisateur').val();	
					$.ajax({
						url: "traitement_activite",
						type: "POST",
						data: {
							action :action,
							id_utilisateur
						},
						success:function(data){
							$('#donnees').html(data);
						}
						
					});
				}
	/*-------------FIN CHARGEMENT LISTE---------*/
	
		
	
			
	/*		})*/
</script>
<?php
include base_app.'/include2/footer.php';
?>
