<?php
require_once('../configuration.php');
require_once base_app.'core/connection.php';
include base_app.'/include2/header.php';
include base_app.'controllers/calcul.php';

//LISTE activite
$requete = $con->prepare("SELECT * FROM journal WHERE id_utilisateur=? ORDER BY date_journal DESC LIMIT 5");
$requete->execute(array($id_utilisateur));
$journal = $requete->fetchall();
//print_r($journal);


?>
<div class="main">
	
	<div class="main-inner">
	    <div class="container">
	      	
	  	  <!-- /row -->
	      <div class="row">
	      	<div class="span6">
	      		
	      		<div class="widget">
						
					<div class="widget-header">
						<i class="icon-star"></i>
						<h3>Statistique</h3>
					</div> <!-- /widget-header -->
					<div class="widget-content">
						<h2><i class="icon-book"></i> Temoignage : <?=nbre_temoignage()?></h2>
						<h2><i class="icon-list-alt"></i> Mémoire Déposé : <?=nbre_memoire()?></h2>
						<h2><i class="icon-envelope"></i> : 0</h2>
					</div> <!-- /widget-content -->
				</div> <!-- /widget -->
				
		    </div> <!-- /span6 -->
	      	
	      	
	      	<div class="span6">
	      		<div class="widget">
					<div class="widget-header">
						<i class="icon-list-alt"></i>
						<h3>Derniere Activité</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<?php foreach($journal as $journal){ ?>
							<p style="font-size:20px"><i class="icon-bell"></i>&nbsp;&nbsp;<b class="alert alert-success"><?php echo $journal['libelle'] ." Le " .$journal['date_journal'] ?></b></p>
							<?php } ?>
					</div> <!-- /widget-content -->
				
				</div> <!-- /widget -->
									
		      </div> <!-- /span6 -->
	      	
	      </div> <!-- /row -->
	      
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->
<?php

include base_app.'/include2/footer.php';

?>