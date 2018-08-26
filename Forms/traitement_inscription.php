<?php
session_start();

//On vérifie que le fichier est conforme: extension, taille<=10Mo, existe, pas d'erreur
$verif=array('png','jpg','jpeg','gif');

require('../Model/model.php');

if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0 AND $_FILES['photo']['size'] <= 10000000) {
	$info_fichier=pathinfo($_FILES['photo']['name']);
	$extension=$info_fichier['extension'];
	if (in_array($extension, $verif)) { //Si l'extension est bien dans les extensions autorisées
	//On vérifie que les variables existent bien
		if (isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['naissance']) AND isset($_POST['mail']) AND isset($_POST['mdp']) AND isset($_POST['presentation'])) {
			//On hash le mot de passe
			$mdp=hash('sha256',$_POST['mdp'],false);
			//On écrit les données du nouvel utilisateur dans la table profil de la bdd
			registration($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['naissance'],$mdp,$_POST['presentation']);

			//On stocke la photo dans l'espace prévue en prenant l'ID comme nom
			$ID=getIdUser($_POST['mail']);
			$nom='../Public/photo_user/'.$ID.'.jpg';
			move_uploaded_file($_FILES['photo']['tmp_name'], $nom);
			//On met les variables dans $_SESSION
			$_SESSION['nom']=$_POST['nom'];
			$_SESSION['prenom']=$_POST['prenom'];
			$_SESSION['mail']=$_POST['mail'];
			$_SESSION['naissance']=$_POST['naissance'];
			$_SESSION['mdp']=$_POST['mdp'];
			$_SESSION['presentation']=$_POST['presentation'];
			$_SESSION['ID']=$ID;
			//On va à la page d'accueil
			header('Location: ../index.php');
		}
	}
}
else { //Cas où une variable n'existe pas ou qu'il y un problème
header('Location: ../index.php?action=Inscription');
}


?>