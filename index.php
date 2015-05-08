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
//isset checks for booleans
if (isset($_GET['code'])) {
	$code = ($_GET['code']);
	$url = 'https://api.instagram.com/oauth/access_token';
	$access_token_settings = array('client_id' => clientID,
									'client_secret' => clientSecret,
									'grant_type' => 'authorization_code',
									'redirect_uri' => redirectURI,
									'code' => $code,
									);


}



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