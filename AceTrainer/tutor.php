<?php 
//	@session_start();
//tutorAuthorisation();
?>


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

		<h2>AceTrainer</h2>

		<p>tutor</p> 
		<?php 
		if (isset($_POST["name"])) courseform($connect);
		else showcourseform($connect);
		?>
		<?php

		tutorauthstudent($connect);
			
		
		?>



	</body>

</html>