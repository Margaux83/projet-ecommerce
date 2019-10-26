
<!DOCTYPE HTML>
<html>
<head>
<title>Profil Admin</title>


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

</head>


    <body>
	<?php include "../app/header.php"; ?>






          <!--================ PAGE-COVER =================-->
          <section class="page-cover" id="cover-login">
              <div class="container">
                  <div class="row">
                      <div class="col-sm-12">
                      	<h1 class="page-title">Mes messages</h1>
                          <ul class="breadcrumb">
                              <li><a href="/snowboarding/index.php">Home</a></li>
                              <li class="active">Mes messages</li>
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
                                        <li><a href="/snowboarding/src/view/Admin_Profile.php"><span><i class="fa fa-user"></i></span>Profil</a></li>
                                          <li class="active"><a href="/snowboarding/src/view/message.php"><span><i class="fa fa-briefcase"></i></span>Mes messages</a></li>
                                      </ul>
                                  </div><!-- end columns -->

                                    <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content booking-trips">
                                		<h2 class="dash-content-title">Mes messages</h2>

                                        <div class="dashboard-listing booking-listing">
                                        	<div class="dash-listing-heading"></div>

                                            <div class="table-responsive">
                                              <?php
                                              // Inclusion de la classe "classContact.php" et "contactManager.php"
                                              include "../model/classContact.php";
                                              include "../model/contactManager.php";

                                                // Creation d'un nouvel objet "contact" de type "contactManager"
                                              $contact= new contactManager();
                                              // Execution de la fonction "afficherMsg"
                                              $result=$contact->afficherMsg();


                                              ?>
                                                <table class="table table-hover">

                                                  <?php  foreach ($result as $m){

                                                    ?>
                                                    <tbody>
                                                        <tr>
                                                            <td class="dash-list-icon booking-list-date"></td>
                                                            <td class="dash-list-text booking-list-detail">
                                                                <h3>Date : <?php echo $m['Dateday'];?></h3>
                                                                <ul class="list-unstyled booking-info">

                                                                  <li><span>Nom :</span><p> <?php echo $m['Nom'];?></p></li>
                                                                  <li><span>Adresse email :</span><p> <?php echo $m['Email']; ?></p></li>
                                                                  <li><span>Sujet du message :</span><p> <?php echo $m['Sujet']; ?></p></li>
                                                                  <li><span>Message :</span><p> <?php echo $m['Message']; ?></p></li>
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
    </body>
</html>
