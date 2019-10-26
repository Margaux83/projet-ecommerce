<?php
// Début de la SESSION
session_start();
// Inclusion de la classe "inscriManager.php"
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/inscriManager.php');

// Vérification des accès a la page
if(empty($_COOKIE['id'])) {
    $erreur = new inscriManager();
    $erreur->setMessage('Vous ête déjà déconnecté','index.php');
}else{
// Creation d'un nouvel objet "deco" de type "inscriManager"
$deco = new inscriManager();
// Execution de la fonction "deconnexion"
$deco->deconnexion();
}
 ?>
