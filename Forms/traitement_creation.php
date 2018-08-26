<?php
session_start(); //On ouvre la session pour pouvoir modifier les variables

require('../Model/model.php');

//On vérifie que le fichier est conforme: extension, taille<=10Mo, existe, pas d'erreur
$verif=array('png','jpg','jpeg','gif');



if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0 AND $_FILES['photo']['size'] <= 10000000) {
	$info_fichier=pathinfo($_FILES['photo']['name']);
	$extension=$info_fichier['extension'];
	if (in_array($extension, $verif)) { //Si l'extension est bien dans les extensions autorisées
	if (isset($_POST['titre']) AND isset($_POST['contenu'])) {
		//On écrit les données du nouvel article dans la table article de la bdd
		createArticle($_POST['titre'],$_POST['contenu'],$_SESSION['ID']);
			//On stocke la photo dans l'espace prévue en prenant l'ID comme nom
		$ID=getIDLastArticle();
		$nom='../Public/photo_article/'.$ID.'.jpg';
		move_uploaded_file($_FILES['photo']['tmp_name'], $nom);

			//On va à la page de l'article
			//header('Location: ../index.php');
		echo "reussi";
		header('Location: ../index.php?action=Article&ID='.$ID);
	} else {
	//Si il y a une erreur, on retourne à la page de création
		header('Location: ../index.php?action=Article_creation');
	}
} else {
	//Si il y a une erreur, on retourne à la page de création
	header('Location: ../index.php?action=Article_creation');
}
} else {
	//Si il y a une erreur, on retourne à la page de création
	header('Location: ../index.php?action=Article_creation');
}


?>