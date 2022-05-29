<?php
$serveur="localhost";
$database="sigma";
$utilisateur="admin";
$modpass="admin";

	try{
		$con =new pdo("mysql:host=$serveur;dbname=$database",$utilisateur,$modpass);
		//$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}catch(PDOException $e)
	{
		Die('Erreur :'.$e->getMessage());
	}



	


?>