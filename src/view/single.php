<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
<title>Produit</title>
<link href="../../css/bootstrap.css" rel='stylesheet' type='text/css' />

<link href="../../css/style.css" rel='stylesheet' type='text/css' />

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- Container, Row, and Column used for illustration purposes -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="../../js/jquery.min.js"></script>

<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });

            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });

            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>

     <!----details-product-slider--->
				<!-- Include the Etalage files -->
					<link rel="stylesheet" href="../../css/etalage.css">
					<script src="../../js/jquery.etalage.min.js"></script>
				<!-- Include the Etalage files -->

				<script>
						jQuery(document).ready(function($){

							$('#etalage').etalage({
								thumb_image_width: 300,
								thumb_image_height: 400,

								show_hint: true,
								click_callback: function(image_anchor, instance_id){
									alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
								}
							});
							// This is for the dropdown list example:
							$('.dropdownlist').change(function(){
								etalage_show( $(this).find('option:selected').attr('class') );
							});

					});
				</script>
				<!----//details-product-slider--->
        <?php
        session_start();
        if(isset($_SESSION['message'])) {
           ?>
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <strong><center><?php echo $_SESSION['message']; ?></center></strong>
            </div>
            <?php
            unset($_SESSION['message']);
        }
        ?>
</head>
<body>
  <?php include "../app/header.php"; ?>
     <div class="main">
      <div class="shop_top">
		<div class="container">
      <button type="button" class="btn_form"><a href="javascript:history.go(-1)">Retour</a></button>

			<div class="row">
				<div class="col-md-9 single_left">
				   <div class="single_image">
					     <ul id="etalage">
                 <?php
                 // Inclusion de la classe "connexionPDO.php"
                 require_once ('../app/connexionPDO.php');
                 // Inclusion de la classe "classItems.php" et "itemsManager.php"
                 include "../model/classItems.php";
                 include "../model/itemsManager.php";

                   // Creation d'un nouvel objet "items" de type "itemsManager"
                 if(isset($_GET['id'])){
                 $items = new itemsManager();
                 // Execution de la fonction "afficheOneItems"
                 $result=$items->afficheOneItems($_GET['id']);

                 if($result[0]['Image1'] != null){ ?>
							<li>
									<img class="etalage_thumb_image" src="../../<?php echo $result[0]['Image1'] ?>" />
									<img class="etalage_source_image" src="../../<?php echo $result[0]['Image1'] ?>" />
								</a>
							</li>
              <?php } ?>
              <?php if($result[0]['Image2'] != null){ ?>
							<li>
								<img class="etalage_thumb_image" src="../../<?php echo $result[0]['Image2'] ?>" />
								<img class="etalage_source_image" src="../../<?php echo $result[0]['Image2'] ?>" />
							</li>
              <?php } ?>
              <?php if($result[0]['Image3'] != null){ ?>
							<li>
								<img class="etalage_thumb_image" src="../../<?php echo $result[0]['Image3'] ?>" />
								<img class="etalage_source_image" src="../../<?php echo $result[0]['Image3'] ?>" />
							</li>
              <?php } ?>
              <?php if($result[0]['Image4'] != null){ ?>
							<li>
								<img class="etalage_thumb_image" src="../../<?php echo $result[0]['Image4'] ?>" />
								<img class="etalage_source_image" src="../../<?php echo $result[0]['Image4'] ?>" />
							</li>
              <?php } ?>
						</ul>
					    </div>
            <?php } ?>
				        <!-- end product_slider -->
				        <div class="single_right">
				        	<h3><?php echo $result[0]['Titre'] ?></h3>
				        	<p class="m_10"><?php echo $result[0]['Description'] ?></p>
                  <p class="m_10">Couleur : <?php echo $result[0]['Couleur'] ?></p>
                  <form action="/snowboarding/src/traitement/single-ttt.php?id=<?php echo $_GET['id'] ?>" method="post">
                  <ul class="options">
                    <?php if($result[0]['Categorie'] == 'T-shirt' || $result[0]['Categorie'] == 'Pantalon'){ ?>
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

                  <?php if($result[0]['Categorie'] == 'Chaussures'){ ?>
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
          <?php if($result[0]['Categorie'] == 'Accessoire'){ ?>
            <select class="m_12" name="taille">
              <option value="Unique">Unique</option>
            </select>
          <?php } ?><br><br>
                   <button type="submit" class="btn_form" name="panier">Ajouter au panier</button>
							<ul class="add-to-links">
    			              <li><img src="../../images/wish.png" alt=""></li>
                        <li><button type="submit" name="wishlist" class="exclusive2"><span>Ajouter à la wishlist</span></button></li>
                      </ul>
							<div class="social_buttons">
								<button type="button" class="btn1 btn1-default1 btn1-twitter" onclick="">
					              <i class="icon-twitter"></i> Tweet
					            </button>
					            <button type="button" class="btn1 btn1-default1 btn1-facebook" onclick="">
					              <i class="icon-facebook"></i> Share
					            </button>
					             <button type="button" class="btn1 btn1-default1 btn1-google" onclick="">
					              <i class="icon-google"></i> Google+
					            </button>
					            <button type="button" class="btn1 btn1-default1 btn1-pinterest" onclick="">
					              <i class="icon-pinterest"></i> Pinterest
					            </button>
					        </div>
				        </div>
				        <div class="clear"> </div>
				</div>
				<div class="col-md-3">
				  <div class="box-info-product">
            <?php if($result[0]['Solde'] == 1) { ?>
						<p class="price2"><span class="reducedfrom"><?php echo $result[0]['Prix_solde'] ?>€</span></p>
            <p class="price2"><?php echo $result[0]['Prix'] ?>€</p>
          <?php } else {?>
					<p class="price2"><?php echo $result[0]['Prix'] ?>€</p>
        <?php } ?>

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
                </form>


				   </div>
			   </div>
			</div>



        <h2 style="text-align: center;">Produits de la même catégorie</h2>
  			<p style="text-align: center;">Voici des produits similaires qui pourraient vous intéresser</p>
  			<div class="close_but"><i class="close1"> </i></div>
			<div class="row">
        <?php

        if(isset($_GET['id'])){
        // Execution de la fonction "afficheSameCategoryItems"
        $result=$items->afficheSameCategoryItems($_GET['id']);

        for ($i=0; $i < 4; $i++) {

          if($result[$i]['ID'] != $_GET['id']) {


        ?>
				<div class="col-md-4 product1">
					<img src="../../<?php echo $result[$i]['Image1'] ?>" class="img-responsive" alt=""/>
					<div class="shop_desc"><a href="/snowboarding/src/view/single.php?id=<?php echo $result[$i]['ID'] ?>">
          </a><h3><a href="/snowboarding/src/view/single.php?id=<?php echo $result[$i]['ID'] ?>"></a><a href="#"><?php echo $result[$i]['Titre'] ?></a></h3>
						<p><?php echo $result[$i]['Description'] ?></p>
            <?php if($result[$i]['Solde'] == 1) { ?>
						<span class="reducedfrom"><?php echo $result[$i]['Prix_solde'] ?>€</span>
            <span class="actual"><?php echo $result[$i]['Prix'] ?>€</span><br>
          <?php } else {?>
						<span class="actual"><?php echo $result[$i]['Prix'] ?>€</span><?php } ?><br>
						<ul class="buttons">
							<li class="cart"><a href="/snowboarding/src/view/single.php?id=<?php echo $result[$i]['ID'] ?>">Voir plus</a></li>
							<div class="clear"> </div>
					    </ul>
				    </div>
				</div>
      <?php } } } ?>
    </div><br><br><br>

	     </div>
	   </div>
	  </div>
	  <?php include "../app/footer.php" ?>
</body>
</html>
