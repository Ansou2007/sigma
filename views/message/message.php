<?php
	require_once('../../configuration.php');
	require_once base_app.'core/connection.php';
	include base_app.'/include2/header.php';

		$requet = $con->prepare("SELECT * FROM message where id_destinataire=? ");
		$requet->execute(array($id_utilisateur));
		$message = $requet->fetchall();
		setlocale(LC_TIME, "fr_FR","french");
		//print_r($message);
		 //$jour = strftime("%d",strtotime($date_naissance_enfant));
		//$mois = strftime("%B",strtotime($date_naissance_enfant));
	
	
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
	  <div class="span12">
	<!-- /widget -->
	<div class="widget">
    <div class="widget-header"> <i class="icon-file"></i>
      <h3>Message</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
	<?php foreach($message as $message)  { ?>  
    <ul class="news-items">
      
     <li>
         
      <div class="news-item-date"> <span class="news-item-day"><?=strftime("%d",strtotime($message['date_message']));?></span> <span class="news-item-month"><?=ucfirst(strftime("%B",strtotime($message['date_message'])));?></span> </div>
      <div class="info"> <a class="name" style="font-size:20px"><?=$message['auteur']?></a></div>       
        <div class="options_arrow">
                        <div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-cog"></i> Action</a>
                          <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
                            <li><a href="#"><i class=" icon-share-alt icon-large"></i>Archiver</a></li>
                            <li><a href="#"><i class=" icon-trash icon-large"></i>Supprimer</a></li>
                            
                          </ul>
                        </div>
                      </div>
      <p class="text" style="font-size:24px"><?php echo utf8_encode($message['message'])?></p>
                  
    </li>
	<?php	}?>	
	</ul>
    </div>

		
    </div>
            <!-- /widget-content --> 
    </div>
          <!-- /widget --> 
		  </div> <!-- /span12 -->

</div> <!-- /row -->

</div> <!-- /container -->

</div> <!-- /main-inner -->


	
<?php
		include base_app.'/include2/footer.php'
?>