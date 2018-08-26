<?php 
session_start();

require('../Model/model.php');

if (isset($_POST['ID_post']) AND isset($_POST['NewComment'])) {

	//On appelle la fonction de model pour créer un nouveau commentaire
	writeComment($_SESSION['ID'],$_POST['NewComment'],$_POST['ID_post']);

	require('enregistrement_fichier.php');
}
else {
	file_put_contents('../Public/JavaScript/commentaires.htm', 'Sale erreur');
}