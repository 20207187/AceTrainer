<?php 

function databaseconnection(){
	$connect = mysqli_connect("localhost" , "root" , "password" , "acetrainer");
	return $connect;
}


function registrationform(){
	if (isset($_POST["schoolID"])){
				$schoolID = $_POST["schoolID"];
				$firstName = $_POST["firstName"];
				$lastName = $_POST["lastName"];
				$password = $_POST["password"];
				$userType = $_POST["userType"];


				$database = "INSERT INTO registration (schoolID, firstName, lastName, password, userType, authorisation)VALUES('$schoolID', '$firstName', '$lastName', '$password', '$userType', '0' )";
}


?>

//more will get added in later on when we get further in the code