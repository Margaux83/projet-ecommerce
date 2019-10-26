<?php
session_start();
// Inclusion de la classe "inscriManager.php" et "classinscri.php"
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/classinscri.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/inscriManager.php');

//si les champs "email" et "mdp" sont vides, on envoie un message d'erreur
if(empty($_POST['email']) || empty($_POST['mdp'])) {
    $erreur = new inscriManager();
    $erreur->setMessage('Formulaire incomplet','index.php');
}
else{
  // Creation d'un nouvel objet "Inscription" de type "personne" avec l'envoie de "email" et "mdp"
$personne = new Inscription([
  'email' => $_POST['email'],
  'mdp' => $_POST['mdp']]);

// Creation d'un nouvel objet "inscriManager" de type "manager"
$manager= new inscriManager();
// Execution de la fonction "getList"
$manager->getList($personne);
header("location: /snowboarding/index.php");
}
 ?>
