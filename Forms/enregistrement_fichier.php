<?php

if(isset($_POST['ID_post'])) {
	//On récupère tous les commentaires de l'article
	$info=getComments($_POST['ID_post'],'1');
	$file='../Public/JavaScript/commentaires.htm';
}
else {
	$info=getComments($_GET['ID'],'2');
	$file='Public/JavaScript/commentaires.htm';
}

//On efface l'ancien fichier
file_put_contents($file, '');

//On les stocke dans un fichier htm pour pouvoir les inclure après avec AJAX avec pour conidition si $info ne vaut pas 1 qui est la valeur renvoyée par la fonction sir $info est null
if($info!=0){ 
	$nbre_comment=count($info);
	for ($i=0; $i < $nbre_comment; $i++) { 
		$ligne='<div class="col-sm-12 commentaire"><strong>'.htmlspecialchars($info[$i]['name']).' '.htmlspecialchars($info[$i]['family_name']).'</strong> le '.$info[$i]['dateCom'].'<br>'.htmlspecialchars($info[$i]['content']).'</div><br><br>';
		$text[$i]=$ligne;
	}

file_put_contents($file, $text); //On écrit le contenu du tableau $text dans le fichier commentaires.htm
}
?>