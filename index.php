<?php 
//Configuration for out PHP Sever
set_time_limit(0);
ini_set('default_socket_timeout', 300);
session_start();

//make Constants using define 
define('client_ID', '6adf1fecc34bac4847a5085fc40cf19');
define('client_Secret', 'f927f361c731457f97e3cc97e4e25b37');
define('redirectURI', 'http://localhost/Audiopunkpictures/index.php');
define('ImageDirectory', 'pics/');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!-- creating a login in for people to give approval for our web app to acce our instagram profile
After geting arpporval we are now going to have it that information so we can play with it -->
	<a href="https:api.instagram/oauth/authorize/?client_id=<?php echo clientID; ?>&redirect_uri=<?php echo redirectURI; ?>&response_type=code">Login</a>

</body>
</html>