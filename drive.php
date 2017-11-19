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
    $datafile = fopen("datawrite.txt", "r+") or die("Unable to open file!");
    $assoc = array();
    // als we on schrijven hebben we om een of andere reden een line feed! 
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	    fseek($datafile, 0, SEEK_SET);
	    foreach($_POST as $index=>$value)
	    {
			fwrite($datafile, $index . " " . $value . "\n");
	    }
	    fseek($datafile, 0, SEEK_SET);
	}
	?>
  <?php
		while( ($line = fgets($datafile)) != NULL )
		{
		    if (($line != "") && ($line != "\n"))
		    {
    			$data_line = explode(" ", $line);
    			$data_line[1] = str_replace("\n", "", $data_line[1]);
    			$assoc[$data_line[0]] = $data_line[1];
		    }
		}		
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
              <li><a href="index.php"><i class="icon-th icon-white"></i> Temperatures</a></li>                            
              <li class="active"><a href="drive.php"><i class="icon-home icon-white"></i> Drive</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
    </div>
	<hr>
    <div class="container">

	  <!-- FIRST ROW OF BLOCKS -->     
      <div class="row">

      <!-- SWITCHES BLOCK -->     
		<div class="col-sm-3 col-lg-3">
			<div class="dash-unit">
	      		<dtitle>Switches</dtitle>
	      		<hr>
	      		<div class="info-user">
					<span aria-hidden="true" class="li_params fs2"></span>
				</div>
				<br>
				<form method="post">
					<div class="switch switch-blue">
						<input type="radio" class="switch-input" name="GPIO2" value="OFF" id="gpio2off"
						<?php
							if (!strcmp($assoc['GPIO2'], "OFF"))
							{
							     echo "checked";
							}
						?>>
						<label for="gpio2off" class="switch-label switch-label-off">OFF</label>
						<input type="radio" class="switch-input" name="GPIO2" value="ON" id="gpio2on"
						<?php 
    						if (!strcmp($assoc['GPIO2'], "ON"))
    						{
    						    echo "checked";
    						}
						?>>
						<label for="gpio2on" class="switch-label switch-label-on">ON</label>
						<span class="switch-selection"></span>
					</div>
					<div class="switch switch-blue">
						<input type="radio" class="switch-input" name="GPIO3" value="OFF" id="gpio3off"
						<?php
							if (!strcmp($assoc['GPIO3'], "OFF"))
							{
							     echo "checked";
							}
						?>>
						<label for="gpio3off" class="switch-label switch-label-off">IO3 OFF</label>
						<input type="radio" class="switch-input" name="GPIO3" value="ON" id="gpio3on"
						<?php
							if (!strcmp($assoc['GPIO3'], "ON"))
							{
							     echo "checked";
							}
						?>>
						<label for="gpio3on" class="switch-label switch-label-on">IO3 ON</label>
						<span class="switch-selection"></span>
					</div>
					<div class="switch">
						<input type="submit">
					</div>
				</form>
			</div>
		</div>

      <!-- SWITCHES BLOCK -->     
		<div class="col-sm-3 col-lg-3">
			<div class="dash-unit">
	      		<dtitle>Switches</dtitle>
	      		<hr>
	      		<div class="info-user">
					<span aria-hidden="true" class="li_params fs2"></span>
				</div>
				<br>
				<div class="switch">
					<input type="radio" class="switch-input" name="view4" value="on" id="on" checked="">
					<label for="on" class="switch-label switch-label-off">On</label>
					<input type="radio" class="switch-input" name="view4" value="off" id="off">
					<label for="off" class="switch-label switch-label-on">Off</label>
					<span class="switch-selection"></span>
				</div>
				<div class="switch switch-blue">
					<input type="radio" class="switch-input" name="view5" value="week2" id="week2" checked="">
					<label for="week2" class="switch-label switch-label-off">Week</label>
					<input type="radio" class="switch-input" name="view5" value="month2" id="month2">
					<label for="month2" class="switch-label switch-label-on">Month</label>
					<span class="switch-selection"></span>
				</div>
				
				<div class="switch switch-yellow">
					<input type="radio" class="switch-input" name="view6" value="yes" id="yes" checked="">
					<label for="yes" class="switch-label switch-label-off">Yes</label>
					<input type="radio" class="switch-input" name="view6" value="no" id="no">
					<label for="no" class="switch-label switch-label-on">No</label>
					<span class="switch-selection"></span>
				</div>
			</div>
		</div>

      <!-- SWITCHES BLOCK -->     
		<div class="col-sm-3 col-lg-3">
			<div class="dash-unit">
	      		<dtitle>Switches</dtitle>
	      		<hr>
	      		<div class="info-user">
					<span aria-hidden="true" class="li_params fs2"></span>
				</div>
				<br>
				<div class="switch">
					<input type="radio" class="switch-input" name="view" value="on" id="on" checked="">
					<label for="on" class="switch-label switch-label-off">On</label>
					<input type="radio" class="switch-input" name="view" value="off" id="off">
					<label for="off" class="switch-label switch-label-on">Off</label>
					<span class="switch-selection"></span>
				</div>
				<div class="switch switch-blue">
					<input type="radio" class="switch-input" name="view2" value="week2" id="week2" checked="">
					<label for="week2" class="switch-label switch-label-off">Week</label>
					<input type="radio" class="switch-input" name="view2" value="month2" id="month2">
					<label for="month2" class="switch-label switch-label-on">Month</label>
					<span class="switch-selection"></span>
				</div>
				
				<div class="switch switch-yellow">
					<input type="radio" class="switch-input" name="view3" value="yes" id="yes" checked="">
					<label for="yes" class="switch-label switch-label-off">Yes</label>
					<input type="radio" class="switch-input" name="view3" value="no" id="no">
					<label for="no" class="switch-label switch-label-on">No</label>
					<span class="switch-selection"></span>
				</div>
			</div>
		</div>
		<!-- SWITCHES BLOCK -->     
		<div class="col-sm-3 col-lg-3">
			<div class="dash-unit">
	      		<dtitle>Switches</dtitle>
	      		<hr>
	      		<div class="info-user">
					<span aria-hidden="true" class="li_params fs2"></span>
				</div>
				<br>
				<div class="switch">
					<input type="radio" class="switch-input" name="view" value="on" id="on" checked="">
					<label for="on" class="switch-label switch-label-off">On</label>
					<input type="radio" class="switch-input" name="view" value="off" id="off">
					<label for="off" class="switch-label switch-label-on">Off</label>
					<span class="switch-selection"></span>
				</div>
				<div class="switch switch-blue">
					<input type="radio" class="switch-input" name="view2" value="week2" id="week2" checked="">
					<label for="week2" class="switch-label switch-label-off">Week</label>
					<input type="radio" class="switch-input" name="view2" value="month2" id="month2">
					<label for="month2" class="switch-label switch-label-on">Month</label>
					<span class="switch-selection"></span>
				</div>
				
				<div class="switch switch-yellow">
					<input type="radio" class="switch-input" name="view3" value="yes" id="yes" checked="">
					<label for="yes" class="switch-label switch-label-off">Yes</label>
					<input type="radio" class="switch-input" name="view3" value="no" id="no">
					<label for="no" class="switch-label switch-label-on">No</label>
					<span class="switch-selection"></span>
				</div>
			</div>
		</div>
      </div><!-- /row -->
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