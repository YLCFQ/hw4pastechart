<?php
namespace stormwind\hw4\tests;

use stormwind\hw4\controllers\FormValidationController;

require_once "../vendor/autoload.php";
require_once "../vendor/simpletest/simpletest/autorun.php";

/**
 *  Provides a single test case to demonstrate using simpletest with
 *  composer. For instructions on this project does, point your browser
 *  at the index.php file in the base folder. To run this unit test point
 *  your browser at test/UnitTestDemoTestCase.php
 */
class UnitTest extends \UnitTestCase
{
    /**
     * Tests that FooController's foo method returns a string "foo"
     */
    function testNumberOfLine()
    {	
    	$arr = "";
    	$i=1;
    	for (;$i < 51; $i++) {
    		$arr = $arr . $i  . ",". $i . "\n";
    	}
    	$arr = $arr.$i.",".$i;
    	echo "<h5>Test data for testNumberOfLine() </h5><br>";
    	echo "<p>$arr </p><br>";
        $controller = new FormValidationController();
        $foo = $controller->validateForm("testTitle", $arr);
        $this->assertEqual($foo, false);
    }

    function testLineLengthConstrains()
    {	
    	$arr = "a,1,";
    	$i=1;
    	for (;$i < 50; $i++) {
    		$arr = $arr.$i;
    	}
    	echo "<h5>Test data for testLineLengthConstrains() </h5><br>";
    	echo "<p>$arr </p><br>";
        $controller = new FormValidationController();
        $foo = $controller->validateForm("testTitle", $arr);
        $this->assertEqual($foo, false);
    }
}
