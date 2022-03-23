<?php
require '../../configuration.php';
include base_app.'include2/header.php';




?>



  
    <div class="container">
      <div class="row">
	  <div class="span12">
	  <div class="widget">
	  <div class="widget-content">
			<button class="btn btn-primary" id="editer">Editer Profil</button>
			<br></br>
			<!--MODAL-->		
	<div class="modal fade" tabindex="-1" id="profil"  role="dialog"  aria-hidden="true">
	<div class="modal-dialog">    
      <div class="modal-header">
	  
        <h5 class="modal-title">Profil</h5>
		<div id="alerte"></div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <!--FORM AJOUT DECLARATION-->
      <form id="formulaire"  method="POST" enctype="multipart/form-data">
        <div class="modal-body">
		<input type="hidden" name="id_utilisateur" id="id_utilisateur" value="<?=$id_utilisateur?>">  
		<input type="hidden" name="hidden_id" id="hidden_id" > 
		<input type="hidden" name="mail" id="mail" value="<?=$mail?>">
		<input type="hidden" name="action" id="action" value="ajout"/>  
		<div class="form-group ">
			<span>Nom Complet:</span> &nbsp &nbsp &nbsp
			<input type="text" disabled id="nom_complet" name="nom_complet" class="form-control" value="<?=$nom_complet?>">			
		 </div>
		 <div class="form-group ">
			<span>Date Naissance:</span> &nbsp &nbsp
			<input type="date" id="date_naissance" name="date_naissance" class="form-control">			
		 </div>
		 <div class="form-group ">
			<span>Lieu de Naissance:</span> 
			<input type="text" id="lieu_naissance" name="lieu_naissance" class="form-control">			
		 </div>
         <div class="form-group"> 
		 <span>Sexe:</span> &nbsp  &nbsp  &nbsp   &nbsp &nbsp &nbsp       
         <select name="sexe" id="sexe" class="form-control">
		  <option disabled selected>Choisir</option>
			<option value="feminin">Féminin</option>
			<option value="masculin">Masculin</option>			
		 </select>
         </div> 
		 
		 <div class="form-group ">
			<span>Université:</span>&nbsp  &nbsp&nbsp&nbsp
			<input type="text" id="universite" name="universite" class="form-control">			
		 </div>
		 <div class="form-group ">
			<span>Photo:</span>&nbsp &nbsp &nbsp
			<input type="file" name="photo" id="photo" class="form-control" >
		 </div>
        </div>
        <div class="modal-footer">
			<!--<button type="submit" name="enregistrer" id="enregistrer"  class="btn btn-success">Enregistrer</button>-->
			<input type="submit" name="enregistrer" id="enregistrer" value="Modifier" class="btn btn-success">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>           
        </div>
      </form>    
</div>
</div>
<!--FIN MODAL-->	
<div class="module">
   <div class="module-head">
      <h3>MON PROFIL</h3></div>
        <div class="module-body">
           <table class="table table-striped table-responsive">
				<tr>
				<th>Photo<td><img src=""></td></th>
				</tr>
				<tr>
				<th>Nom Complet:<td><?php echo strtoupper($nom_complet)?></td></th>
				</tr>
				<tr>
				<th>Email:<td><?php echo $mail?></td></th>
				</tr>
				<tr>
				<th>Date et Lieu de Naissance:<td>31/03/1994</td></th>
				</tr>
				<tr>
				<th>Université:<td>UVS</td></th>
				</tr>
				<tr>
				<th>Role:<td><?php echo strtoupper($role)?></td></th>
				</tr>
		   
		   </table>
        </div>
</div>

</div> <!-- /widget-content -->
	
</div> <!-- /widget -->

</div> <!-- /span12 -->

</div> <!-- /row -->

</div> <!-- /container -->

<script>
		
				$('#editer').click(function(e){
					e.preventDefault();
					$('#profil').modal('show');
				});
				
				$('#formulaire').submit(function(e){
					e.preventDefault();
					
					$('#formulaire')[0].reset();
					
				});
			

</script>

<?php include base_app.'include2/footer.php';

?>

