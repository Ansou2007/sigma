<?php
require '../../configuration.php';
include base_app.'include2/header.php';
require_once base_app.'core/connection.php';

$requete = $con->prepare("SELECT nom_complet,email,role,date_naissance,lieu_naissance,universite,sexe,photo FROM utilisateur WHERE id=? limit 1");
$requete->execute(array($id_utilisateur));
$profil = $requete->fetchAll();
//print_r($profil);
		


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
		<input type="hidden" name="action" id="action" value="editer"/>  
		<div class="form-group">
			<span>Nom Complet:</span> &nbsp &nbsp &nbsp
			<input type="text" disabled id="nom_complet" name="nom_complet" class="form-control" value="<?=$nom_complet?>">			
		 </div>
		 <div class="form-group">
			<span>Date Naissance:</span> &nbsp &nbsp
			<input type="date" id="date_naissance" name="date_naissance" class="form-control">			
		 </div>
		 <div class="form-group">
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
		 <div class="form-group">
			<span>Université:</span>&nbsp  &nbsp&nbsp&nbsp
			<input type="text" id="universite" name="universite" class="form-control">			
		 </div>
        </div>
        <div class="modal-footer">
			<input type="submit" name="enregistrer" id="enregistrer" value="Modifier" class="btn btn-success">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>           
        </div>
      </form>    
</div>
</div>
<!--FIN MODAL PROFIL-->
	<!--MODAL PHOTO-->		
	<div class="modal fade" tabindex="-1" id="profil_photo"  role="dialog"  aria-hidden="true">
	<div class="modal-dialog">    
      <div class="modal-header">
	  
        <h5 class="modal-title">Profil</h5>
		<div id="alerte1"></div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <!--FORM AJOUT DECLARATION-->
      <form id="formulaire_photo"  method="POST" enctype="multipart/form-data">
        <div class="modal-body">
		<input type="hidden" name="id_utilisateur" id="id_utilisateur" value="<?=$id_utilisateur?>">  
		<input type="hidden" name="hidden_id" id="hidden_id" > 		
		<input type="hidden" name="action" id="action_photo" value="editer_photo"/>  
		 <div class="form-group">
			<span>Photo:</span>&nbsp &nbsp &nbsp
			<input type="file" name="photo" required id="photo" class="form-control" >
		 </div>
        </div>
        <div class="modal-footer">
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
		   <?php foreach($profil as $profil){ ?>
				<tr>
				<th>Photo<td><img src="data:image/jpeg;base64,<?php echo base64_encode($profil['photo'])?>" class='img-thumbnail' height='60' width='75'/> <button id="editer_photo" class="btn btn-info">Modifier</button></td></th>
				</tr>
				<tr>
				<th>Nom Complet:<td><?php echo strtoupper($profil['nom_complet'])?></td></th>
				</tr>
				<tr>
				<th>Email:<td><?php echo $profil['email']?></td></th>
				</tr>
				<tr>
				<th>Date et Lieu de Naissance:<td><?php echo utf8_encode(strtoupper($profil['date_naissance'].' à '.$profil['lieu_naissance']))?></td></th>
				</tr>
				<tr>
				<th>Université:<td><?php echo utf8_encode(strtoupper($profil['universite']))?></td></th>
				</tr>
				<tr>
				<th>Role:<td><?php echo strtoupper($profil['role'])?></td></th>
				</tr>
				<tr>
				<th>Sexe:<td><?php echo strtoupper($profil['sexe'])?></td></th>
				</tr>
		   <?php } ?>
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
					$('.modal-title').text('Edition Profil');
					$('#profil').modal('show');
					
				});
				
				$('#formulaire').submit(function(e){
					e.preventDefault();
					var id_utilisateur = $('#id_utilisateur').val();
					var date_naissance = $('#date_naissance').val();
					var lieu_naissance = $('#lieu_naissance').val();
					var universite = $('#universite').val();
					var action = $('#action').val();
					var sexe = $('#sexe').val();
					$.ajax({
						type: "POST",
						url: "traitement_profil",
						data:{
							action :action,
							date_naissance :date_naissance,
							lieu_naissance :lieu_naissance,
							universite :universite,
							sexe :sexe,
							id_utilisateur :id_utilisateur
						},success:function(data){
								$('#alerte').html(data).fadeIn().delay(1000).fadeOut();
								$('#formulaire')[0].reset();
						}
					});
				
					
				});
			
			$('#editer_photo').click(function(e){
				e.preventDefault();
				$('#profil_photo').modal('show');
			});
			$('#formulaire_photo').submit(function(e){
				e.preventDefault();
				var action = $('#action_photo').val();
				var id = $('#id_utilisateur').val();
				var photo = $('#photo').val();
				$.ajax({
					url: "traitement_profil",
					type: "POST",
					data: new FormData(this),
					contentType: false,
					processData: false,
					success:function(data){
						$('#alerte1').html(data).fadeIn().delay(1000).fadeOut();
						//$('#alerte1').html(data).fadeIn();
						$('#formulaire_photo')[0].reset();
					}
				});
			})
</script>

<?php include base_app.'include2/footer.php';

?>

