<!DOCTYPE HTML>
<html>
<head>
<title>Produits</title>
<meta charset="utf-8">
<link href="../../../css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="../../../css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="../../../js/jquery.min.js"></script>
<?php include "../../app/script.php"; ?>
<?php include "../../app/header.php"; ?>

</head>


<body>
     <div class="main">

<div class="shop_top">
  <div class="container">
    <button type="button" class="btn_form"><a href="javascript:history.go(-1)">Retour</a></button>
    <?php if(isset($_POST['shop'])){ ?>
  <form action="/snowboarding/src/view/Shop/shop.php" method="post">
    <button type="submit" name="prixasc" class="btn_form" href="/snowboarding/src/view/Shop/shop.php">Prix croissant</button>
    <button type="submit" name="prixdesc" class="btn_form" href="/snowboarding/src/view/Shop/shop.php">Prix décroissant</button>
  </form>
    <?php } ?>

    <?php if(isset($_POST['t-shirt'])){ ?>
  <form action="/snowboarding/src/view/Shop/shop.php" method="post">
    <button type="submit" name="t-shirtasc" class="btn_form" href="/snowboarding/src/view/Shop/shop.php">Prix croissant</button>
    <button type="submit" name="t-shirtdesc" class="btn_form" href="/snowboarding/src/view/Shop/shop.php">Prix décroissant</button>
  </form>
    <?php } ?>

    <?php if(isset($_POST['pantalon'])){ ?>
  <form action="/snowboarding/src/view/Shop/shop.php" method="post">
    <button type="submit" name="pantalonasc" class="btn_form" href="/snowboarding/src/view/Shop/shop.php">Prix croissant</button>
    <button type="submit" name="pantalondesc" class="btn_form" href="/snowboarding/src/view/Shop/shop.php">Prix décroissant</button>
  </form>
    <?php } ?>

    <?php if(isset($_POST['chaussures'])){ ?>
  <form action="/snowboarding/src/view/Shop/shop.php" method="post">
    <button type="submit" name="chaussuresasc" class="btn_form" href="/snowboarding/src/view/Shop/shop.php">Prix croissant</button>
    <button type="submit" name="chaussuresdesc" class="btn_form" href="/snowboarding/src/view/Shop/shop.php">Prix décroissant</button>
  </form>
    <?php } ?>

    <?php if(isset($_POST['accessoires'])){ ?>
  <form action="/snowboarding/src/view/Shop/shop.php" method="post">
    <button type="submit" name="accessoiresasc" class="btn_form" href="/snowboarding/src/view/Shop/shop.php">Prix croissant</button>
    <button type="submit" name="accessoiresdesc" class="btn_form" href="/snowboarding/src/view/Shop/shop.php">Prix décroissant</button>
  </form>
    <?php } ?>

    <?php if(isset($_POST['soldes'])){ ?>
  <form action="/snowboarding/src/view/Shop/shop.php" method="post">
    <button type="submit" name="soldesasc" class="btn_form" href="/snowboarding/src/view/Shop/shop.php">Prix croissant</button>
    <button type="submit" name="soldesdesc" class="btn_form" href="/snowboarding/src/view/Shop/shop.php">Prix décroissant</button>
  </form>
    <?php } ?>

<!------------SECTION "TOUS LES ARTICLES"--------->
      <?php
      if(isset($_POST['shop'])){
      require_once ('../../app/connexionPDO.php');
      include "../../model/classItems.php";
      include "../../model/itemsManager.php";

      // Inclusion de la classe "achat_manager.php" et "achat_manager"


        // Creation d'un nouvel objet "achat" de type "achat_manager"
      $items = new itemsManager();
      // Execution de la fonction "achat"
      $result=$items->afficheAllItems();


      ?>
<div class="row ">
      <?php foreach ($result as $donnees){ ?>



				<div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
					<img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
					<span class="new-box">
						<span class="new-label">Nouveau</span>
					</span>
          <?php if($donnees['Solde'] == 1) { ?>
					<span class="sale-box">
						<span class="sale-label">Solde !</span>
					</span>
          <?php } ?>
					<div class="shop_desc">
						<h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
						<p><?php echo $donnees['Description'] ?></p>
            <?php if($donnees['Solde'] == 1) { ?>
						<span class="reducedfrom"><?php echo $donnees['Prix_solde'] ?>€</span>
            	<span class="actual"><?php echo $donnees['Prix'] ?>€</span><br>
          <?php }
           elseif($donnees['Solde'] != 1){ ?>
          	<span class="actual"><?php echo $donnees['Prix'] ?>€</span><br> <?php } ?>

						<ul class="buttons">
							<li class="cart"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">Voir plus</a></li>
					    </ul>
				    </div>
				</div>

<?php } }?>
</div>
</div>
<!------------ FIN SECTION "TOUS LES ARTICLES"--------->

<!------------SECTION "T-SHIRTS"--------->
<div class="container">
<?php
if(isset($_POST['t-shirt'])){
  require_once ('../../app/connexionPDO.php');
  include "../../model/classItems.php";
  include "../../model/itemsManager.php";
$items = new itemsManager();
$m=$items->AfficheTshirtItems();?>
<div class="row ">
<?php   foreach ($m as $donnees){ ?>



<div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
<img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
<span class="new-box">
  <span class="new-label">Nouveau</span>
</span>
<?php if($donnees['Solde'] == 1) { ?>
<span class="sale-box">
  <span class="sale-label">Solde !</span>
</span>
<?php } ?>
<div class="shop_desc">
  <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
  <p><?php echo $donnees['Description'] ?></p>
  <?php if($donnees['Solde'] == 1) { ?>
  <span class="reducedfrom"><?php echo $donnees['Prix_solde'] ?>€</span>
    <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br>
<?php }
 elseif($donnees['Solde'] != 1){ ?>
  <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br> <?php } ?>

  <ul class="buttons">
    <li class="cart"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">Voir plus</a></li>
    </ul>
  </div>
</div>

<?php } }?>
		 </div>
     </div>
<!------------FIN SECTION "T-SHIRTS"--------->

<!------------SECTION "PANTALONS"--------->
<div class="container">
<?php
if(isset($_POST['pantalon'])){
require_once ('../../app/connexionPDO.php');
include "../../model/classItems.php";
include "../../model/itemsManager.php";
$items = new itemsManager();
$m=$items->AffichePantalonItems();?>
<div class="row ">
<?php   foreach ($m as $donnees){ ?>



<div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
<img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
<span class="new-box">
  <span class="new-label">Nouveau</span>
</span>
<?php if($donnees['Solde'] == 1) { ?>
<span class="sale-box">
  <span class="sale-label">Solde !</span>
</span>
<?php } ?>
<div class="shop_desc">
  <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
  <p><?php echo $donnees['Description'] ?></p>
  <?php if($donnees['Solde'] == 1) { ?>
  <span class="reducedfrom"><?php echo $donnees['Prix_solde'] ?>€</span>
    <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br>
<?php }
 elseif($donnees['Solde'] != 1){ ?>
  <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br> <?php } ?>

  <ul class="buttons">
    <li class="cart"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">Voir plus</a></li>
    </ul>
  </div>
</div>

<?php } }?>
</div>
  </div>
<!------------FIN SECTION "PANTALONS"--------->

<!------------SECTION "CHAUSSURES"--------->
<div class="container">
     <?php
     if(isset($_POST['chaussures'])){
     require_once ('../../app/connexionPDO.php');
     include "../../model/classItems.php";
     include "../../model/itemsManager.php";
$items = new itemsManager();
 $m=$items->AfficheChaussuresItems();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">Nouveau</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Solde !</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix_solde'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br>
     <?php }
      elseif($donnees['Solde'] != 1){ ?>
       <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br> <?php } ?>

       <ul class="buttons">
         <li class="cart"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">Voir plus</a></li>
         </ul>
       </div>
   </div>

<?php } }?>
	   </div>
       </div>
<!------------ FIN SECTION "CHAUSSURES"--------->

<!------------SECTION "ACCESSOIRES"--------->
<div class="container">
     <?php
     if(isset($_POST['accessoires'])){
     require_once ('../../app/connexionPDO.php');
     include "../../model/classItems.php";
     include "../../model/itemsManager.php";
$items = new itemsManager();
 $m=$items->afficheAccessoiresItems();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">Nouveau</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Solde !</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix_solde'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br>
     <?php }
      elseif($donnees['Solde'] != 1){ ?>
       <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br> <?php } ?>

       <ul class="buttons">
         <li class="cart"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">Voir plus</a></li>
         </ul>
       </div>
   </div>

<?php } }?>
	   </div>
       </div>
<!------------ FIN SECTION "ACCESSOIRES"--------->

<!------------SECTION "SOLDES"--------->
<div class="container">
     <?php
     if(isset($_POST['soldes'])){
     require_once ('../../app/connexionPDO.php');
     include "../../model/classItems.php";
     include "../../model/itemsManager.php";
$items = new itemsManager();
 $m=$items->afficheSoldeItems();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">Nouveau</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Solde !</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix_solde'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br>
     <?php }
      elseif($donnees['Solde'] != 1){ ?>
       <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br> <?php } ?>

       <ul class="buttons">
         <li class="cart"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">Voir plus</a></li>
         </ul>
       </div>
   </div>

<?php } }?>
	   </div>
       </div>
<!------------ FIN SECTION "SOLDES"--------->

<!------------SECTION "PRIX CROISSANT"--------->
<div class="container">
     <?php
     if(isset($_POST['prixasc'])){
     require_once ('../../app/connexionPDO.php');
     include "../../model/classItems.php";
     include "../../model/itemsManager.php";
$items = new itemsManager();
 $m=$items->afficheAllItemsAsc();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">Nouveau</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Solde !</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix_solde'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br>
     <?php }
      elseif($donnees['Solde'] != 1){ ?>
       <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br> <?php } ?>

       <ul class="buttons">
         <li class="cart"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">Voir plus</a></li>
         </ul>
       </div>
   </div>

<?php } }?>
	   </div>
       </div>
<!------------ FIN SECTION "PRIX CROISSANT"--------->

<!------------SECTION "PRIX DECROISSANT"--------->
<div class="container">
     <?php
     if(isset($_POST['prixdesc'])){
     require_once ('../../app/connexionPDO.php');
     include "../../model/classItems.php";
     include "../../model/itemsManager.php";
$items = new itemsManager();
 $m=$items->afficheAllItemsDesc();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">Nouveau</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Solde !</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix_solde'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br>
     <?php }
      elseif($donnees['Solde'] != 1){ ?>
       <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br> <?php } ?>

       <ul class="buttons">
         <li class="cart"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">Voir plus</a></li>
         </ul>
       </div>
   </div>

<?php } }?>
	   </div>
       </div>
<!------------ FIN SECTION "PRIX DECROISSANT"--------->

<!------------SECTION "T-SHIRT PRIX CROISSANT"--------->
<div class="container">
     <?php
     if(isset($_POST['t-shirtasc'])){
     require_once ('../../app/connexionPDO.php');
     include "../../model/classItems.php";
     include "../../model/itemsManager.php";
$items = new itemsManager();
 $m=$items->afficheTshirtItemsAsc();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">Nouveau</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Solde !</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix_solde'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br>
     <?php }
      elseif($donnees['Solde'] != 1){ ?>
       <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br> <?php } ?>

       <ul class="buttons">
         <li class="cart"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">Voir plus</a></li>
         </ul>
       </div>
   </div>

<?php } }?>
	   </div>
       </div>
<!------------ FIN SECTION "T-SHIRT PRIX CROISSANT"--------->

<!------------SECTION "T-SHIRT PRIX DECROISSANT"--------->
<div class="container">
     <?php
     if(isset($_POST['t-shirtdesc'])){
     require_once ('../../app/connexionPDO.php');
     include "../../model/classItems.php";
     include "../../model/itemsManager.php";
$items = new itemsManager();
 $m=$items->afficheTshirtItemsDesc();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">Nouveau</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Solde !</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix_solde'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br>
     <?php }
      elseif($donnees['Solde'] != 1){ ?>
       <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br> <?php } ?>

       <ul class="buttons">
         <li class="cart"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">Voir plus</a></li>
         </ul>
       </div>
   </div>

<?php } }?>
	   </div>
       </div>
<!------------ FIN SECTION "T-SHIRT PRIX DECROISSANT"--------->

<!------------SECTION "PANTALON PRIX CROISSANT"--------->
<div class="container">
     <?php
     if(isset($_POST['pantalonasc'])){
     require_once ('../../app/connexionPDO.php');
     include "../../model/classItems.php";
     include "../../model/itemsManager.php";
$items = new itemsManager();
 $m=$items->affichePantalonItemsAsc();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">Nouveau</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Solde !</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix_solde'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br>
     <?php }
      elseif($donnees['Solde'] != 1){ ?>
       <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br> <?php } ?>

       <ul class="buttons">
         <li class="cart"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">Voir plus</a></li>
         </ul>
       </div>
   </div>

<?php } }?>
	   </div>
       </div>
<!------------ FIN SECTION "PANTALON PRIX CROISSANT"--------->

<!------------SECTION "PANTALON PRIX DECROISSANT"--------->
<div class="container">
     <?php
     if(isset($_POST['pantalondesc'])){
     require_once ('../../app/connexionPDO.php');
     include "../../model/classItems.php";
     include "../../model/itemsManager.php";
$items = new itemsManager();
 $m=$items->affichePantalonItemsDesc();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">Nouveau</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Solde !</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix_solde'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br>
     <?php }
      elseif($donnees['Solde'] != 1){ ?>
       <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br> <?php } ?>

       <ul class="buttons">
         <li class="cart"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">Voir plus</a></li>
         </ul>
       </div>
   </div>

<?php } }?>
	   </div>
       </div>
<!------------ FIN SECTION "PANTALON PRIX DECROISSANT"--------->

<!------------SECTION "CHAUSSURES PRIX CROISSANT"--------->
<div class="container">
     <?php
     if(isset($_POST['chaussuresasc'])){
     require_once ('../../app/connexionPDO.php');
     include "../../model/classItems.php";
     include "../../model/itemsManager.php";
$items = new itemsManager();
 $m=$items->afficheChaussuresItemsAsc();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">Nouveau</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Solde !</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix_solde'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br>
     <?php }
      elseif($donnees['Solde'] != 1){ ?>
       <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br> <?php } ?>

       <ul class="buttons">
         <li class="cart"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">Voir plus</a></li>
         </ul>
       </div>
   </div>

<?php } }?>
	   </div>
       </div>
<!------------ FIN SECTION "CHAUSSURES PRIX CROISSANT"--------->

<!------------SECTION "CHAUSSURES PRIX DECROISSANT"--------->
<div class="container">
     <?php
     if(isset($_POST['chaussuresdesc'])){
     require_once ('../../app/connexionPDO.php');
     include "../../model/classItems.php";
     include "../../model/itemsManager.php";
$items = new itemsManager();
 $m=$items->afficheChaussuresItemsDesc();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">Nouveau</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Solde !</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix_solde'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br>
     <?php }
      elseif($donnees['Solde'] != 1){ ?>
       <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br> <?php } ?>

       <ul class="buttons">
         <li class="cart"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">Voir plus</a></li>
         </ul>
       </div>
   </div>

<?php } }?>
	   </div>
       </div>
<!------------ FIN SECTION "CHAUSSURES PRIX DECROISSANT"--------->

<!------------SECTION "ACCESSOIRES PRIX CROISSANT"--------->
<div class="container">
     <?php
     if(isset($_POST['accessoiresasc'])){
     require_once ('../../app/connexionPDO.php');
     include "../../model/classItems.php";
     include "../../model/itemsManager.php";
$items = new itemsManager();
 $m=$items->afficheAccessoiresItemsAsc();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">Nouveau</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Solde !</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix_solde'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br>
     <?php }
      elseif($donnees['Solde'] != 1){ ?>
       <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br> <?php } ?>

       <ul class="buttons">
         <li class="cart"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">Voir plus</a></li>
         </ul>
       </div>
   </div>

<?php } }?>
	   </div>
       </div>
<!------------ FIN SECTION "ACCESSOIRES PRIX CROISSANT"--------->

<!------------SECTION "ACCESSOIRES PRIX DECROISSANT"--------->
<div class="container">
     <?php
     if(isset($_POST['accessoiresdesc'])){
     require_once ('../../app/connexionPDO.php');
     include "../../model/classItems.php";
     include "../../model/itemsManager.php";
$items = new itemsManager();
 $m=$items->afficheAccessoiresItemsDesc();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">Nouveau</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Solde !</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix_solde'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br>
     <?php }
      elseif($donnees['Solde'] != 1){ ?>
       <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br> <?php } ?>

       <ul class="buttons">
         <li class="cart"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">Voir plus</a></li>
         </ul>
       </div>
   </div>

<?php } }?>
	   </div>
       </div>
<!------------ FIN SECTION "ACCESSOIRES PRIX DECROISSANT"--------->

<!------------SECTION "SOLDES PRIX CROISSANT"--------->
<div class="container">
     <?php
     if(isset($_POST['soldesasc'])){
     require_once ('../../app/connexionPDO.php');
     include "../../model/classItems.php";
     include "../../model/itemsManager.php";
$items = new itemsManager();
 $m=$items->afficheSoldeItemsAsc();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">Nouveau</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Solde !</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix_solde'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br>
     <?php }
      elseif($donnees['Solde'] != 1){ ?>
       <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br> <?php } ?>

       <ul class="buttons">
         <li class="cart"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">Voir plus</a></li>
         </ul>
       </div>
   </div>

<?php } }?>
	   </div>
       </div>
<!------------ FIN SECTION "SOLDES PRIX CROISSANT"--------->

<!------------SECTION "SOLDES PRIX DECROISSANT"--------->
<div class="container">
     <?php
     if(isset($_POST['soldesdesc'])){
     require_once ('../../app/connexionPDO.php');
     include "../../model/classItems.php";
     include "../../model/itemsManager.php";
$items = new itemsManager();
 $m=$items->afficheSoldeItemsDesc();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">Nouveau</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Solde !</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix_solde'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br>
     <?php }
      elseif($donnees['Solde'] != 1){ ?>
       <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br> <?php } ?>

       <ul class="buttons">
         <li class="cart"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">Voir plus</a></li>
         </ul>
       </div>
   </div>

<?php } }?>
	   </div>
       </div>
<!------------ FIN SECTION "SOLDES PRIX DECROISSANT"--------->

<!------------SECTION "RESULTAT RECHERCHE"--------->
<div class="container">
     <?php
     if(isset($_GET['search'])){
     require_once ('../../app/connexionPDO.php');
     include "../../model/classItems.php";
     include "../../model/itemsManager.php";
$items = new itemsManager();
 $m=$items->RechercheItems();
 if($m == null){
?>
<div class="container">
<div class="row ">
<h3>Aucun résultat</h3>
 <p>Aucun résultat ne correspont à votre recherche.</p><br><br><br>
 </div>
  </div>
<?php } elseif($m != null) { ?>

<div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">Nouveau</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Solde !</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix_solde'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br>
     <?php }
      elseif($donnees['Solde'] != 1){ ?>
       <span class="actual"><?php echo $donnees['Prix'] ?>€</span><br> <?php } ?>

       <ul class="buttons">
         <li class="cart"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">Voir plus</a></li>
         </ul>
       </div>
   </div>

<?php } } }?>
	   </div>
       </div>
<!------------ FIN SECTION "RESULTAT RECHERCHE"--------->
</div>
	<?php include "../../app/footer.php" ?>
</body>
</html>
