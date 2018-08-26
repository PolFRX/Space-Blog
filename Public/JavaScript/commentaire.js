$(function() {
	afficherCom();

	$('#submit').click(function() { 
		var id= $('#id_post').text();
		var comment= $('#Comment').val();
		$.post('Forms/traitement_commentaire.php',{'ID_post':id,'NewComment':comment});
		afficherCom();
		$('#Comment').val('');
	});

	function afficherCom() {
		$('#commentaires').val('');
		$('#commentaires').load('Public/JavaScript/commentaires.htm');
	}

	setInterval(afficherCom, 4000);

});