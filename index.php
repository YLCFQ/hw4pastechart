<?php
//Landing mvc

include 'src/views/landing.php';
include 'src/controllers/landing.php';
include 'src/configs/CreateDB.php';
include 'src/configs/Config.php';

include 'src/controllers/write.php';
include 'src/models/write.php';

include 'src/controllers/draw.php';
include 'src/models/draw.php';
include 'src/views/draw.php';

include 'src/controllers/FormValidationController.php';


$db = new 

initDB();
$db->createDB();

if(isset($_REQUEST['c'])){
	$controller = $_REQUEST['c'];
    if ($controller == "landing"){
	if (isset($_REQUEST['a'])) {
		$method = $_REQUEST['a'];
		if ($method == "shareform") {
			$validation = new stormwind\hw4\controllers\FormValidationController();
			if (!$validation->validateForm($_REQUEST['title'], $_REQUEST['content']))  {
				echo '<script language="javascript">';
				echo 'alert("Error: Invalid form data")';
				echo '</script>';
				$landingController = new stormwind\hw4\controllers\LandingController();
				$landingController->handleRequest($_REQUEST);
			} else {
				$writeController = new stormwind\hw4\controllers\writeController();
                $writeController->writeData($_REQUEST['title'], $_REQUEST['content']);
			}
		}
	}
    } else if ($controller == "chart") {
        $drawController = new stormwind\hw4\controllers\DrawController();
        $drawController->drawData($_REQUEST);
    }


}
else{
$landingController = new stormwind\hw4\controllers\LandingController();
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

