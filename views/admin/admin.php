<?php 
require('../../configuration.php');
include base_app.'fonction.php';
require_once base_app.'core/connection.php';
include base_app.'views/admin/include/header.php';

$utilisateur = nbre_inscrit();
$memoire = nbre_memoire();
$temoignage = nbre_temoignage();

?>
<div class="main">
	<div class="main-inner">
	    <div class="container">
	      <div class="row">
	      	<div class="span12">
	      		<div class="widget">
					<div class="widget-header">
						<i class="icon-th-large"></i>
						<h3>Statistique</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						<div class="pricing-plans plans-3">
							
						<div class="plan-container">
					        <div class="plan">
						        <div class="plan-header">
					                
						        	<div class="plan-title">
						        		TOTAL UTILISATEUR        		
					        		</div> <!-- /plan-title -->
					                
						            <div class="plan-price">
					                	<?php echo $utilisateur ?><span class="term">Utilisateurs</span>
									</div> <!-- /plan-price -->
						        </div> <!-- /plan-header -->	        
								<div class="plan-actions">				
									<a href="javascript:;" class="btn">Détail</a>				
								</div> <!-- /plan-actions -->
					
							</div> <!-- /plan -->
					    </div> <!-- /plan-container -->					    
					    <div class="plan-container">
					        <div class="plan green">
						        <div class="plan-header">
					                
						        	<div class="plan-title">
						        		TOTAL MEMOIRE	        		
					        		</div> <!-- /plan-title -->
					                
						            <div class="plan-price">
                                    <?php echo $memoire ?><span class="term">Mémoires</span>
									</div> <!-- /plan-price -->
									
						        </div> <!-- /plan-header -->	          
						        
						       
								
								<div class="plan-actions">				
									<a href="javascript:;" class="btn">Détail</a>				
								</div> <!-- /plan-actions -->
					
							</div> <!-- /plan -->
					    </div> <!-- /plan-container -->
					    
					    <div class="plan-container">
					        <div class="plan">
						        <div class="plan-header">
					                
						        	<div class="plan-title">
						        		TOTAL TEMOIGNAGE	        		
					        		</div> <!-- /plan-title -->
					                
						            <div class="plan-price">
                                    <?php echo $temoignage ?><span class="term">Témoignages</span>
									</div> <!-- /plan-price -->
									
						        </div> <!-- /plan-header -->	       
								
								<div class="plan-actions">				
									<a href="javascript:;" class="btn">Détail</a>				
								</div> <!-- /plan-actions -->
					
							</div> <!-- /plan -->
							
					    </div> <!-- /plan-container -->
				
				
					</div> <!-- /pricing-plans -->
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->					
				
		    </div> <!-- /span12 -->     	
	      </div> <!-- /row -->
	
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->

<?php
include base_app.'views/admin/include/footer.php';
?>