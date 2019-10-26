<?php

// Inclusion de la classe "contactManager.php" et "classContact.php"
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/classContact.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/contactManager.php');
if(empty($_POST['nom']) || empty($_POST['email']) || empty($_POST['msg'])){
  session_start();
  $_SESSION['message']='Formulaire incomplet';
      header('location: /snowboarding/src/view/contact.php');
}
else{
  // Creation d'un nouvel objet "contact" de type "infos" avec l'envoie de "nom", "email", "sujet" et "message"
  $infos= new Contact([

      'nom' => $_POST['nom'],
      'email' => $_POST['email'],
      'sujet' => $_POST['sujet'],
      'msg' => $_POST['msg']
    ]);

      // Creation d'un nouvel objet "contactManager" de type "contact"
      $contact = new contactManager();
      // Execution de la fonction "addMsg"
      $contact->addMsg($infos);

    }
?>
