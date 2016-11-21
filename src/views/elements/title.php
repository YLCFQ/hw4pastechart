<?php
namespace stormwind\hw4\elements;

require_once('element.php');

class title extends Element{
	public function render($data){
		return "<h1><title>" . $data . "</title></h1>";
	}
}

?>