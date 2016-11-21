<?php
//Landing mvc

include 'src/views/landing.php';
include 'src/controllers/landing.php';
include 'src/models/landing.php';
//Write mvc
include 'src/views/write.php';
include 'src/controllers/write.php';
include 'src/models/write.php';

//Read mvc

include 'src/views/read.php';
include 'src/controllers/read.php';
include 'src/models/read.php';
//GET and POST
include 'src/configs/CreateDB.php';



$db = new initDB();
$db->createDB();

if(isset($_REQUEST['c'])){
	$controller = $_REQUEST['c'];

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

