<?php
//Landing mvc

include 'src/views/landing.php';
include 'src/controllers/landing.php';
include 'src/configs/CreateDB.php';
include 'src/configs/Config.php';

include 'src/controllers/write.php';
include 'src/models/write.php';

$db = new initDB();
$db->createDB();

if(isset($_REQUEST['c'])){
	$controller = $_REQUEST['c'];
    if ($controller == "landing"){
	if (isset($_REQUEST['a'])) {
		$method = $_REQUEST['a'];
		if ($method == "shareform") {
			
			if (!validateForm($_REQUEST['title'], $_REQUEST['content']))  {
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
        echo "draw graph";
    }


}
else{
$landingController = new stormwind\hw4\controllers\LandingController();
$landingController->handleRequest($_REQUEST);

}





function validateForm($title, $content) {
    $x = $title;
    $y = $content;
    $arr = explode("\n", $y);
    if ($x == "") {
        alert("Title must be filled out");
        return false;
    }
    
    if (strlen($y) == 0) {
    	alert("Content must be filled out");

    	return false;
    }
    if (count($arr) > 50) {
    	alert("Content lines must be lower than 50");

    	return false;
    }
    for ($i = 0 ; $i <count($arr) ; $i++) {
    	$subarr = explode(",",$arr[$i]);

    	if (count($arr[$i]) > 80) {
    		alert("Each rows must be lower than 80 characters");
    		return false;
    	}

    	if (count($subarr) > 5 || count($subarr) <= 0) {
    		alert("The sources have to less than or equal to 5 and greater 0 each row");
    		return false;
    	}
    	if ($subarr[0] == "") {
    		alert("The first coordinate must be a nonempty string");
    		return false;
    	}
    }
    
    return true;
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

