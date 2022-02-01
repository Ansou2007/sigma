<?php
	require_once '../../core/connection.php';
		
	if(!empty($_POST["id_filiere"])) {
	

$query = $con->prepare("SELECT * FROM cohorte WHERE id_filiere = '" . $_POST["id_filiere"] . "'");
 $query->execute();
 $cohorte = $query->fetchall();
    
?>
	<option value="">---COHORTE---</option>
<?php
	foreach($cohorte as $donnees) 
	
	{
?>
	<option value="<?php echo $donnees["id"]; ?>"><?php echo $donnees["nom_cohorte"]; ?></option>
<?php
	}
}
?>