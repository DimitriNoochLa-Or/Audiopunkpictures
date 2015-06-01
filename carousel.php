<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

		<link type="text/css" rel="stylesheet"  href="css/main.css">
		<link type="text/css" rel="stylesheet"  href="css/carousel.css">

		<meta charset="utf-8">
		<title>InstApi</title>
	</head>
	<body>
		<header>
		
		</header>
		<div id="carousel-example-generic" class="carousel slide carsel" data-ride="carousel" >
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				<li data-target="#carousel-example-generic" data-slide-to="3"></li>
				<li data-target="#carousel-example-generic" data-slide-to="4"></li>
				<li data-target="#carousel-example-generic" data-slide-to="5"></li>
				<li data-target="#carousel-example-generic" data-slide-to="6"></li>
				<li data-target="#carousel-example-generic" data-slide-to="7"></li>
				<li data-target="#carousel-example-generic" data-slide-to="8"></li>
				<li data-target="#carousel-example-generic" data-slide-to="9"></li>
				<li data-target="#carousel-example-generic" data-slide-to="10"></li>
				<li data-target="#carousel-example-generic" data-slide-to="11"></li>
				<li data-target="#carousel-example-generic" data-slide-to="12"></li>
				<li data-target="#carousel-example-generic" data-slide-to="13"></li>

			</ol>
			<div class="carousel-inner" >
				<div class="item active">
					<p>
					<center class="center">
						<h1>My</h1>
						<h1>Photos</h1>
					</center>
					</p>
				</div class="img center">
				<?php
					foreach($results['data'] as $items){
					$image_url = $items['images']['low_resolution']['url'];// wea re going to go through all of my results 
					//and give myself back the url of the 
					//those pictures because we want to save it in the php sever
					echo '<div class="item img center">';
					echo '<img class="img center" src="'.$image_url.'"/>';
					echo '</div>';
					//calling the function to save the image url
					// savePictures($image_url);
					}
			 	?>
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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</html>