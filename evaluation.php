<html>
<head>
	<title>Evaluation Start</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>


<?php
session_start();
$mysqli = new mysqli("localhost", "cs377", "cs377_s18", "courseeval");
if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	echo "Please try again.";
}
?>

<div class="container">
<body>

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<div class="form-group">
			<h2 for="enterStudentID">Enter your student ID first.</h2>
			<input type="text" class="form-control" id="studentID" name="studentID" aria-describedy="studentID" placeholder="Enter Student ID">
			<small id="studentIDHelp" class="form-text text-muted">You must be a currently enrolled in classes.</small>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

	<br><br>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$studentID = $_POST["studentID"];
	$_SESSION["studentID"] = $studentID;
	echo '<h2> Your studentID is:</h2>';
	echo $_SESSION["studentID"];
	echo "<h2>Select a class to evaluate. (You can only evaluate classes that you have not yet reviewed!)</h2>";

	$courses = $mysqli->query("select * 
								from class c, student s, takes 
								where s.studentid='$studentID' and s.studentid=takes.studentid and takes.class_num=c.class_num
								and s.studentid not in (select studentid
														from evaluation
														where s.studentid=evaluation.studentid and c.class_num=evaluation.class_num
														)");


	if ($courses) {
		if($courses->num_rows == 0){
			echo 'You are not elligible to review any classes.';
		} else {
			$courses->data_seek(0);
			echo '<form action="submiteval.php" method="post">';
			echo '<div class="form-group">';
			echo '<select class="form-control" id="class_num" name="class_num">';
			while ($row = $courses->fetch_assoc()) {
				echo '<option name=' . $row["class_num"] . '>';
				echo $row["class_num"] . " - " . $row["course_name"] . "(" . $row["semester"] . " " . $row["year"] . ")\n";
				echo '</option>';
			}
			echo '</select>';
			echo '</div>';
			echo '<button type="submit" class="btn btn-primary">Submit</button>';
			echo '</form>';
		}
		
	} else {echo 'Error retrieving courses';}


}
session_write_close();
?>


</body>
</div>

</html>
