<?php

include 'database.php';

if(isset($_POST["input_form"])){
	echo $_POST["input_form"];
	$date = $_POST["date_first"];
	$date = (string)$date;
	$min_value = $_POST["min_value"];
	$max_value = $_POST["max_value"];

	enter_the_values($date, $min_value, $max_value, $conn);
}

if(isset($_GET["output_form"])){
	$date1 = $_GET["start_date"];
	$date2 = $_GET["end_date"];
	
	get_the_values($date1, $date2, $conn);
}

function get_the_values($date1, $date2, $conn){
	$sql = "select * from power_generation where power_date BETWEEN '$date1' AND '$date2'";
$result = $conn->query($sql);
//$conn->close();
header("Location: file4.html?result=".$result);

		
}

function enter_the_values($date, $min_value, $max_value, $conn){
	//$date = $date->getTimestamp();
	
	$sql = "insert into power_generation (power_date, min_value, max_value) values('$date', $min_value, $max_value)";
	//if($conn) { echo "thusahr"; }else  echo "no Connect";
	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//$conn->close();
header("Location: file1.html");

}