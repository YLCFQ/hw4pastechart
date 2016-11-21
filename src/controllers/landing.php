<?php
namespace stormwind\hw4\controllers;

require_once('controller.php');
class LandingController extends Controller
{
	public function handleRequest($data) {
		$view = new \stormwind\hw4\views\LandingView();


		$view->render($data);
	}
}
?>