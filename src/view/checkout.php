<!DOCTYPE HTML>
<html>
<head>
<title>Mon panier</title>
<link href="../../css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="../../css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
 </head>
<body>
<?php include "../app/header.php"; ?>
     <div class="main">
      <div class="shop_top">

		<div class="container">
      <h1>MON PANIER</h1><br><br>
      <button type="button" class="btn_form"><a href="javascript:history.go(-1)">Retour</a></button><br>
      <div class="row">

        <?php
            // Creation d'un nouvel objet "panier" de type "purchaseManager"
          $panier = new purchaseManager();
          // Execution de la fonction "selectPanier"
          $result=$panier->selectPanier();

          if($result == null) {
            ?>
            <h4 class="title">Votre panier est vide</h4>
           <p class="cart">Vous n'avez pas d'article dans votre panier.<br>Cliquez<a href="/snowboarding/index.php"> ici</a> pour continuer vos achats.</p>
          <?php }
          elseif($result != null){  ?>
            <div class="col-md-9 single_left">
            <?php foreach ($result as $m) { ?>
           <div class="single_image">
               <ul id="etalage">

              <li>
                  <img class="etalage_thumb_image" src="../../<?php echo $m['Image1'] ?>" width="200" height="200"/>
              </li>
            </ul>
              </div>
              <div class="product_control_buttons">
                <script type="text/javascript">
                  function confirmation() {
                  var str = '"Etes-vous sûr de vouloir supprimer cet article du panier ?"';
                  return confirm(str);
                  }
                  </script>
                  <a href="/snowboarding/src/traitement/delete-panier-ttt.php?id=<?php echo $m['ID'] ?>" onclick="return confirmation();"><img src="/snowboarding/images/close_edit.png" alt=""/></a>
              </div>
                <!-- end product_slider -->
                <form action="/snowboarding/src/traitement/achat-ttt.php?id=<?php echo $m['ID'] ?>" method="post">
                <div class="single_right">
                  <h3><?php echo $m['Titre'] ?></h3>
                  <ul class="options"><?php echo $m['Description'].'<br/>  Couleur : '. $m['Couleur'].'<br/> Taille : '. $m['Taille'] ?></ul>
                  <?php if($m['Solde'] == 1) { ?>
                  <p class="price2"><span class="reducedfrom"><?php echo $m['Prix_solde'] ?>€</span><?php echo $m['Prix'] ?>€</p>
                <?php } else {?>
                <p class="price2"><?php echo $m['Prix'] ?>€</p>
              <?php } ?>
              <ul class="prosuct-qty">
             <span>Quantité : <?php echo $m['Quantite'] ?></span>
           </ul>

                </div>
                <div class="clear"> </div>
            <b> <hr></b>


       <?php } }?>

       <?php
       // Execution de la fonction "selectTTC"
       $ttc=$panier->selectTTC(); ?>
       </div>
       <div class="col-md-3">
         <div class="box-info-product">

             <h3>TOTAL TTC : <?php echo $ttc[0]['TTC']?>€</h3><br>
             <ul class="prosuct-qty">
            <span>Livraison offerte</span>
          </ul>

             <button  type="submit" name="submit" class="exclusive">
                <span>Acheter maintenant</span>
             </button>
             </form>
             <div class="footer_search">
                  <form action="/snowboarding/src/view/checkout.php" method="post">
                 <input type="text" value="Code promo" name="code" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'code promo';}">
                 <input type="submit" value="Ok">
                  </form>
                </div><br>
          </div>
        </div>
      </div>
      <div class="pop_up2">
      <p class="cart"><a href="/snowboarding/index.php">< Continuer mes achats</a></p>

      </div>
   </div>
	     </div>
	   </div>
	  </div>
	  <?php include "../app/footer.php" ?>
</body>
</html>
