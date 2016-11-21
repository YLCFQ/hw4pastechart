<?php
namespace stormwind\hw4\helpers;
require_once('helper.php');

class h3orderedList extends Helper{
	public function render($data) {
		echo "<h3>" . $data['title'] . "</h3>";
		echo "<ol>";
		for ($i = 0; $i < sizeof($data['list']); $i++){
			echo "<li> <a href='index.php?c=read&storyId=". $data['list'][$i]['id'] .  "'>" . $data['list'][$i]['title'] ."</a></li>";
		}
		echo "</ol>";
	}
}

?>