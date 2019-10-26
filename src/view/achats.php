<!doctype html>
<html lang="en">
    <head>
        <title>Espace achats</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <!-- Custom Stylesheets -->
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" id="cpswitch" href="../../css/orange.css">
        <!-- Font Awesome Stylesheet -->
        <link rel="stylesheet" href="../../css/font-awesome.min.css">

        <!-- Custom Stylesheets -->
        <link rel="stylesheet" href="../../css/style2.css">
        <!--<link rel="stylesheet" id="cpswitch" href="../../assets/bootstrap/css/orange.css">-->
        <link rel="stylesheet" href="../../css/responsive.css">
        <link href="../../css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="../../css/style.css" rel='stylesheet' type='text/css' />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i%7CMerriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
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

          <!--================ PAGE-COVER =================-->
          <section class="page-cover" id="cover-login">
              <div class="container">
                  <div class="row">
                      <div class="col-sm-12">
                      	<h1 class="page-title">Mes achats</h1>
                          <ul class="breadcrumb">
                              <li><a href="/snowboarding/index.php">Home</a></li>
                              <li class="active">Mes achats</li>
                          </ul>
                      </div><!-- end columns -->
                  </div><!-- end row -->
              </div><!-- end container -->
          </section><!-- end page-cover -->


        <!--===== INNERPAGE-WRAPPER ====-->
        <section class="innerpage-wrapper">
        	<div id="dashboard" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="dashboard-wrapper">
                            	<div class="row">

                                <div class="col-xs-12 col-sm-2 col-md-2 dashboard-nav">
                                  <ul class="nav nav-tabs nav-stacked text-center">
                                        <li><a href="user-profile.php"><span><i class="fa fa-user"></i></span>Profil</a></li>
                                          <li class="active"><a href="achats.php"><span><i class="fa fa-briefcase"></i></span>Mes achats</a></li>

                                      </ul>
                                  </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content booking-trips">
                                		<h2 class="dash-content-title">Mes achats</h2>

                                        <div class="dashboard-listing booking-listing">
                                        	<div class="dash-listing-heading"></div>

                                            <div class="table-responsive">
                                              <?php
                                              // Inclusion de la classe "purchaseManager.php" et "classPurchase.php"
                                              require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/purchaseManager.php');
                                              require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/model/classPurchase.php');

                                              // Creation d'un nouvel objet "panier" de type "purchaseManager"
                                              $panier= new purchaseManager();
                                              // Execution de la fonction "selectCommande"
                                              $result=$panier->selectCommande();


                                              ?>
                                                <table class="table table-hover">


                                                  <?php  if ($result == null) { ?>
                                                    <tbody>
                                                        <tr>
                                                          <td class="dash-list-text booking-list-detail">
                                                          <ul class="list-unstyled booking-info">
                                                            <li><h4><span>Vous n'avez commandé aucun article.</span></h4></li>
                                                          </td>
                                                          </ul>
                                                        </tr>
                                                    </tbody>
                                                  <?php }
                                                  foreach ($result as $m){

                                                    ?>
                                                    <tbody>
                                                        <tr>

                                                            <td class="dash-list-icon booking-list-date"><img src="../../<?php echo $m['Image1'];?>" class="img-responsive" alt="flight-img" /></td>

                                                            <td class="dash-list-text booking-list-detail">
                                                              <div class="product_control_buttons">
                                                                  <a href="/snowboarding/src/traitement/delete-achat-ttt.php?id=<?php echo $m['Id_items'] ?>"><img src="/snowboarding/images/close_edit.png" alt=""/></a>
                                                              </div>
                                                                <ul class="list-unstyled booking-info">

                                                                  <li><span>Nom :</span> <?php echo $m['Nom'];?></li>
                                                                  <li><span>Prénom :</span> <?php echo $m['Prenom']; ?></li>
                                                                  <li><span>Mail :</span> <?php echo $m['Email']; ?></li>
                                                                  <li><span>Lieu de livraison :</span> <?php echo $m['Lieu']; ?></li>
                                                                  <?php if ( $m['Lieu'] == 'Domicile'){ ?>
                                                                  <li><span>Adresse :</span> <?php echo $m['Adresse'] ?>, <?php echo $m['Ville'] ?>, <?php echo $m['CP']?>, <?php echo $m['Pays']?></li>
                                                                  <?php } ?>
                                                                  <li><span>Nom de l'article :</span> <?php echo $m['Titre']; ?></li>
                                                                  <li><span>Taille :</span> <?php echo $m['Taille']; ?></li>
                                                                	<li><span>Quantité :</span> <?php echo $m['Quantite']; ?> </li>
                                                                  <li><span>Prix :</span> <?php echo $m['Prix']; ?>€</li>
                                                                  <li><span>Date de la commande :</span> <?php echo $m['DateAchat']; ?></li>
                                                                </ul>

                                                            </td>
                                                          </tr>
                                                    </tbody>
                                                  <?php } ?>
                                                </table>
                                            </div><!-- end table-responsive -->
                                        </div><!-- end booking-listings -->


                                    </div><!-- end columns -->

                                </div><!-- end row -->
                            </div><!-- end dashboard-wrapper -->
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end dashboard -->
        </section><!-- end innerpage-wrapper -->


        <!-- Page Scripts Starts -->
        <script src="../../assets/bootstrap/js/jquery.min.js"></script>
        <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../assets/bootstrap/js/custom-navigation.js"></script>
        <!-- Page Scripts Ends -->

        	<?php include "../app/footer.php" ?>
    </body>
</html>
