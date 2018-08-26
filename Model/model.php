<?php

session_start();

function getArticle($ID) {
	require('Model/open_db.php');
	$answer=$db->prepare('
		SELECT a.titre AS title, 
		a.contenu AS content, 
		DATE_FORMAT(a.date_ecriture,"%d/%m/%Y") AS creation, 
		p.prenom AS name
		FROM article AS a 
		INNER JOIN profil AS p 
		ON a.ID_auteur=p.ID
		WHERE a.ID=:ID');
	$answer->execute(array('ID'=>$ID));
	$data=$answer->fetch();
	$answer->closeCursor();
	return $data;
}

function countArticle() {
	require('Model/open_db.php');
	$answer=$db->query('SELECT COUNT(*) AS nb_article FROM article');
	$data=$answer->fetch();
	$answer->closeCursor();
	return $data;
}

function lastArticles($beginning) {
	require('Model/open_db.php');
	$answer=$db->prepare('SELECT ID, titre FROM article ORDER BY ID DESC LIMIT :beginning ,4');
	$answer->bindValue('beginning',$beginning,PDO::PARAM_INT);
	$answer->execute();
	for ($i=0; $i < 4 ; $i++) { 
		$data=$answer->fetch();
		$info[$i]['ID']=$data['ID'];
		$info[$i]['title']=$data['titre'];
	}
	$answer->closeCursor();
	return $info;
}

function createArticle($title,$content,$ID) {
	require('../Model/open_db.php');
	$request=$db->prepare('INSERT INTO article(titre, contenu, date_ecriture, ID_auteur) VALUES(:titre, :contenu, :creation, :ID)');
	$request->execute(array(
			'titre'=>$title,
			'contenu'=>$content,
			'creation'=>date("Y-m-d"),
			'ID'=>$ID));
}

function getIDLastArticle() {
	require('../Model/open_db.php');
	$answer=$db->query('SELECT ID FROM article ORDER BY ID DESC LIMIT 1');
	$data=$answer->fetch();
	$ID=$data['ID'];
	return $ID;
}

function verifConnexion($mail,$password) {
	require('../Model/open_db.php');
	$answer=$db->prepare('SELECT ID, nom, prenom, naissance, description FROM profil WHERE mail=:mail AND mdp=:mdp');
	$answer->execute(array('mail'=>$mail,'mdp'=>$password));
	//$answer=$db->query('SELECT ID, nom, prenom, naissance, description FROM profil WHERE mail=\''.$mail.'\' AND mdp=\''.$password.'\'');
	if ($data=$answer->fetch()) { //Si la requête a bien pu récupérer le profil et donc que le mail et le mdp concordent avec un profil existant
		//On distribue les données dans la session
		return $data;
	}
	return null;
}

function updateProfile($family_name,$name,$mail,$birth,$presentation) {
	require('../Model/open_db.php');
	$request=$db->prepare('UPDATE profil SET prenom=:prenom, nom=:nom, mail=:mail, naissance=:naissance, description=:description WHERE ID=:ID');
	$request->execute(array(
		'prenom'=>$name,
		'nom'=>$family_name,
		'mail'=>$mail,
		'naissance'=>$birth,
		'description'=>$presentation,
		'ID'=>$_SESSION['ID']
	));
	$_SESSION['nom']=$family_name;
	$_SESSION['prenom']=$name;
	$_SESSION['mail']=$mail;
	$_SESSION['naissance']=$birth;
	$_SESSION['presentation']=$presentation;
}

function updatePassword($password) {
	require('../Model/open_db.php');
	$request=$db->prepare('UPDATE profil SET mdp=:mdp WHERE ID=:ID');
	$request->execute(array('mdp'=>$password,'ID'=>$_SESSION['ID']));
	$_SESSION['mdp']=$password;
}

function registration($family_name,$name,$mail,$birth,$password,$presentation) {
	require('../Model/open_db.php');
	$request=$db->prepare('INSERT INTO profil(prenom, nom, mail, naissance, mdp, description) VALUES(:name, :family_name, :mail, :birth, :password, :description)');
	$request->execute(array(
			'name'=>$name,
			'family_name'=>$family_name,
			'mail'=>$mail,
			'birth'=>$birth,
			'password'=>$password,
			'description'=>$presentation));
}

function getIdUser($mail) {
	require('../Model/open_db.php');
	$answer=$db->prepare('SELECT ID FROM profil WHERE mail=:mail');
	$answer->execute(array('mail'=>$mail));
	$data=$answer->fetch();
	$ID=$data['ID'];
	return $ID;
}

function ArticleExist($ID) {
	require('Model/open_db.php');
	$answer=$db->query('SELECT ID FROM article');
	$i=0;
	while ($data=$answer->fetch()) {
		$authorized[$i]=$data['ID'];
		$i++;
	}
	if (in_array($ID, $authorized)) {
		return true;
	} else {
		return false;
	}
}

function getComments($ID_post,$condition) {
	if($condition==1) {
		require('../Model/open_db.php');
	}
	else if($condition==2) {
		require('Model/open_db.php');
	}
	$answer=$db->prepare('SELECT c.content AS content, DATE_FORMAT(c.dateCom,"%d/%m/%Y") AS dateCom, p.prenom AS name, p.nom AS family_name
		FROM commentaire AS c 
							INNER JOIN profil AS p
							ON p.ID=c.ID_user
							WHERE ID_post=:ID_post ORDER BY c.ID DESC');
	$answer->execute(array('ID_post'=>$ID_post));
	$i=0;
	
	while ($data=$answer->fetch()) {
		$info[$i]['content']=$data['content'];
		$info[$i]['name']=$data['name'];
		$info[$i]['family_name']=$data['family_name'];
		$info[$i]['dateCom']=$data['dateCom'];
		$i++;
	}
	if(!isset($info)) {
		$info=0;
	}
	return $info;

}

function writeComment($ID_user,$comment,$ID_post) {
	require('../Model/open_db.php');
	$request=$db->prepare('INSERT INTO commentaire(content, dateCom, ID_user, ID_post) VALUES (:content, :dateCom, :ID_user, :ID_post)');
	$request->execute(array(
			'content'=>$comment,
			'dateCom'=>date("Y-m-d"),
			'ID_user'=>$ID_user,
			'ID_post'=>$ID_post));
}


?>