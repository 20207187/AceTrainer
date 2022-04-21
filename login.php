<html>
	<head>
		<title>AceTrainer</title>
	</head>

	<body>
		<h1>acetrainer</h1>
		<?php
			include("includes/header.php");
			include("includes/taskbar.php");
		?>
			

		<h1> please login </h1>


		<?php
			if (isset($_POST["schoolID"])) {
				$schoolID = $_POST["schoolID"];
				$password = $_POST["password"];

				$database = "SELECT * FROM registration
						WHERE (schoolID = '$schoolID' 
						AND password = '$password')";
				$result = mysqli_query($connect, $database);

				echo "<p> welcome you are logged in $schoolID</p>";

				if(mysqli_num_row($result) > 0) {
					$_SESSION["schoolID"] = $schoolID;
					$_SESSION["firstName"] = $firstName;
					$_SESSION["lastName"] = $lastName;
					$_SESSION["userType"] = $userType;
					echo "<p> welcome you are logged in $schoolID</p>";
				}
				else {
					echo "<p>the username or password is wrong please try again</p>";
				}
			}

			if (!$_SESSION["login"]) {

		?>

			<form method = "post" action = "login.php">
				<label for = "SchoolID"> SchoolID </label>
				<input type = "text" name="SchoolID"/>
				<br/><br/>
				<label for = "password">password</label>
				<input type="text" name="password"/>
				<br/><br/>
				<input type="submit" value = "Submit"/>
			</form>

		
		<?php
			}	
		?>

		<?php include("includes/footer.php"); ?>
	</body>

</html>