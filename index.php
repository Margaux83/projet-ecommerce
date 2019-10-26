<!DOCTYPE HTML>
<html>
<head>
<title>Mountains</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery.min.js"></script>
<!--<script src="js/jquery.easydropdown.js"></script>-->
<!--start slider -->
<link rel="stylesheet" href="css/fwslider.css" media="all">
<script src="js/jquery-ui.min.js"></script>
<script src="js/fwslider.js"></script>
<!--end slider -->
  <?php include "src/app/script.php"; ?>
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
  <?php
    if(isset($_SESSION['popup'])) {
      ?>
  <script type="text/javascript">

    alert('<?php echo $_SESSION['popup'];?>');
    </script>
       <?php
        unset($_SESSION['popup']);

    } ?>

<?php include "src/app/header.php"; ?>

</head>
<body>



	<div class="banner">

	<!-- start slider -->
       <div id="fwslider">
         <div class="slider_container">
            <div class="slide">
                <!-- Slide image -->
               <img src="images/Blogger_Alan_Cariño_attending_París_Fashion_Week..jpg" class="img-responsive" alt=""/>
                <!-- /Slide image -->
                <!-- Texts container -->
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <!-- Text title -->
                        <h1 class="title">Run Over<br>Everything</h1>
                        <!-- /Text title -->
                        <form action="/snowboarding/src/view/Shop/shop.php" method="post">
                               <button type="submit "class="btn_form" name="shop" href="/snowboarding/src/view/Shop/shop.php">Voir les détails</button>
                        </form>
                    </div>
                </div>
               <!-- /Texts container -->
            </div>
            <!-- /Duplicate to create more slides -->
            <div class="slide">
               <img src="images/fashion-2208045_960_720.jpg" class="img-responsive" alt=""/>
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <h1 class="title">Run Over<br>Everything</h1>
                        <form action="/snowboarding/src/view/Shop/shop.php" method="post">
                                 <button type="submit "class="btn_form" name="shop" href="/snowboarding/src/view/Shop/shop.php">Voir les détails</button>
                          </form>
                    </div>
                </div>
            </div>
            <!--/slide -->
        </div>
        <div class="timers"></div>
        <div class="slidePrev"><span></span></div>
        <div class="slideNext"><span></span></div>
       </div>
       <!--/slider -->
      </div>
	  <div class="main">
		<div class="content-top">
			<h2>Articles en vente</h2>
			<div class="close_but"><i class="close1"> </i></div>
				<ul id="flexiselDemo3">
				<li><img src="images/blue-t-shirt-front.jpg" /></li>
				<li><img src="images/Beige-pantalon-front.jpg" /></li>
				<li><img src="images/grey-t-shirt-front.jpg" /></li>
				<li><img src="images/Black-pantalon-front.jpg" /></li>
				<li><img src="images/red-t-shirt-front.jpg" /></li>
			</ul>

			<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo3").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: {
		    		portrait: {
		    			changePoint:480,
		    			visibleItems: 1
		    		},
		    		landscape: {
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: {
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });

		});
		</script>
		<script type="text/javascript" src="js/jquery.flexisel.js"></script>
		</div>
	</div>


	<?php include "src/app/footer.php" ?>
</body>
</html>
