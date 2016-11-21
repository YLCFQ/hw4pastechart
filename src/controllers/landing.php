<?php
namespace stormwind\hw3\controllers;

require_once('controller.php');
class LandingController extends Controller
{
	public function handleRequest($data) {
		$model = new \stormwind\hw3\models\LandingModel();
		$view = new \stormwind\hw3\views\LandingView();


		$view->render($data);
	}
}
?>