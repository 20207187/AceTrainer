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

		<?php 

			if (isset($_POST["schoolID"])){
				$schoolID = $_POST["schoolID"];
				$firstName = $_POST["firstName"];
				$lastName = $_POST["lastName"];
				$password = $_POST["password"];
				$userType = $_POST["userType"];

// find a incryption
				
				$database = "INSERT INTO registration (schoolID, firstName, lastName, password, userType, authorisation)VALUES('$schoolID', '$firstName', '$lastName', '$password', '$userType', '0' )";

				


			
				if (mysqli_query($connect, $database)){

					echo "Welcome you have registered to the VLE $firstName, $lastName";
				}
				else echo "error with registration please try again" . mysqli_error($connect);
			}




			?>

		
		<h1>registration</h1>
		<p>please register yourself using our form below</p>


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

			



			

		

		<?php include("includes/footer.php"); ?>
	</body>

</html>