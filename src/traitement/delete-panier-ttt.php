<?php
session_start();
// Inclusion de la classe "purchaseManager.php" et "classPurchase.php"
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/classPurchase.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/purchaseManager.php');

if(isset($_GET['id'])){
  // Creation d'un nouvel objet "purchaseManager" de type "manager"
$manager= new purchaseManager();
// Execution de la fonction "deleteItemAchat"
$manager->deleteItemPanier($_GET['id']);
header("location: /snowboarding/index.php");

}


 ?>
