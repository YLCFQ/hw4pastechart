<?php
namespace stormwind\hw4\controllers;

require_once('controller.php');

class WriteController extends Controller
{

	public function writeData ($title, $content) {
		$model = new \stormwind\hw4\models\WriteModel();
		$model->initConnection();
		$str = md5($content);
		$model->insertDataIntoDatabase($str, $title, $content);
		header("Location: http://localhost/hw4/index.php?c=chart&a=show&arg1=LineGraph&arg2=".$str);

	}
}
?>