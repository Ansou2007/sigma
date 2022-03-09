<?php
require_once('../../configuration.php');
require_once base_app.'/core/connection.php';

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$requete = $con->prepare("SELECT * FROM memoire WHERE id=?");
	$requete->execute(array($id));
	
	if($requete->rowCount() >0 ){
		$resultat = $requete->fetch();
		$fichier = $resultat['lien_memoire'];
		
		echo $rendu = '			
			<!doctype html>
			<html lang="fr">
			<head>
			<title>SIGMA</title>
			<meta charset="utf-8">
			</head>
			<body >
			<div class="container" oncontextmenu="return false" onselectstart="return false" onMouseOver="window.status="desole";return false;">
				
				<embed oncontextmenu="return false"  src="'.base_url.'/views/memoire/'.$fichier.'#toolbar=0" type="application/pdf" width="100%" height="600px" />
			
				
			
			</div>

			</body>
			</html>
		
		';
	}else{
		echo "Aucun memoire";
	}
}
?>







 