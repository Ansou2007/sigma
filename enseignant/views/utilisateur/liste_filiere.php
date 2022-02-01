<?php
	require_once '../../core/connection.php';
		
	if(!empty($_POST["id_pole"])) {
	

$query = $con->prepare("SELECT * FROM filiere WHERE id_pole = '" . $_POST["id_pole"] . "'");
 $query->execute();
 $filiere = $query->fetchall();
    
?>
	<option value="">---FILIERE---</option>
<?php
	foreach($filiere as $donnees) 
	
	{
?>
	<option value="<?php echo $donnees["id"]; ?>"><?php echo $donnees["code"]; ?></option>
<?php
	}
}
?>