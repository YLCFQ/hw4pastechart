<?php
namespace stormwind\hw4\views;

require_once('view.php');
require_once('elements/h1.php');
require_once('elements/title.php');
require_once('helpers/shareform.php');

class LandingView extends View{
	public function render($data){
		//Declare the classes I will be using here
		$h1 = new \stormwind\hw4\elements\h1();
		$title = new \stormwind\hw4\elements\title();
		$shareForm = new \stormwind\hw4\helpers\shareForm();

		

		echo $title->render("PasteChart").$h1->render("PasteChart");
		echo "<h3>Share your data in charts!</h3>";
		$shareForm->render("xx");
	}
}
?>