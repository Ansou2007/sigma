<?php
	session_start();
	
	function actualiser_session()
					{
						if ( isset($_SESSION['time']) ) // Test: Si il existe une session
						{
							//$tempsMaxSession = 3600;    
							$tempsMaxSession = 3600;                          
					// le temps maximal que dure la session en seconde
				
						if( ($_SESSION['time'] + $tempsMaxSession) >= time() )    
					// Si l'action sur la session date de moins de $tempsMaxSession
							$_SESSION['time'] = time();            // Session reactialisé
						else                                       // Sinon
								session_destroy();                 // Session detruite
						 }
					}

	if(!isset($_SESSION['utilisateur']) && !isset($_SESSION['time']))
		
	{
		 
		header('location:index');
		
		
	}else{
	
		actualiser_session();
		
		
	}


	

?>

		