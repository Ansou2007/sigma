<?php
	require_once '../../../Configuration.php';
	include base_app.'/includes/header.php';
	include base_app.'/includes/navbar.php';
	include base_app.'core/connection.php';
	
	if($role=="Super Administrateur" || $role=="Administrateur"){
	$query = $con->prepare("SELECT * FROM region order by nom_region");
	$query->execute();
	$region = $query->fetchAll();
	}else{
		
		exit('<div class="alert alert-danger text-center">Page Non Autorisé</div>');
		
	}
?>
		<script>
		
				$(document).ready(function(e){
				e.preventDefault;
				$('input').focus(function(){
					$('#status').fadeOut(800);
				});
				$('#nom_region').keyup(function(){
					verifier_region();
				});
				function verifier_region(){
					$.ajax({
						type:'POST',
						url:'ajout_region',
						data: {
							'nom_region' : $('#nom_region').val()
						},
						success: function(data){
							if(data == "success"){
								//$("#out_region").html('<img src="images.png" class="small_image"  />');
								$("#out_region").html('Valide');
								$("#out_region").css("color","green");
								return true;
							}else{
								$("#out_region").css("color","red").html(data);
							}
						}
					});
				}  
				
				
			$('#region').on("submit", function(event){  
           event.preventDefault();  
           if($('#nom_region').val() == "")  
           {  
                alert("Région est  Obligatoire");  
           }else{  
                $.ajax({  
                     url:"ajout_region",  
                     method:"POST",  
                     data:$('#region').serialize(),  
                     beforeSend:function(){  
                          $('#nom_region').val("Insertion");  
                     },  
                     success:function(data){  
                          $('#region')[0].reset();  
                          $('#ajout_region').modal('hide');
						  //$('#table_region').html(data); 						  
                          //dataTable.ajax.reload();
						  //$('#table_region').ajax.reload();
                     }  
                });  
           }  
		});
		});
		</script>
			
			<!--MODAL-->
			
		
		<div class="modal fade" id="ajout_region" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Région</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
		
      </div>
	  <!--
      <form action="ajout_region" method="POST">
		-->
	<form id="region" >
        <div class="modal-body">
			<div id="status" class="alert alert-warning text-center">La région est obligatoire</div>
            <div class="form-group">
                <label> Région </label>
                <input type="text" name="nom_region" id="nom_region" class="form-control" autocomplete="off">
				<small id="out_region"></small>
			</div>			   
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" id="enregistrer" name="enregistrer" class="btn btn-primary">Enregistrer</button>
        </div>
      </form>

    </div>
  </div>
</div>
		<!--FIN MODAL-->
		
		<!-- Debut Page Contenu -->
        <div class="container-fluid">

          <!-- Nom  Entete -->
          <h1 class="h3 mb-4 text-gray-800">Administration</h1>
        </div>
		<!-- CONTENU--->
		<div class="container-fluid">
		<!-- DataTale -->
		<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajout_region">
              Ajouter Région
            </button>
			</h6>		
			
  </div>


  <div class="card-body">
				
    <div class="table-responsive" id="table_region">
				<?php if(isset($_SESSION['ok'])){
					echo '<div class="alert alert-success text-center">'.$_SESSION['ok'].'</div>';							
					} 					
					unset($_SESSION['ok']);
				?>
		
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="5">
        <thead>
		
          <tr>          
            <th width="70%">Région </th>           
			<th>Editer</th>
			<th>Supprimer</th>
          </tr>
        </thead>
        <tbody>
			<?php foreach($region as $region ){ ?>		
          <tr>                    
			
			<td><?=$region['nom_region']?></td>
             
            <td>
                <form action="modifier" method="post">
                    <input type="hidden" name="id" value="<?=$region['id']?>">
                    <button  type="submit" name="modifier" class="btn btn-success">MODIFIER</button>
                </form>
            </td>
            <td>
                <form action="supprimer_region" method="post">
                  <input type="hidden" name="id_region" value="<?=$region['id']?>">
                  <button type="submit" name="supprimer" onclick="return confirm('Voulez-vous supprimer la region ?')" class="btn btn-danger">SUPPRIMER</button>
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

