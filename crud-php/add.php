<html>

<head>
	<title>Add Data</title>
</head>

<body>
	<?php
	//including the database connection file
	include_once("config.php");

	if (isset($_POST['Submit'])) {
		$name = mysqli_real_escape_string($mysqli, $_POST['name']);
		$course = mysqli_real_escape_string($mysqli, $_POST['course']);
		$fees = mysqli_real_escape_string($mysqli, $_POST['fees']);

		// checking empty fields
		if (empty($name) || empty($course) || empty($fees)) {

			if (empty($name)) {
				echo "<font color='red'>Name field is empty.</font><br/>";
			}

			if (empty($course)) {
				echo "<font color='red'>Course field is empty.</font><br/>";
			}

			if (empty($fees)) {
				echo "<font color='red'>Email field is empty.</font><br/>";
			}

			//link to the previous page
			echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
		} else {
			// if all the fields are filled (not empty) 

			//insert data to database	
			$result = mysqli_query($mysqli, "INSERT INTO users(name,course,fees) VALUES('$name','$course','$fees')");

			//display success message
			echo "<font color='green'>Data added successfully.";
			echo "<br/><a href='index.php'>View Result</a>";
		}
	}
	?>
</body>

</html>