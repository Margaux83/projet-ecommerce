<!DOCTYPE HTML>
<html>
<head>
<title>A propos</title>
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
     <!-- Add fancyBox main JS and CSS files -->
	<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
		<script>
			$(document).ready(function() {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
			});
		});
		</script>
</head>
<body>
	<?php include "../app/header.php"; ?>
     <div class="main">
      <div class="shop_top">
		<div class="container">
			<div class="row team_box">
				<h3 class="m_2">A propos</h3>
				<div class="col-md-3 team1">
				    <div id="small-dialog3" class="mfp-hide">
					   <div class="pop_up2">
					   	 <h2>Notre histoire</h2>
						 <p>Mountains est entreprise spécialisée dans la vente de vêtements et d'accessoires en ligne, fondée en 2019. Nous avons créé cette entreprise dans l'idée de rassembler des personnes avec des styles vestimentaires très variés et de leur proposer une large gamme de produits.</p>
					   </div>
					</div>
				</div>
				<div class="col-md-3 team1">
				    <div id="small-dialog3" class="mfp-hide">
					   <div class="pop_up2">
					   	 <h2>Satisfaction client</h2>
						 <p>Le but principal de Mountains est de staisfaire au maximum nos clients grâce à un large choix de vêtements et d'accessoires. Ceux-ci sont adaptés à tout type de morphologie et restent abordables.</p>
						 <p></p>
					   </div>
					</div>
					<h4 class="m_5"><a href="#">Livraison</a></h4>
				    <p class="m_6">La livraison est gratuite, vous pouvez choisir de vous faire livrer à domicile ou à votre point de retrait habituel. Vous receverez votre commande 2 à 5 jours après l'achat de vos articles.</p>
				</div>
				<div class="col-md-3 team1">
					   <div class="pop_up2">
					   	 <h2>Une entreprise respectueuse de l'environnement</h2>
						 <p>Dans un soucis de protection de l'environnement, la fabrication de nos vêtements et de nos accesoires est neutre en carbone, nous utilisons 80% d'énergie renouvelable pour faire fonctionner nos usines. Nos produits textiles sont garantis 100% coton et nos accessoires, ainsi que nos chaussures, sont fabriqués avec 90% de produits recyclés.</p>
					   </div>
					</div>

				<div class="col-md-3 team1">
				    <div id="small-dialog3" class="mfp-hide">
					   <div class="pop_up2">
					   	 <h2>Retour des articles </h2>
						 <p>Vous pouvez effectuer un retour de vos articles, pour les échanger ou obtenir un rembourssement, en remplissant la fiche de remboursement se trouvant dans votre colis. Pour retourner un article, celui-ci doit se trouver dans son état d'origine et avoir son étiquette. Le renvoie sera à vos frais sauf dans le cas où le produit ne correspond pas à votre commande ou s'il y a des erreurs lors de la préparation du colis. Cependant, si vous avez choisi le mode de livraison au point relais, le renvoie des articles est gratuit. Veuillez renvoyer les articles à l'adresse suivante : <b>5 avenue du Général de Gaulle, 93440, Dugny</b></p>
					   </div>
					</div>
					<h4 class="m_5"><a href="#">Echange ou remboursement</a></h4>
				    <p class="m_6">Si vous souhaitez échanger un article, veuillez indiquer, sur le formulaire de retour se trouvant dans votre colis, le ou les article(s) à échanger, le motif de l'échange ainsi que la taille et la couleur de l'article demandé.
              Une fois le formulaire rempli, veuillez le remettre dans le colis contenant l'article retourné.
            Votre nouveau colis sera envoyé via colissimo et les frais de livraison sont gratuits. </p><br>
            <p class="m_6">Concernant le remboursement, la totalité du prix de l'article retourné vous sera remboursée. Votre carte bancaire d’origine sera créditée au moment du traitement des articles retournés et le crédit apparaîtra sur votre prochain relevé bancaire. </p>
				</div>
			</div>
      </div>
		</div>
	   </div>
	  
	  <?php include "../app/footer.php" ?>
</body>
</html>
