<?php
require('Controler/controler.php');

try {
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'Articles') {
        Articles();
    }
    elseif ($_GET['action'] == 'Article') {
        if (isset($_GET['ID']) && $_GET['ID'] > 0) {
            Article();
        }
        else {
            throw new Exception('Article non trouvé');
        }
    }
    elseif ($_GET['action'] == 'Article_creation') {
        if (isset($_SESSION['mail'])) {
            Article_creation();
        }
        else {
            Connexion();
        }
    }
    elseif ($_GET['action'] == 'Connexion') {
        if (isset($_SESSION['mail'])) {
            Accueil();
        }
        else {
            Connexion();
        }
    }
     elseif ($_GET['action'] == 'Deconnexion') {
        if (isset($_SESSION['mail'])) {
            Deconnexion();
        }
        else {
            Accueil();
        }
    }
     elseif ($_GET['action'] == 'Profil') {
        if (isset($_SESSION['mail'])) {
            Profil();
        }
        else {
            Connexion();
        }
    }
    elseif ($_GET['action'] == 'Inscription') {
        if (isset($_SESSION['mail'])) {
            Accueil();
        }
        else {
            Inscription();
        }
    }
    else {
        throw new Exception('Page demandée non existante');
    }
}
else {
	Accueil();
}
} catch(Exception $e) {
    NotFound($e->getMessage());
}