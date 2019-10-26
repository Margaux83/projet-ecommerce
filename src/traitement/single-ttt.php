<?php

// Inclusion de la classe "purchaseManager.php" et "classPurchase.php"
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/classPurchase.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/purchaseManager.php');


if(isset($_POST['panier'])){
  if(isset($_GET['id'])){
    if($_POST['taille'] == ''){
        session_start();
        $_SESSION['message']='Veuillez sélectionner une taille pour l\'article';
            header('location: /snowboarding/index.php');

    }
    else{
  // Creation d'un nouvel objet "purchase" de type "panier" avec l'envoie de "nom", "email", "sujet" et "message"
  $panier= new Purchase([
      'taille' => $_POST['taille'],
      'quantite' => $_POST['quantite']
    ]);

      // Creation d'un nouvel objet "purchaseManager" de type "purchase"
      $purchase = new purchaseManager();
      // Execution de la fonction "addInPanier"
      $purchase->addInPanier($panier);
    }
  }
    }

  elseif(isset($_POST['wishlist'])){
    if(isset($_GET['id'])){

        // Creation d'un nouvel objet "purchaseManager" de type "purchase"
        $purchase = new purchaseManager();
        // Execution de la fonction "addInWishlist"
        $purchase->addInWishlist($wishlist);
      }

}

?>
