<?php

require('model/model.php');

function Accueil() {
	require('View/Accueil.php');
}

function Article() {
	//On vérifie si l'article existe
	if(ArticleExist($_GET['ID'])) {
		$data=getArticle($_GET['ID']);
		require('View/Article.php');
	}
	else {
		NotFound('Article non trouvé');
	}
}

function Articles() {
	require('View/Articles.php');
}

function Article_creation() {
	require('View/Article_creation.php');
}

function Connexion() {
	require('View/Connexion.php');
}

function Deconnexion() {
	require('Forms/traitement_deconnexion.php');
}

function Profil() {
	require('View/Profil.php');
}

function Inscription() {
	require('View/Inscription.php');
}

function NotFound($message_erreur) {
	require('View/404.php');
}


?>