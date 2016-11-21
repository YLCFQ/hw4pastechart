<?php
namespace stormwind\hw3\views;

require_once('view.php');
require_once('elements/h1.php');
require_once('elements/Link.php');
require_once('helpers/form.php');


class LandingView extends View{
	public function render($data){
		//Declare the classes I will be using here
		$h1 = new \stormwind\hw4\elements\h1();
		$title = new \stormwind\hw4\elements\title();
		



		echo $title->render("PasteChart").$h1->render("PasteChart") 
		echo "<h3>Share your data in charts!</h3>"

	}
}
?>