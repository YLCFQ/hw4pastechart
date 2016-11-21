<?php
namespace stormwind\hw4\helpers;
require_once('helper.php');

class genreForm extends Helper{
	public function render($data) {
		echo "<form action='index.php?c=landing&m=genreform' method='get'>";
		echo "<select name='c' style='display:none;'>";
		echo "<option value='landing'>Go to write</option>";
		echo "</select>";
		echo "<select name='m' style='display:none;'>";
		echo "<option value='genreform'>Go to write</option>";
		echo "</select>";
		if(isset($data['appliedFilter'])){
	echo "<input type='text' name='filter' value='" . $data['appliedFilter'] . "' placeholder='Phrase Filter'>";
		}else{
				echo "<input type='text' name='filter' placeholder='Phrase Filter'>";
		}
	
		echo "<select name='genre'>";
		echo "<option selected value='allgenres'> All Genres </option>";
		for ($i = 0 ; $i < sizeof($GLOBALS['genres']) ; $i++) {
			if($data['selectedGenre'] == $GLOBALS['genres'][$i]){
				echo "<option selected value='" . $GLOBALS['genres'][$i] . "'>" . $GLOBALS['genres'][$i]. "</option>";
				}else{
				echo "<option value='" . $GLOBALS['genres'][$i] . "'>" . $GLOBALS['genres'][$i]. "</option>";
			}

		}
		echo "</select>";
		echo "<input type='submit' value ='Go'>";
		echo "</form>";
	}
}

?>