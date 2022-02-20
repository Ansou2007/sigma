<?php
	require_once('../../configuration.php');
	include base_app.'/include2/header.php';
	
	$token = rand(1000000,9000000);
	//echo $token;
	if(isset($_POST['inscrire']))
?>
	
	
	
	<form action="" method="post">
	
		<span>Adresse mail</span> <input type="email" name="mail" id="mail">
		<button type="submit" >Verifier</button>
	
	
	</form>
	<script>
	/*
	function verifier(){
		
	
			var mail = $('#mail').val();
			var autorise = ['@uvs.edu.sn','@uadb.edu.sn','@uasz.edu.sn'];
			
			alert(autorise);
			//autorise.forEach(element => console.log(element));
			var extension = strrchr(mail,'@');
			if(in_array(extension,autorise)){
				alert('mail bon');
			}else{
				alert('mauvais mail');
			}
			
	}
	*/
	</script>
<?php
		include base_app.'/include2/footer.php'
?>