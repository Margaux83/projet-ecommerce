<!DOCTYPE HTML>
<html>
<head>
<title>Profil</title>
<link href="../../css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="../../css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="../../css/responsive.css">
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
         <button type="button" class="btn_form"><a href="javascript:history.go(-1)">Retour</a></button>
						<form action="../traitement/edit-profile-ttt.php" method="post">
								<div class="register-top-grid">
										<h3>MODIFIER MES INFORMATIONS PERSONNELLES</h3>
										<div>
											<span>Prénom</span>
											<input type="text" name="prenom">
										</div>
										<div>
											<span>Nom</span>
											<input type="text" name="nom">
										</div>
										<div>
											<span>Adresse Email</span>
											<input type="text" name="email">
										</div>
										<div class="clear"> </div>
								</div>
                <div class="button1">
                  <input type="submit" name="Submit" value="Modifier">
                 </div>
                 </form>
								<div class="clear"> </div>
                <form action="../traitement/edit-password-ttt.php" method="post">
								<div class="register-bottom-grid">
										<h3>CHANGER DE MOT DE PASSE</h3>
										<div>
											<span>Nouveau mot de passe<label></label></span>
											<input type="password" name="mdp">
										</div>
                    <div>
											<span>Entrez de nouveau le mot de passe<label></label></span>
											<input type="password" name="newmdp">
										</div>

										<div class="clear"> </div>
								</div>
								<div class="clear"> </div>
                <div class="button1">
                  <input type="submit" name="Submit" value="Modifier">
                 </div>
						</form>
					</div>
		   </div>
	  </div>
	  <?php include "../app/footer.php" ?>
</body>
</html>
