<!DOCTYPE HTML>
<html>
<head>
<title>Produits femme</title>
<meta charset="utf-8">
<link href="../../../css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="../../../css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="../../../css/responsive.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="../../../js/jquery.min.js"></script>
<?php include "../../app/script.php"; ?>
</head>
<body>
<?php include "../../app/header.php"; ?>
     <div class="main">
<div class="shop_top">
  <div class="container">
    <form action="/snowboarding/src/view/Shop/shop-femmes.php" method="post">
      <button type="button" class="btn_form"><a href="javascript:history.go(-1)">Retour</a></button>
      <button type="submit" name="t-shirt" class="btn_form">T-shirts</button>
      <button type="submit" name="pantalon" class="btn_form">Pantalons</button>
      <button type="submit" name="chaussures" class="btn_form">Chaussures</button>
      <button type="submit" name="accessoires" class="btn_form">Accessoires</button>
      <button type="submit" name="soldes" class="btn_form">Soldes</button>
      </form>
    <?php if(isset($_POST['femme'])){ ?>
  <form action="/snowboarding/src/view/Shop/shop-femmes.php" method="post">
    <button type="submit" name="prixasc" class="btn_form">Prix croissant</button>
    <button type="submit" name="prixdesc" class="btn_form">Prix décroissant</button>
  </form>
    <?php } ?>

    <?php if(isset($_POST['t-shirt'])){ ?>
  <form action="/snowboarding/src/view/Shop/shop-femmes.php" method="post">
    <button type="submit" name="t-shirtasc" class="btn_form">Prix croissant</button>
    <button type="submit" name="t-shirtdesc" class="btn_form">Prix décroissant</button>
  </form>
    <?php } ?>

    <?php if(isset($_POST['pantalon'])){ ?>
  <form action="/snowboarding/src/view/Shop/shop-femmes.php" method="post">
    <button type="submit" name="pantalonasc" class="btn_form">Prix croissant</button>
    <button type="submit" name="pantalondesc" class="btn_form">Prix décroissant</button>
  </form>
    <?php } ?>

    <?php if(isset($_POST['chaussures'])){ ?>
  <form action="/snowboarding/src/view/Shop/shop-femmes.php" method="post">
    <button type="submit" name="chaussuresasc" class="btn_form">Prix croissant</button>
    <button type="submit" name="chaussuresdesc" class="btn_form">Prix décroissant</button>
  </form>
    <?php } ?>

    <?php if(isset($_POST['accessoires'])){ ?>
  <form action="/snowboarding/src/view/Shop/shop-femmes.php" method="post">
    <button type="submit" name="accessoiresasc" class="btn_form">Prix croissant</button>
    <button type="submit" name="accessoiresdesc" class="btn_form">Prix décroissant</button>
  </form>
    <?php } ?>

    <?php if(isset($_POST['soldes'])){ ?>
  <form action="/snowboarding/src/view/Shop/shop-femmes.php" method="post">
    <button type="submit" name="soldesasc" class="btn_form">Prix croissant</button>
    <button type="submit" name="soldesdesc" class="btn_form">Prix décroissant</button>
  </form>
    <?php } ?>

<!------------SECTION "TOUS LES ARTICLES"--------->
      <?php
      if(isset($_POST['femme'])){
      require_once ('../../app/connexionPDO.php');
      include "../../model/classItems.php";
      include "../../model/itemsManager.php";

      // Inclusion de la classe "achat_manager.php" et "achat_manager"


        // Creation d'un nouvel objet "achat" de type "achat_manager"
      $items = new itemsManager();
      // Execution de la fonction "achat"
      $result=$items->afficheAllItemsFemme();


      ?>
<div class="row ">
      <?php foreach ($result as $donnees){ ?>



				<div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
					<img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
					<span class="new-box">
						<span class="new-label">New</span>
					</span>
          <?php if($donnees['Solde'] == 1) { ?>
					<span class="sale-box">
						<span class="sale-label">Sale!</span>
					</span>
          <?php } ?>
					<div class="shop_desc">
						<h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
						<p><?php echo $donnees['Description'] ?></p>
            <?php if($donnees['Solde'] == 1) { ?>
						<span class="reducedfrom"><?php echo $donnees['Prix'] ?>€</span>
            	<span class="actual"><?php echo $donnees['Prix_solde'] ?>€</span><br>
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
$m=$items->afficheTshirtFemmeItems();?>
<div class="row ">
<?php   foreach ($m as $donnees){ ?>



<div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
<img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
<span class="new-box">
  <span class="new-label">New</span>
</span>
<?php if($donnees['Solde'] == 1) { ?>
<span class="sale-box">
  <span class="sale-label">Sale!</span>
</span>
<?php } ?>
<div class="shop_desc">
  <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
  <p><?php echo $donnees['Description'] ?></p>
  <?php if($donnees['Solde'] == 1) { ?>
  <span class="reducedfrom"><?php echo $donnees['Prix'] ?>€</span>
    <span class="actual"><?php echo $donnees['Prix_solde'] ?>€</span><br>
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
$m=$items->affichePantalonFemmeItems();?>
<div class="row ">
<?php   foreach ($m as $donnees){ ?>



<div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
<img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
<span class="new-box">
  <span class="new-label">New</span>
</span>
<?php if($donnees['Solde'] == 1) { ?>
<span class="sale-box">
  <span class="sale-label">Sale!</span>
</span>
<?php } ?>
<div class="shop_desc">
  <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
  <p><?php echo $donnees['Description'] ?></p>
  <?php if($donnees['Solde'] == 1) { ?>
  <span class="reducedfrom"><?php echo $donnees['Prix'] ?>€</span>
    <span class="actual"><?php echo $donnees['Prix_solde'] ?>€</span><br>
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
 $m=$items->afficheChaussuresFemmeItems();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">New</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Sale!</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix_solde'] ?>€</span><br>
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
       <span class="new-label">New</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Sale!</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix_solde'] ?>€</span><br>
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
 $m=$items->afficheSoldeFemmeItems();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">New</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Sale!</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix_solde'] ?>€</span><br>
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
 $m=$items->afficheAllItemsFemmeAsc();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">New</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Sale!</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix_solde'] ?>€</span><br>
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
 $m=$items->afficheAllItemsFemmeDesc();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">New</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Sale!</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix_solde'] ?>€</span><br>
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
 $m=$items->afficheTshirtFemmeItemsAsc();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">New</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Sale!</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix_solde'] ?>€</span><br>
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
 $m=$items->afficheTshirtFemmeItemsDesc();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">New</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Sale!</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix_solde'] ?>€</span><br>
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
 $m=$items->affichePantalonFemmeItemsAsc();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">New</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Sale!</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix_solde'] ?>€</span><br>
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
 $m=$items->affichePantalonFemmeItemsDesc();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">New</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Sale!</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix_solde'] ?>€</span><br>
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
 $m=$items->afficheChaussuresFemmeItemsAsc();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">New</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Sale!</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix_solde'] ?>€</span><br>
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
 $m=$items->afficheChaussuresFemmeItemsDesc();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">New</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Sale!</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix_solde'] ?>€</span><br>
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
       <span class="new-label">New</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Sale!</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix_solde'] ?>€</span><br>
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
       <span class="new-label">New</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Sale!</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix_solde'] ?>€</span><br>
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
 $m=$items->afficheSoldeFemmeItemsAsc();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">New</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Sale!</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix_solde'] ?>€</span><br>
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
 $m=$items->afficheSoldeItemsFemmeDesc();?>
 <div class="row ">
<?php   foreach ($m as $donnees){ ?>



   <div class="col-md-3 shop_box"><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>">
     <img src="../../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>
     <span class="new-box">
       <span class="new-label">New</span>
     </span>
     <?php if($donnees['Solde'] == 1) { ?>
     <span class="sale-box">
       <span class="sale-label">Sale!</span>
     </span>
     <?php } ?>
     <div class="shop_desc">
       <h3><a href="/snowboarding/src/view/single.php?id=<?php echo $donnees['ID'] ?>"><?php echo $donnees['Categorie'] ?></a></h3>
       <p><?php echo $donnees['Description'] ?></p>
       <?php if($donnees['Solde'] == 1) { ?>
       <span class="reducedfrom"><?php echo $donnees['Prix'] ?>€</span>
         <span class="actual"><?php echo $donnees['Prix_solde'] ?>€</span><br>
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

	<?php include "../../app/footer.php" ?>
</body>
</html>
