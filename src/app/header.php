<div class="header">

  <div class="container">
      <div class="col-xs-7">
         <div class="logo">
          <a href="/snowboarding/index.php"><img src="/snowboarding/images/logo.png" alt=""/></a>
         </div>

         <div class="menu">
           <ul class="icon1 sub-icon1 ">
             <form action="/snowboarding/src/view/Shop/shop.php" method="post">
                    <li><button type="submit "class="btn_form" name="shop" href="/snowboarding/src/view/Shop/shop.php">Shop</button>
                     <ul class="sub-icon1 list">
                       <div class="col-xs-8">
                          <li class="list_desc"><h4><button type="submit "class="btn_form" name="t-shirt" href="/snowboarding/src/view/Shop/shop.php">T-shirts</button></h4></li>
                       <br><br>
                        <li class="list_desc"><h4><button type="submit "class="btn_form" name="pantalon" href="/snowboarding/src/view/Shop/shop.php">Pantalons</button></h4></li><br><br>
                        <li class="list_desc"><h4><button type="submit "class="btn_form" name="chaussures" href="/snowboarding/src/view/Shop/shop.php">Chaussures</button></h4></li><br><br>
                        <li class="list_desc"><h4><button type="submit "class="btn_form" name="accessoires" href="/snowboarding/src/view/Shop/shop.php">Accessoires</button></h4></li><br><br>
                        </div>
                        <div class="col-xs-4">
                          <li class="list_desc"><h4><button type="submit "class="btn_form" name="soldes" href="/snowboarding/src/view/Shop/shop.php">Soldes</button></h4></li><br><br>
                        </form>
                        <form action="/snowboarding/src/view/Shop/shop-femmes.php" method="post">
                            <li class="list_desc"><h4><button type="submit "class="btn_form" name="femme" href="/snowboarding/src/view/Shop/shop-femmes.php">Femmes</button></h4></li><br><br>
                            </form>
                            <form action="/snowboarding/src/view/Shop/shop-hommes.php" method="post">
                              <li class="list_desc"><h4><button type="submit "class="btn_form" name="homme" href="/snowboarding/src/view/Shop/shop-hommes.php">Hommes</button></h4></li><br><br>
                              </form>
                              <form action="/snowboarding/src/view/wishlist.php" method="post">
                                <li class="list_desc"><h4><button type="submit"class="btn_form" href="/snowboarding/src/view/wishlist.php">Wishlist</button></h4></li>
                                  </form>
                        </div>
                     </ul>
                    </li>

                    </ul>
              <ul class="nav" id="nav">

                <li><a href="/snowboarding/src/view/team.php">A propos</a></li>
              <li><a href="/snowboarding/src/view/contact.php">Contacts</a></li>
              <?php
              if(isset($_COOKIE['id'])) { ?>
                  <li><a href="/snowboarding/src/view/user-profile.php">
              <?php
              include($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/inscriManager.php');

              $membre = new inscriManager();
              $result = $membre->afficheUser();
              echo   $result['Nom'] .' ';
              echo   $result['Prenom'];
              ?></a></li>


                <li><a href="/snowboarding/src/traitement/decouser.php">Déconnexion</a></li>

              <?php } elseif(isset($_COOKIE['admin'])) { ?>
               <li> <a href="/snowboarding/src/view/Admin_Profile.php" >Panel Admin</a> </li>
                <li><a href="/snowboarding/src/traitement/decoadmin.php" >Déconnexion</a></li>
                <?php } else { ?>
              <li><a href="/snowboarding/src/view/login.php">Se connecter</a></li>
              <li><a href="/snowboarding/src/view/register.php">S'inscrire</a></li>
                <?php } ?>

              <div class="clear"></div>
            </ul>
            <script type="text/javascript" src="../../js/responsive-nav.js"></script>
          </div>
            <div class="clear"></div>
  </div>
    <div class="col-md-5">

          <!-- start search-->
          <?php
          require_once ('connexionPDO.php');
          // Inclusion de la classe "purchaseManager.php" et "classManager"
            require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/classPurchase.php');
            require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/purchaseManager.php');
              // Creation d'un nouvel objet "purchaseManager" de type "panier"
            $panier = new purchaseManager(); ?>

          <ul class="icon2 sub-icon2 profile_img">
            <?php  $res=$panier->countItemPanier()?>
                   <li><a class="active-icon c1" href="#"> </a>
                     <span class="cart-products-count-btn"><?php echo $res[0]['NbreItem'] ?></span>

                       <ul class="sub-icon2 list">
                      <?php
                        // Execution de la fonction "selectPanier"
                        $result=$panier->selectPanier();
                        if($result == null) { ?>
                          <b><h3>Mon panier</h3></b><br>
                          <li class="list_desc"><h5>Votre panier est vide</h5></li>
                          <?php  } elseif($result != null) {?>
                        <?php foreach ($result as $m) { ?>
                      <div class="product_control_buttons">
                        <script type="text/javascript">
                          function confirmation() {
                          var str = '"Etes-vous sûr de vouloir supprimer cet article du panier ?"';
                          return confirm(str);
                          }
                          </script>
                          <a href="/snowboarding/src/traitement/delete-panier-ttt.php?id=<?php echo $m['ID'] ?>" onclick="return confirmation();"><img src="/snowboarding/images/close_edit.png" alt=""/></a>
                      </div>
                      <li class="list_img"><img src="/snowboarding/<?php echo $m['Image1']?>" alt="" width="80" height="80"/></li><br><br>
                      <li class="list_desc2"><h4><?php echo $m['Titre']?></h4><span class="actual-panier" ><?php echo $m['Quantite'], "x", $m['Prix']?>€</span></li>
                      <br><br><hr>
                      <?php } ?>
                      <?php $ttc=$panier->selectTTC(); ?>
                    <h3>Sous-total : <?php echo $ttc[0]['TTC']?>€</h3>
                    <div class="login_buttons">
                     <div class="check_button"><a href="/snowboarding/src/view/checkout.php">Voir mon panier</a></div><br>
                    </div>
                  <?php } ?>
                    </ul>
                   </li>
                   </ul>
              <form action="/snowboarding/src/view/Shop/shop.php" method="get">
                <input class="sb-search-input" placeholder="Rechercher..." type="search" name="search" >
                <input class="sb-search-submit" type="submit" value="">
                <span class="sb-icon-search"> </span>
              </form>
  </div>

    </div>
</div>
