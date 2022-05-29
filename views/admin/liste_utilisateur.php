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


<br>
</br>
	
	
<div class="module">
   <div class="module-head">
      <h3>Liste Utilisateur</h3></div>
        <div class="module-body">
			<span class="icon-search"></span><input type="text" name="rechercher" id="rechercher" placeholder="rechercher...">
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

/*----------CHARGEMENT--------------*/
function Liste(){
	var action = "liste";
	
	$.ajax({
		url: "listeutilisateur",
		type: "POST",
		data: {	action :action},
		success:function(data){
			$('#donnees').html(data);
		}
	});
}
/*----------FIN CHARGEMENT--------------*/


	
			
</script>
<?php
include base_app.'/include2/footer.php';
?>