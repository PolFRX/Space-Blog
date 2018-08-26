<?php
session_start();

require('../Model/model.php');

if (isset($_POST['mail']) AND isset($_POST['mdp'])) {
	//On simplifie les variables
	$mail=$_POST['mail'];
	$mdp=hash('sha256',$_POST['mdp'],false);
	//On essaye le profil de la personne
	if ($data=verifConnexion($mail,$mdp)) {
		$_SESSION['nom']=$data['nom'];
		$_SESSION['prenom']=$data['prenom'];
		$_SESSION['mail']=$mail;
		$_SESSION['naissance']=$data['naissance'];
		$_SESSION['mdp']=$mdp;
		$_SESSION['presentation']=$data['description'];
		$_SESSION['ID']=$data['ID'];
		header('Location: ../index.php');
	}
	else {
	echo 'no';
}
	
}
else {
	echo 'no';
}




?>