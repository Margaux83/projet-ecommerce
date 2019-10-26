<?php
// Début de la SESSION
session_start();
// Inclusion de la classe "inscriManager.php" et "classinscri.php"
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/inscriManager.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/classinscri.php');
// Vérification des accès a la page
if(empty($_COOKIE['id'])) {
    $_SESSION['message'] = 'Veuillez vous connecter afin de commander';
    header('location: /snowboarding/src/view/login.php');
} elseif(isset($_GET['id'])) {
  header('location: /snowboarding/src/view/achat.php');
  }
?>
