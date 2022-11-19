<?php
// including the database connection file
include_once("config.php");

if (isset($_POST['update'])) {

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);

	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$course = mysqli_real_escape_string($mysqli, $_POST['course']);
	$fees = mysqli_real_escape_string($mysqli, $_POST['fees']);

	// checking empty fields
	if (empty($name) || empty($course) || empty($fees)) {

		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

		if (empty($course)) {
			echo "<font color='red'>course field is empty.</font><br/>";
		}

		if (empty($fees)) {
			echo "<font color='red'>fees field is empty.</font><br/>";
		}
	} else {
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',course='$course',fees='$fees' WHERE id=$id");

		//redirectig to the display pcourse. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while ($res = mysqli_fetch_array($result)) {
	$name = $res['name'];
	$course = $res['course'];
	$fees = $res['fees'];
}
?>
<html>

<head>
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br /><br />

	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name; ?>"></td>
			</tr>
			<tr>
				<td>Course</td>
				<td><input type="text" name="course" value="<?php echo $course; ?>"></td>
			</tr>
			<tr>
				<td>Fees</td>
				<td><input type="text" name="fees" value="<?php echo $fees; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>

</html>