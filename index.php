<!doctype html>
<html><head>
    <meta charset="utf-8">
    <title>Home Automation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Carlos Alvarez - Alvarez.is">

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />

    <link href="css/main.css" rel="stylesheet">
    <link href="css/font-style.css" rel="stylesheet">
    <link href="css/flexslider.css" rel="stylesheet">

    <script type="text/javascript" src="js/jquery.js"></script>    
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="js/lineandbars.js"></script>
    
	<script type="text/javascript" src="js/dash-charts.js"></script>
	<script type="text/javascript" src="js/gauge.js"></script>
	
	<!-- NOTY JAVASCRIPT -->
	<script type="text/javascript" src="js/noty/jquery.noty.js"></script>
	<script type="text/javascript" src="js/noty/layouts/top.js"></script>
	<script type="text/javascript" src="js/noty/layouts/topLeft.js"></script>
	<script type="text/javascript" src="js/noty/layouts/topRight.js"></script>
	<script type="text/javascript" src="js/noty/layouts/topCenter.js"></script>
	
	<!-- You can add more layouts if you want -->
	<script type="text/javascript" src="js/noty/themes/default.js"></script>
    <!-- <script type="text/javascript" src="assets/js/dash-noty.js"></script> This is a Noty bubble when you init the theme-->
	<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
	<script src="js/jquery.flexslider.js" type="text/javascript"></script>

    <script type="text/javascript" src="js/admin.js"></script>
      
    <style type="text/css">
      body {
        padding-top: 60px;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
   

  	<!-- Google Fonts call. Font Used Open Sans & Raleway -->
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
  	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

<script type="text/javascript">
    $(document).ready(function () {

        $("#btn-blog-next").click(function () {
            $('#blogCarousel').carousel('next')
        });
        $("#btn-blog-prev").click(function () {
            $('#blogCarousel').carousel('prev')
        });

        $("#btn-client-next").click(function () {
            $('#clientCarousel').carousel('next')
        });
        $("#btn-client-prev").click(function () {
            $('#clientCarousel').carousel('prev')
        });

    });

    $(window).load(function () {

        $('.flexslider').flexslider({
            animation: "slide",
            slideshow: true,
            start: function (slider) {
                $('body').removeClass('loading');
            }
        });
    });

</script>    
  </head>
  <body>
  <?php
		$datafile = fopen("dataread.txt", "r") or die("Unable to open file!");	
		$assoc = array();
		while( $line = fgets($datafile) )
		{
			$data_line = explode(" ", $line);
			$assoc[$data_line[1]] = $data_line[2];
		}
		fclose($datafile);
   ?>
  	<!-- NAVIGATION MENU -->

    <div class="navbar-nav navbar-inverse navbar-fixed-top">
        <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="images/logo30.png" alt=""> Home Automation</a>
        </div> 
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php"><i class="icon-home icon-white"></i> Temperatures</a></li>                            
              <li><a href="drive.php"><i class="icon-th icon-white"></i> Drive</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
    </div>
	<hr>
    <div class="container">

	  <!-- FIRST ROW OF BLOCKS -->     
      <div class="row">

      <!-- USER PROFILE BLOCK -->
        <div class="col-sm-3 col-lg-3">
      		<div class="half-unit">
	      		<dtitle>Temperatuur Living</dtitle>
	      		<hr>
				<h1><?php echo $assoc['Living'] ?></h1>
			</div>
			<div class="half-unit">
	      		<dtitle>Temperatuur Keuken</dtitle>
	      		<hr>
				<h1><?php echo $assoc['Keuken'] ?></h1>
			</div>
        </div>

      <!-- DONUT CHART BLOCK -->
        <div class="col-sm-3 col-lg-3">
      		<div class="half-unit">
		  		<dtitle>Temperatuur Hal Beneden</dtitle>
		  		<hr>
	        	<h1><?php echo $assoc['HalBeneden'] ?></h1>
			</div>
			<div class="half-unit">
		  		<dtitle>Temperatuur Hal Boven</dtitle>
		  		<hr>
	        	<h1><?php echo $assoc['HalBoven'] ?></h1>
			</div>
        </div>

      <!-- DONUT CHART BLOCK -->
        <div class="col-sm-3 col-lg-3">
      		<div class="half-unit">
		  		<dtitle>Temperatuur Slaapkamer</dtitle>
				<hr>
				<h1><?php echo $assoc['Slaapkamer'] ?></h1>
			</div>
			<div class="half-unit">
		  		<dtitle>Temperatuur Logeerkamer</dtitle>
				<hr>
				<h1><?php echo $assoc['Logeerkamer'] ?></h1>
			</div>
        </div>
        
        <div class="col-sm-3 col-lg-3">

      <!-- LOCAL TIME BLOCK -->
      		<div class="half-unit">
	      		<dtitle>Temperatuur Badkamer</dtitle>
	      		<hr>
		      	<h1><?php echo $assoc['Badkamer'] ?></h1>
			</div>

      <!-- SERVER UPTIME -->
			<div class="half-unit">
	      		<dtitle>Temperatuur Buiten</dtitle>
	      		<hr>
	      		<h1><?php echo $assoc['Buiten'] ?></h1>
			</div>

        </div>
      </div><!-- /row -->
      
      <!-- Second ROW OF BLOCKS -->     
      <div class="row">
      	<!-- DONUT CHART BLOCK -->
        <div class="col-sm-3 col-lg-3">
        	<div class="dash-unit" style="margin: 0 auto">
            	<dtitle>Het Weer</dtitle>
            	<hr>
            	<!-- http://www.meteo.be/meteo/view/nl/14514328-Weer+op+uw+website.html  TODO: TUNE THIS, see website -->
            	<iframe scrolling="no" style="display:block; margin: 0 auto" frameborder="0" marginwidth="0" marginheight="0" width="160" height ="229" src ="http://www.meteo.be/services/widget/?postcode=8000&nbDay=2&type=6&lang=nl&bgImageId=0&bgColor=567cd2&scrolChoice=1&colorTempMax=ffffff&colorTempMin=A5D6FF"></iframe>
      		</div>
      	</div>
      </div>
	</div> <!-- /container -->
	
	<div id="footerwrap">
      	<footer class="clearfix"></footer>
      	<div class="container">
      		<div class="row">
      			<div class="col-sm-12 col-lg-12">
      			<p><img src="images/logo.png" alt=""></p>
      			<p>Home Automation</p>
      			</div>

      		</div><!-- /row -->
      	</div><!-- /container -->		
	</div><!-- /footerwrap -->
          
</body></html>