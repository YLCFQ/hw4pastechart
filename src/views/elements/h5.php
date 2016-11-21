<?php
namespace stormwind\hw4\elements;
require_once('element.php');

class h5 extends Element{
	public function render($data){
		return "<h5>" . $data . "</h5>";
	}
}
?>