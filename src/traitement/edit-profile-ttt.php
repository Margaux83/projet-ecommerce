<?php
session_start();
// Inclusion de la classe "inscriManager.php" et "classinscri.php"
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/classinscri.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/inscriManager.php');
//si les champs "nom", "prenom" et email sont vides, on envoie un message d'erreur
if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email'])){
    $erreur = new inscriManager();
    $erreur->setMessage('Formulaire incomplet','src/view/edit-profile.php');
}
else{
// Creation d'un nouvel objet "Inscription" de type "personne" avec l'envoie de "nom", "prenom" et "email"
$personne = new Inscription([
  'nom' => $_POST['nom'],
  'prenom' => $_POST['prenom'],
  'email' => $_POST['email']]);

// Creation d'un nouvel objet "inscriManager" de type "manager"
$manager= new inscriManager();
// Execution de la fonction "editprofile"
$manager->editprofile($personne);
header("location: /snowboarding/src/view/user-profile.php");
}


 ?>
