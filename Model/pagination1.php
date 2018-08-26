<?php

$data=countArticle();

$nb_article=$data['nb_article'];
$nb_page_max=ceil($nb_article/4); //On arrondit au nombre supérieur si c'est un float

if (isset($_GET['page'])) { //On vérifie que le numéro de la page est dans l'url
	$page=(int)$_GET['page'];//On convertit le page en int pour être sûr d'avoir une bonne valeur
	if($page>$nb_page_max OR $page<=0) { //On vérifie que la page indiquée n'est pas supérieure au nombre de page total et n'est pas inférieur à 0
		header('Location: index.php?action=Articles'); //Si la page n'est pas convenable, on met la page défaut
		exit();
	}
} //S'il n'y a pas de page dans l'url on prend la page 1
else {
    $page=1;
}
        	
$beginning=0+($page-1)*4;

$info=lastArticles($beginning);
?>