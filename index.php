	<?php 
	//Configuration for out PHP Sever
	set_time_limit(0);
	ini_set('default_socket_timeout', 300);
	session_start();

	//make Constants using define 
	define('clientID', '6adf1fecc34b4ac4847a5085fc40cf19');
	define('clientSecret', 'f927f361c731457f97e3cc97e4e25b37');
	define('redirectURI', 'http://localhost/Audiopunkpictures/index.php');
	define('ImageDirectory', 'pics/');

	//function that is going ton connect to instagram
	function connectToInstagram($url){
		$ch = curl_init();

		curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => 2,
		));
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
		
	}
	// function to get userID cause userName doesnt allow us to get pictures!
	function getUserID($userName){
			$url = 'https://api.instagram.com/v1/users/search?q=' . $userName.'&client_id='.clientID;
			$instagramInfo = connectToInstagram($url);
			$result = json_decode($instagramInfo, true);

			return $result['data']['0']['id'];
	}
// fucntion hto print out images on to a screen
	function printImages($userID){
		$url = 'https://api.instagram.com/v1/users/'. $userID. '/media/recent?client_id='. clientID. '&count=0';
		$instagramInfo = connectToInstagram($url);
		$results = json_decode($instagramInfo, true); 
		///parse thru the information one by one.
		require_once(__DIR__ . "/carousel.php");

		
	}
//funciton to save image to server
	function savePictures($image_url){
			
			$filename = basename($image_url);// the filename is what we are storing. basename is PHP built in method that we are using to stor $image_url
			echo $filename. "<form action='$image_url'> <input type ='submit' class='fullscreen' value='fullscreen'></form>" . "<br>"; //goes adne grabs an imagefile and stores it into out server/

			$destination = ImageDirectory . $filename;//makign sure that the image doesnt exist in the storage
			file_put_contents($destination, file_get_contents($image_url));

	}

	//isset checks for booleans
	if (isset($_GET['code'])) {
		$code = ($_GET['code']);
		$url = 'https://api.instagram.com/oauth/access_token';
		$access_token_settings = array('client_id' => clientID,
										'client_secret' => clientSecret,
										'grant_type' => 'authorization_code',
										'redirect_uri' => redirectURI,
										'code' => $code
										);
	//cURL is what we use in PHP, its a library calls to other API's.
		$curl = curl_init($url); //seeting a cURL session and we put in $url becuase thats where we are getting the data from.
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $access_token_settings);// setting the POSTFIELDS to the array setup that we created.
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);	//Setting it equal to one becauase we are getting strings back.
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //but in live workproduction we want to set this to true.

			$result = curl_exec($curl);
			curl_close($curl);

			$results = json_decode($result, true);

			$userName = $results['user']['username'];

			 $userID = getUserID($userName);

			printImages($userID);
			
			?>
		  	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
  <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">

	</head>
	<body class="background2">
		
		
	<!-- creating a login in for people to give approval for our web app to acce our instagram profile
	After geting arpporval we are now going to have it that information so we can play with it -->

	</body>
		<script scr="http://code.jquery.com/jquery-latest.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</html>

	<?php 
		}else{
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">


	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">

	</head>
	<body class="background">
		<!-- <nav class="navbar navbar-inverse navbar-fixed-top">
			<div class=" container-fluid">
				<div class="navbar-header">
					<h3>Welcome to my Webpage</h3>
  					
				</div>
			</div>
		</nav> -->
		<div class="jumbotron">
			<div class="container">  
  				<h1 class="	glyphicon glyphicon-flash">Welcome <h1 class="glyphicon glyphicon-flash"></h1></h1>
  				<a class=" a btn btn-primary btn-lg"  role="button" href="https://api.instagram.com/oauth/authorize/?client_id=<?php echo clientID; ?>&redirect_uri=<?php echo redirectURI; ?>&response_type=code">My Instagram</a>
			</div>
		</div>
	<!-- creating a login in for people to give approval for our web app to acce our instagram profile
	After geting arpporval we are now going to have it that information so we can play with it -->

	</body>
		<script scr="http://code.jquery.com/jquery-latest.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</html>
	<?php 
}
	 ?>