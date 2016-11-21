<?php
namespace stormwind\hw4\helpers;
require_once('helper.php');

class shareForm extends Helper{
	public function render($data) {
		?>
		<form action="index.php?c=landing&m=genreform" method="get">
		<select name="" style='display:none;'>
		<option value='landing'>Go to write</option>
		</select>
		<select name='m' style='display:none;'>
		<option value='shareform'>Go to write</option>
		</select>
	
		
		<label for=
		<input id=
		<input type="submit" value ='Go'>
		</form>
	}
}

?>