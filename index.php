<?php
//Landing mvc

include 'src/views/landing.php';
include 'src/controllers/landing.php';

if(isset($_REQUEST['c'])){
	$controller = $_REQUEST['c'];
	if (isset($_REQUEST['a'])) {
		$method = $_REQUEST['a'];
		if ($method == "shareform") {
			if (validateForm($_REQUEST['title'], $_REQUEST['content']))  {
				
			}
		}
	}

}else{
$landingController = new stormwind\hw3\controllers\LandingController();
$landingController->handleRequest($_REQUEST);



}


?>



<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>

</body>
</html>

