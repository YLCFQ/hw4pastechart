<?php
namespace stormwind\hw4\controllers;

require_once('controller.php');
class FormValidationController extends Controller
{
	public function validateForm($title, $content) {
    $x = $title;
    $y = $content;
    $arr = explode("\n", $y);
    if ($x == "") {
        echo "
            <script>alert('Title must be filled out')</script>;
            ";
        return false;
    }
    
    if (strlen($y) == 0) {
        echo "
            <script>alert('Content must be filled out')</script>;
        ";

    	return false;
    }
    if (count($arr) > 50) {
        echo "
            <script>alert('Content lines must be lower than 50')</script>;
        ";

    	return false;
    }
    for ($i = 0 ; $i <count($arr) ; $i++) {
    	$subarr = explode(",",$arr[$i]);

    	if (strlen($arr[$i]) > 80) {
            echo "
            <script>alert('Each rows must be lower than 80 characters')</script>;
            ";
    		return false;
    	}
    
    	if (count($subarr) > 6 || count($subarr) <= 0) {
            echo "
            <script>alert('The sources have to less than or equal to 5 and greater 0 each row')</script>;
            ";
    		return false;
    	}
    	if ($subarr[0] == "") {
            echo "$i";
            echo "
            <script>alert('The first coordinate must be a nonempty strin')</script>;
            ";
    		return false;
    	}
    }
    
    return true;
}

}
?>