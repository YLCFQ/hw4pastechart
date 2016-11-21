<?php
namespace stormwind\hw4\models;

require_once('model.php');

class DrawModel extends Model{
	//controller will sanatize the variables
	public function getDataFromDatabase($key){
		$info = array();
		$result = mysqli_query($this->mysql, "SELECT title, data FROM CHARTTABLE WHERE md5 = '$key'");
		if ($result) {
			while($row = mysqli_fetch_assoc($result)) {
				array_push($info, $row['title']);
				array_push($info, $row['data']);
			}
		}
		return $info;
	}
	

}

?>