<?php
session_start();

require('../Model/model.php');

if (isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['naissance']) AND isset($_POST['mail']) AND isset($_POST['presentation'])) {
			//On écrit les nouvelles données dans la table profil de la bdd
	updateProfile($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['naissance'],$_POST['presentation']);
}

//Si le mot de passe est modifié
if (isset($_POST['mdp'])) {
	$mdp=hash('sha256',$_POST['mdp'],false);
	updatePassword($mdp);
}

			//On retourne sur la page du profil
header('Location: ../index.php?action=Profil');

?>