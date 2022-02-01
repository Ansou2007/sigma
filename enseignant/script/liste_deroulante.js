
		function ListeDepartement(val) {
			$.ajax({
			type: "POST",
			url: "liste_departement.php",
			data:'id_region='+val,
			success: function(data){
				$("#list_depart").html(data);
			}
			});
		}
		  function ListeCommune(val) {
			$.ajax({
			type: "POST",
			url: "liste_commune.php",
			data:'id_departement='+val,
			success: function(data){
				$("#list_comm").html(data);
			}
			});
		}
		function selectCountry(val) {
		$("#search-box").val(val);
		$("#suggesstion-box").hide();
		}