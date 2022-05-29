<?php



function notification( $id, $libelle)
{
	global $con;
	$date_journal = date('Y-m-d H:i:s');
	$requete = $con->prepare("INSERT INTO journal ( id_utilisateur,date_journal,libelle) VALUES (?,?,?)");
	$requete->execute(array($id,$date_journal,$libelle));
	
	
}


?>