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

		curl_setopt_array($ch, array({
			CURLOPT_URL => $url;
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => 2,
	));
		$result = crul_exec($ch);
		curl_close($ch);
		return $result;
		
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

			$result = json_decode($result, true);
			echo $result['user']['username'];
			}
			else{
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
	<!-- creating a login in for people to give approval for our web app to acce our instagram profile
	After geting arpporval we are now going to have it that information so we can play with it -->
		<a href="https:api.instagram.com/oauth/authorize/?client_id=<?php echo clientID; ?>&redirect_uri=<?php echo redirectURI; ?>&response_type=code">Login</a>

	</body>
	</html>
	<?php 
	}
	 ?>