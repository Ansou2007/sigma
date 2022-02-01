<?php
    
		require_once '../../Configuration.php';
	    require_once base_app.'/core/connection.php';
		include base_app.'includes/header.php';
  	
?>		
	
   	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mt-5 py-3 m-auto">
				<div class="card bg-light ">					
					<div class="card-title">
					<h2 class="text-center">RECUPERATION</h2>
					<hr>
					</div>
					<div class="card-body">
						<form class="form" method="post" action="">
						<div class="form-group">
						<label for="email">Adresse Mail:</label>
                        <input type="email" name="email" class="form-control py-2 mb-2" placeholder="Votre Mail.." required >
						<small id="email"></small>
						</div>
						<div class="form-group">
                        <button type="submit" name="envoyer" class="btn btn-success btn-block">Envoyer</button>
                        </div>
						</form>
						<a href="index" class="btn btn-danger btn-block">Annuler</a>
					
					</div>
					<div class="card-footer">
						<b><p class="text-center" style="color:black">Copyright &copy; PASTEF-BIGNONA-<?php echo date('Y')?>
					</div>
				</div>
			
			</div>		
		</div>
	</div>
	
	
	
	
	
   
			
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>