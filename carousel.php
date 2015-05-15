<!-- <!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link type="text/css" rel="stylesheet"  href="css/bootstrap.css">
		<link type="text/css" rel="stylesheet"  href="css/bootstrap.css.map">
		<link type="text/css" rel="stylesheet"  href="css/bootstrap-theme.css">
		<link type="text/css" rel="stylesheet"  href="css/bootstrap-theme.css.map">
		<link type="text/css" rel="stylesheet"  href="css/main.css">
		<meta charset="utf-8">
		<title>InstApi</title>
	</head>
	<body>
		<header>
			My Photos
		</header>
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				<li data-target="#carousel-example-generic" data-slide-to="3"></li>
				<li data-target="#carousel-example-generic" data-slide-to="4"></li>
			</ol>
			<div class="carousel-inner" >
				<div class="item active carsel">	
					<?php 
					//require_once(__DIR__ . "/pic.php"); 
					?>	
				</div>
				<div class="item carsel">
					<?php 
					//require_once(__DIR__ . "/pic.php"); 
					?>					
				</div>
				<div class="item carsel">
					<?php 
					//require_once(__DIR__ . "/pic.php"); 
					?>	
				</div>
				<div class="item carsel">
					<?php 
					//require_once(__DIR__ . "/pic.php"); 
					?>	
				</div>
				<div class="item carsel">
					<?php 
					//require_once(__DIR__ . "/pic.php"); 
					?>	
				</div>
			</div>
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</body>
	<script src="js/main.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</html> -->
<body class="background2">
<head>
	<link rel="stylesheet" type="text/css" href="css/carousel.css">
</head>

	<div id="wrapper">
			<?php
			foreach($results['data'] as $items){
			$image_url = $items['images']['low_resolution']['url'];// wea re going to go through all of my results 
			//and give myself back the url of the 
			//those pictures because we want to save it in the php sever
			echo '<img src="'.$image_url.'"/>';
			//calling the function to save the image url
			savePictures($image_url);
		}
			 ?>
		</div>
	</div>
</body>