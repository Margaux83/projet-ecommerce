<!DOCTYPE HTML>
<html>
<head>
<title>Contacts</title>
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
			<div class="row">
				<div class="col-md-7">
				  <div class="map">
					<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px"></a></small>
				  </div>
				</div>
				<div class="col-md-5">
					<div class="address">
				                <p>5 avenue du Général de Gaulle,</p>
						   		<p>93440, Dugny</p>
						   		<p>France</p>
				   		<p>Téléphone:+33184596356</p>

				 	 	<p>Email: <span>mountains.brand@gmail.com</span></p>
				   		<p>Suivez-nous sur: <span>Facebook</span>, <span>Twitter</span></p>
				   </div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 contact">
				  <form method="post" action="/snowboarding/src/traitement/contact-ttt.php">
					<div class="to">
                     	<input type="text" name="nom" class="text" placeholder="Nom" >
					 	<input type="text" name="email" class="text" placeholder="Email">
					 	<input type="text" name="sujet" class="text" placeholder="Sujet" >
					</div>
					<div class="text">
	                   <textarea type="text" name="msg" placeholder="Message :"   ></textarea>
	                   <div class="form-submit">
			           <input name="submit" type="submit" id="submit" value="Envoyer"><br>
			           </div>
	                </div>
	                <div class="clear"></div>
                   </form>
			     </div>
		    </div>
	     </div>
	   </div>
	  </div>
	<?php include "../app/footer.php" ?>
</body>
</html>
