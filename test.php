<!DOCTYPE html>
<html>
<body>

<?php
	echo "My first PHP script!<div style='width:200px; height:200px; border:1px solid #000;'></div> ", strlen("My first PHP script!<div style='width:200px; height:200px; border:1px solid #000;'></div> "), str_word_count("My first PHP script!<div style='width:200px; height:200px; border:1px solid #000;'></div>");
	$car = "blue toyota";
	$fruit = "yellow banana";
	echo $car . " " . $fruit;
	$colours = array("blue", "yellow", "green", "red");
	$x = 5;
	$y = 7;
	function Car(){
		$this->model = "";
		$this->colour = "";
		$this->year = "";
	}
	


	echo "<br />";
	$t = date("H");
	if ($t < 20 || $t < "20") {
	    echo "Have a good day!";
	} else {
	    echo "Have a good night!";
	}
	echo "<br />";

	foreach ($colours as $colour){
		echo "A colour is $colour<br />";
	}
	
	function math(){
		global $x, $y, $colours;
		echo $x . $y;
		static $z = 0; //Keep variable for further function executions as variables are deleted after the function is executed
		echo "<br />$z";
		echo "<br />$colours[1]<br />";
		var_dump($z); //Return variable type
		$z += 1;
	}
	math();
	math();
	math();



	echo "<br /><br /><br />";
	$servername = "localhost";
	$username = "aarontum_admin";
	$password = "password";

	$conn = mysqli_connect($servername, $username, $password);

	if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
	echo "Connection success";

	$sql = "CREATE TABLE tbl_Users (
	id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(20) NOT NULL,
	password VARCHAR(20) NOT NULL,
	email VARCHAR(40),
	reg_date TIMESTAMP
	)";

	if (mysqli_query($conn, $sql)){
		echo "Table successfully created.";
	}
	else{
		echo "Table creation failed.";
	}

	mysqli_close($conn);

?>

</body>
</html>