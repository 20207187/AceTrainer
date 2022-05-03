<?php 

function databaseconnection(){
	$connect = mysqli_connect("localhost" , "root" , "password" , "acetrainer");
	return $connect;
}


function registrationform($connect){

	$schoolID = $_POST["schoolID"];
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$password = $_POST["password"];
	$userType = $_POST["userType"];
	$authorisation = $_POST["authorisation"];

	if ($userType == "tutor") $authorisation = 1;
	else if ($userType == "student") $authorisation = 0;


	$database = "INSERT INTO registration (schoolID, firstName, lastName, password, userType, authorisation)VALUES('$schoolID', '$firstName', '$lastName', '$password', '$userType', '$authorisation')";
	if (mysqli_query($connect, $database)){
					echo "Welcome you have registered to the VLE $firstName, $lastName";
	}
	else
	echo "error with registration please try again" . mysqli_error($connect);
				

				
				
}



function loginform($connect) {
	$schoolID = $_POST["schoolID"];
	$password = $_POST["password"];

	$database = "SELECT * FROM registration
			WHERE schoolID = '$schoolID' 
			AND password = '$password'";
	$result = mysqli_query($connect, $database);



	if(mysqli_num_row($result) > 0) {
		$row = mysqli_fetch_array($result);
		$firstName = $row["firstName"];
		$lastName = $row["lastName"];
		$userType = $row["userType"];
		$authorisation = $row["authorisation"];

		if ($authorisation == "1") {
			$_SESSION["login"] = true;
			$_SESSION["schoolID"] = $schoolID;
			$_SESSION["firstName"] = $firstName;
			$_SESSION["lastName"] = $lastName;
			$_SESSION["userType"] = $userType;

			//echo "welcome"

		if ($userType == "student") header("Location: student.php");
		else if ($userType == "tutor") header("Location: tutor.php");
					
		}
		else {
			echo "<p>you have not been authorised/p>";
		
	}

}
}


function showLoginForm() {
	echo '
		<form method = "post" action = "login.php">
					<label for = "schoolID"> SchoolID </label>
					<input type = "text" name="schoolID"/>
					<br/><br/>
					<label for = "password">password</label>
					<input type="text" name="password"/>
					<br/><br/>
					<input type="submit" value = "login"/>
				</form>';
}

function showRegistrationForm() {
	echo'

	<form method ="post" action="registration.php">
			<table>
				<tr>
					<label for="schoolID"> SchoolID</label>
					<input type="text" name="schoolID">
				</tr>
				<tr>
					<label for="firstName"> firstName</label>
					<input type="text" name="firstName">
				</tr>
				<tr>
					<label for="lastName"> lastName</label>
					<input type="text" name="lastName">
				</tr>
				<tr>
					<label for="password"> password</label>
					<input type="text" name="password">
				</tr>
				<tr>
					<label for="userType">usertype</label>
					<select name="userType">
						<option value="Student">student</option>
						<option value="Student">tutor</option>
						<option value="Student">admin</option>
					</select>
				</tr>
			</table>
			<input type="submit" value="Register"/>
		</form>
		';
}

function showcourseform() {
	echo '
		<form method = "post" action = "tutor.php">
					<label for = "courseid"> course ID </label>
					<input type = "number" name="courseid"/>
					<br/><br/>
					<label for = "name">courseName</label>
					<input type="text" name="name"/>
					<br/><br/>
					<label for = "coursevalue">coursevalue</label>
					<input type="number" name = "coursevalue"/>
					<br/><br/>
					<input type="submit" value = "submit"/>
				</form>';
}

function courseform($connect){
	if (isset($_POST["courseid"])) {
		$courseid = $_POST["courseid"];
		$name = $_POST["name"];
		$coursevalue = $_POST["coursevalue"];
		$schoolID = $_SESSION["schoolID"];



		$database = "INSERT INTO courses (courseid, name, coursevalue, );VALUES('$courseid', '$name', '$coursevalue', '$schoolID')";
		if (mysqli_query($connect, $database)) {
		echo "you have added a course";
		
		}
		else{
			echo "there was an error adding a course";
		
		
		}
	}	
}

function tutorAuthorisation(){
		if (isset($_SESSION["schoolID"]) && $_SESSION["schoolID"] != "tutor"  || isset($_SESSION["schoolID"])) {
		header("Location: index.php");
	}
}


function studentAuthorisation(){

		if (isset($_SESSION["schoolID"]) && $_SESSION["schoolID"] != "student"  || isset($_SESSION["schoolID"])) {
		header("Location: index.php");
	}
}
?>

//more will get added in later on when we get further in the code