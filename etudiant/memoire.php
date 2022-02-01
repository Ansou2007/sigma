<?php
include('include/header.php');
?>
		<a href="" class="btn btn-primary">Ajouter un mémoire</a>
		
<div class="module">
   <div class="module-head">
      <h3>Liste Mémoire</h3></div>
        <div class="module-body">
            <table class="table table-striped">
				 <thead>
					<tr>
						<th>#</th>
						<th>Catégorie</th>
						<th>Nom Mémoire</th>
						<th>Date</th>
						<th>Sujet</th>
						<th>lien</th>
						<th>Auteur</th>
						<th>Mots Clés</th>
						<th>Modfifier</th>
						<th>Supprimer</th>
					</tr>
				</thead>
				<tbody>
				<tr>
					<td>1</td>
					<td>Mark</td>
					<td>Otto</td>
					<td>@mdo</td>
					<td>@mdo</td>
					<td>@mdo</td>
					<td>@mdo</td>
					<td>@mdo</td>
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