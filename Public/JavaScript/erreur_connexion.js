$(function() {

	$('#submit').click(function() {
		var mail=$('#mail').val();
		var mdp=$('#mdp').val();
		$.post('Forms/traitement_connexion.php',{'mail':mail,'mdp':mdp}, function(data) {
			var verif=data;
			if(verif=='no') {
				if(!($('#input_mail').hasClass('has-error'))) {
					$('#input_mail').addClass('has-error');
					$('#input_mdp').addClass('has-error');
				}
				alert('Adresse mail ou mot de passe erroné.');
			}
			else {
				var class_mail=$('#input_mail').attr('class');
				var class_mdp=$('#input_mdp').attr('class');
				if($('#input_mail').hasClass('has-error')) {
					$('#input_mail').removeClass('has-error');
					$('#input_mdp').removeClass('has-error');
				}
				$('#input_mail').addClass('has-success');
				$('#input_mdp').addClass('has-success');
				document.location.href="index.php";
			}

		});



	});

});