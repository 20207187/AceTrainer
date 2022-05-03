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
		if (!$_SESSION["login"]) showcourseform();
		echo courseform($connect);
		?>
		


		
		

		
		<?php include("includes/footer.php"); ?>
	</body>

</html>