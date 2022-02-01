<?php 
include('include/header.php');
?>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
              Ajouter Témoignage
</button>
<!-- Modal -->
                                                    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h3 id="myModalLabel">Thank you for visiting EGrappler.com</h3>
                                                      </div>
                                                      <div class="modal-body">
                                                        <p>One fine body…</p>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                        <button class="btn btn-primary">Save changes</button>
                                                      </div>
                                                    </div>
													<!--FIN MODAL-->
<!--MODAL-->		
	<div class="modal hide fade" tabindex="-1" id="temoignage"  role="dialog"  aria-hidden="true">
	<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Témoignage</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <!--FORM AJOUT DECLARATION-->
      <form action="ajout_temoignage" method="POST">
        <div class="modal-body">
		<input type="hidden" name="id_utilisateur" value="">     
        <label>Message</label>
         <div class="form-group">            
         <textarea name="message" id="" cols="0" rows="0" class="form-control"></textarea>
         </div>              
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" name="enregistrer" class="btn btn-primary">Enregistrer</button>
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
            <table class="table table-striped">
				 <thead>
					<tr>
						<th>Date</th>
						<th>Message</th>		
						<th>Suivi</th> 	
						<th width="15%">Modifier </th>
						<th width="15%">Supprimer </th>
					</tr>
				</thead>
				<tbody>
				<tr>
					<td>1</td>
					<td>Mark</td>
					<td>Otto</td>					
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
					</tbody>
					</table>
        </div>
</div>
<?php
include('include/footer.php');
?>