<?php
// Début de la SESSION
session_start();
// Inclusion de la classe "inscriManager.php"
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/inscriManager.php');

// Vérification des accès à la page
if(empty($_COOKIE['admin'])) {
    $erreur = new inscriManager();
    $erreur->setMessage('Vous ête déjà déconnecté','index.php');
}else{
// Creation d'un nouvel objet "deco" de type "inscriManager"
$deco = new inscriManager();
// Execution de la fonction "deconnexionadmin"
$deco->deconnexionadmin();
}
 ?>
