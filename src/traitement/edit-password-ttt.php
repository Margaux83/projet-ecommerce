<?php
session_start();
// Inclusion de la classe "inscriManager.php" et "classinscri.php"
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/classinscri.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/inscriManager.php');
//si les champs "mdp" et "newmdp" sont vides, on envoie un message d'erreur
if(empty($_POST['mdp']) || empty($_POST['newmdp'])){
    $erreur = new inscriManager();
    $erreur->setMessage('Formulaire incomplet','src/view/edit-profile.php');
}
else{
if($_POST['mdp'] == $_POST['newmdp']){
  // Creation d'un nouvel objet "Inscription" de type "personne" avec l'envoie de "newmdp"
$personne = new Inscription([
  'newmdp' => $_POST['newmdp']]);

// Creation d'un nouvel objet "inscriManager" de type "manager"
$manager= new inscriManager();
// Execution de la fonction "editpassword"
$manager->editpassword($personne);

header("location: /snowboarding/src/view/user-profile.php");

}
else{
  $erreur = new inscriManager();
  $erreur->setMessage('Les mots de passe ne sont pas identiques','src/view/edit-profile.php');
}
}
