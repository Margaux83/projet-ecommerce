<?php
// Début de la SESSION
session_start();
// Inclusion des classes "inscriManager.php", "classinscri.php", "purchaseManager.php" et "classPurchase.php"
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/inscriManager.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/classinscri.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/purchaseManager.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/classPurchase.php');


  if(empty($_POST['adresse']) || empty($_POST['numero']) || empty($_POST['ville']) || empty($_POST['codep']) ||
  empty($_POST['pays']) || empty($_POST['lieu']) || empty($_POST['num_carte']) || empty($_POST['expimois']) ||
  empty($_POST['expiannee']) || empty($_POST['code_secu'])){
      $erreur = new inscriManager();
      $erreur->setMessage('Formulaire incomplet','src/view/achat.php');
  }
  else{

  $manager= new inscriManager();
  // Execution de la fonction "getList"
  $result=$manager->AfficheUser();

  if($result['Adresse'] == null && $result['Ville'] == null && $result['Pays'] == null && $result['NumTel'] == null && $result['CP'] == null){
  $personne = new Inscription([
    'adresse' => $_POST['adresse'],
    'numero' => $_POST['numero'],
    'ville' => $_POST['ville'],
    'codep' => $_POST['codep'],
    'pays' => $_POST['pays']]);

    $manager= new inscriManager();
    // Execution de la fonction "AjouterUserCommande"
    $manager->AjouterUserCommande($personne);
}



$panier= new purchaseManager();
if(isset($_COOKIE['id'])){

// Creation d'un nouvel objet "commande" de type "Commande"
$commande = new Commande([
    'lieu' => $_POST['lieu'],
    'expimois' => $_POST['expimois'],
    'expiannee' => $_POST['expiannee'],
    'code_secu' => $_POST['code_secu'],
    'num_carte' => $_POST['num_carte']
  ]);

  // Execution des fonctions "addInAchat" et  "deleteAllPanier"

    $panier->addInAchat($commande);
    $panier->deleteAllPanier();

    session_start();
    $_SESSION['message']='Votre commande a été effectuée';
        header('location: /snowboarding/index.php');

}
}



?>
