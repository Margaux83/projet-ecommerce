<!DOCTYPE HTML>
<html>
<head>
<title>Profil</title>


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
              <h1 class="page-title">Mon Compte</h1>
                <ul class="breadcrumb">
                    <li><a href="/airforcetwo/index.php">Home</a></li>
                    <li class="active">Mon Compte</li>
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
                                <li class="active"><a href="#"><span><i class="fa fa-user"></i></span>Profil</a></li>
                                  <li><a href="achats.php"><span><i class="fa fa-briefcase"></i></span>Mes achats</a></li>
                              </ul>
                          </div><!-- end columns -->

                          <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content user-profile">
                          <h2 class="dash-content-title">Mon Compte</h2>
                              <div class="panel panel-default">
                                  <div class="panel-heading"><h4>Informations</h4></div>
                                  <div class="panel-body">
                                    <div class="row">
                                      <?php
                                      // Creation d'un nouvel objet "membre" de type "inscriManager"
                                      $membre = new inscriManager();
                                      // Execution de la fonction "afficheUser"
                                      $result = $membre->afficheUser();

                                    ?>
                                        <div class="col-sm-5 col-md-4 user-img">
                                              <img src="../../images/10.png" class="img-responsive" alt="user-img" />
                                          </div><!-- end columns -->

                                          <div class="col-sm-7 col-md-8  user-detail">

                                              <ul class="list-unstyled">
                                                  <li><span>Nom:</span> <?php echo $result['Nom'];?></li>
                                                  <li><span>Prenom:</span> <?php echo $result['Prenom']; ?></li>
                                                  <li><span>Mail:</span> <?php echo $result['Email']; ?></li>
                                              </ul>

                                          </div><!-- end columns -->
                                          <button class="btn_form" type="button"  ><a href="/snowboarding/src/view/edit-profile.php">Modifier mon profil</a></button>
                                      </div><!-- end row -->

                                  </div><!-- end panel-body -->
                              </div><!-- end panel-detault -->
                          </div><!-- end columns -->

                      </div><!-- end row -->
                  </div><!-- end dashboard-wrapper -->
              </div><!-- end columns -->
          </div><!-- end row -->
      </div><!-- end container -->
  </div><!-- end dashboard -->
</section><!-- end innerpage-wrapper -->


<!-- Page Scripts Starts -->
<script src="../../js/jquery2.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/custom-navigation.js"></script>
<!-- Page Scripts Ends -->

	<?php include "../app/footer.php" ?>
    </body>
</html>
