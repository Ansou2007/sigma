<?php
$serveur="localhost";
$database="archive";
$utilisateur="root";
$modpass="";

	try{
		$con =new pdo("mysql:host=$serveur;dbname=$database",$utilisateur,$modpass);
	}catch(PDOException $e)
	{
		Die('Erreur :'.$e->getMessage());
	}


/*
	class Model{
		private $serveur = "localhost";
		private $database = "pastef";
		private $utilisateur = "root";
		private $mdp ="";
		private $con;

		public function __construct(){

		try{

			$this->con=new pdo("mysql:host=$this->serveur;dname=$this->database",$this->utilisateur,$this->mdp);

		}catch(PDOException $e){
			Die('Erreur:'.$e->getMessage());
		}
			
		} 

    
	}
	*/
	


?>