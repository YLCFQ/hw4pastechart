<?php
namespace stormwind\hw4\models;

require_once('model.php');

class WriteModel extends Model{
	//controller will sanatize the variables
	public function insertDataIntoDatabase($hashNumber,$title, $data){
		$strHash = gettype($hashNumber);
		$result = mysqli_query($this->mysql, "INSERT INTO CHARTTABLE Values('$hashNumber', '$title', '$data')");
		if (!$result) {
			$a = mysqli_error($this->mysql);
			echo "$a";
		}
	}
	

}

?>