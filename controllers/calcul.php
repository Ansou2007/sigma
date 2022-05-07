<?php
//require_once base_app.'views/utilisateur/session.php';	

	
	
	function nbre_temoignage()
{
    global $con;
	$id_utilisateur = $_SESSION['utilisateur']['id'];
    $res = $con->query("select count(*) nbre  from temoignage WHERE id_utilisateur=$id_utilisateur ");
	$res->execute();
    $somme = $res->fetch();
    return $somme['nbre'];
}
	

	function nbre_memoire()
{
    global $con;
	$id_utilisateur = $_SESSION['utilisateur']['id'];
    $res = $con->query("select count(*) nbre  from memoire WHERE id_utilisateur=$id_utilisateur ");
	$res->execute();
    $somme = $res->fetch();
    return $somme['nbre'];
}