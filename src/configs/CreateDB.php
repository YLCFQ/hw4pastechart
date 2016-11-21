<?php

class initDB{
function createDB(){
	//create DB
	$mysql = mysqli_connect(DB_ADDRESS, DB_USER, DB_PASS);
	if (!$mysql) {
    	die('Could not connect: ' . mysql_error());
	}

	$select = mysqli_select_db($mysql, DB_USE);

	if (!$select) {
	$sql = 'CREATE DATABASE '.DB_USE;
	if (!mysqli_query($mysql, $sql)) {
      echo 'Error creating database: '. DB_USE . mysql_error() . "\n";
  	}
	}
	mysqli_close($mysql);


	//create table
	$mysql2 = mysqli_connect(DB_ADDRESS, DB_USER, DB_PASS, DB_USE);
	$query = "SELECT md5 FROM CHARTTABLE";
	$result = mysqli_query($mysql2, $query);

	if(empty($result)) {
        $query = "CREATE TABLE CHARTTABLE (
                          md5 VARCHAR(255) NOT NULL,
                          title VARCHAR(255) NOT NULL,
                          data TEXT NOT NULL,
                          PRIMARY KEY (md5)
                          )";
    $result = mysqli_query($mysql2, $query);

	}


  

	$mysql2->close();

}


}
?>