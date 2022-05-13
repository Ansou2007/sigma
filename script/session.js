
function tester_session(){
	$.ajax({
		url: '',
		type: 'POST',
		success:funtion(data){
			if(data == 'connecté'){
				alert('vous etes connecté');
			}
		}
	})
	
}
/*
setInterval(function(){
	tester_session();
},10000); //10 secondes
*/