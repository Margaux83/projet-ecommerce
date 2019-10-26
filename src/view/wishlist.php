<!DOCTYPE HTML>
<html>
<head>
<title>Ma wishlist</title>
<meta charset="utf-8">
<link href="../../css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="../../css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="../../js/jquery.min.js"></script>
<?php include "../app/script.php"; ?>
<?php
session_start();
if(isset($_SESSION['message'])) { ?>
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong><center><?php echo $_SESSION['message']; ?></center></strong>
    </div>
    <?php
    unset($_SESSION['message']);
}
?>
<?php include "../app/header.php"; ?>
</head>
<body>
     <div class="main">
<div class="shop_top">
  <div class="container">
    <h1>MES ARTICLES SAUVEGARDES</h1><br><br>
    <button type="button" class="btn_form"><a href="javascript:history.go(-1)">Retour</a></button>


<!------------SECTION "TOUS LES ARTICLES"--------->
      <?php
        // Inclusion de la classe "purchaseManager.php" et "classPurchase.php"
        require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/classPurchase.php');
        require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/purchaseManager.php');

      // Inclusion de la classe "achat_manager.php" et "achat_manager"


        // Creation d'un nouvel objet "wishlist" de type "purchaseManager"
      $wishlist = new purchaseManager();
      // Execution de la fonction "selectWishlist"
      $result=$wishlist->selectWishlist();


      ?>
<div class="row ">
      <?php foreach ($result as $donnees){ ?>



				<div class="col-md-3 shop_box">
					<img src="../../<?php echo $donnees['Image1'] ?>" class="img-responsive" alt=""/>

					<div class="shop_desc2">
						<h3><?php echo $donnees['Titre'] ?></h3>
						<p><?php echo $donnees['Description'] ?></p>
            <?php if($donnees['Solde'] == 1) { ?>
						<span class="reducedfrom"><?php echo $donnees['Prix_solde'] ?>€</span>
            	<span class="actual"><?php echo $donnees['Prix'] ?>€</span><br>
          <?php }
           elseif($donnees['Solde'] != 1){ ?>
          	<span class="actual"><?php echo $donnees['Prix'] ?>€</span> <?php } ?>
            <form action="/snowboarding/src/traitement/single-ttt.php?id=<?php echo $donnees['ID'] ?>" method="post">
              <br>
              <ul class="options">
                <?php if($donnees['Categorie'] == 'T-shirt' || $donnees['Categorie'] == 'Pantalon'){ ?>
            <select class="m_12" name="taille">
              <option value="">Sélectionner une taille</option>
              <option value="XS">XS</option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
              <option value="XL">XL</option>
              <option value="XXL">XXL</option>
          </select>
        <?php } ?>

              <?php if($donnees['Categorie'] == 'Chaussures'){ ?>
          <select class="m_12" name="taille">
            <option value="">Sélectionner une taille</option>
            <option value="36">36</option>
            <option value="37">37</option>
            <option value="38">38</option>
            <option value="39">39</option>
            <option value="40">40</option>
            <option value="41">41</option>
        </select>
      <?php } ?>
      <?php if($donnees['Categorie'] == 'Accessoire'){ ?>
        <select class="m_12" name="taille">
          <option value="Unique">Unique</option>
        </select>
      <?php } ?>
      <br><br>
          <ul class="add-to-links">
              <ul class="prosuct-qty">
             <span>Quantité :</span>
             <select name="quantite">
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
               <option value="5">5</option>
               <option value="6">6</option>
             </select>
           </ul>
						<ul class="buttons">
							 <button type="submit" class="btn_form" name="panier">Ajouter au panier</button>
					    </ul>
            </form>
				    </div>
				</div>

<?php } ?>
</div>
</div>
<!------------ FIN SECTION "TOUS LES ARTICLES"--------->
</div>
	<?php include "../app/footer.php" ?>
</body>
</html>
