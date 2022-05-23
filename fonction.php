<?php

	require('configuration.php');
	

	function nbre_filiere()
{
    global $con;
    $res = $con->query("select count(*) nbre  from filiere");
	$res->execute();
    $somme = $res->fetch();
    return $somme['nbre'];
}
	function nbre_inscrit()
{
    global $con;
    $res = $con->query("select count(*) nbre  from utilisateur");
	$res->execute();
    $somme = $res->fetch();
    return $somme['nbre'];
}

	function nbre_memoire()
{
    global $con;
    $res = $con->query("select count(*) nbre  from memoire");
	$res->execute();
    $somme = $res->fetch();
    return $somme['nbre'];
}
function nbre_temoignage()
{
    global $con;
    $res = $con->query("select count(*) nbre  from temoignage");
	$res->execute();
    $somme = $res->fetch();
    return $somme['nbre'];
}