<?php
try { //on ouvre la bdd
	 $db=new PDO('mysql:host=localhost;dbname=espace;charset=utf8','root','');
} catch(Exception $e) {
	 die('Erreur: '.$e->getMessage()); //Il y a une erreur d'ouverture
}
?>