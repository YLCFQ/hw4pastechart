<?php
namespace stormwind\hw4\controllers;
ob_start();

require_once('controller.php');

class DrawController extends Controller
{

	public function drawData ($data) {

		$model = new \stormwind\hw4\models\DrawModel();
		$view = new \stormwind\hw4\views\DrawView();
		$model->initConnection();
		$arr = array();
		array_push($arr, $data['arg1']);
		$key = $data['arg2'];

		$result = $model->getDataFromDatabase($key);
		array_push($arr, $key);
		array_push($arr, $result[0]);
		array_push($arr, $result[1]);

		$view->render($arr);


	}
}
?>