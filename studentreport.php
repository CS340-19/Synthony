<html>
<head>
    <title>Class Statistics</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>

<?php
session_start();
$mysqli = new mysqli("localhost", "cs340", "cs340_s19", "courseeval");
if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	echo "Please try again.";
}

$instructors = $mysqli->query("select fname, lname from instructor order by lname;");

?>

<div class="container">
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<div class="form-group">
			<h2 for="enterStudentID">Please select an instructor to continue:</h2>
            <select class="form-control" id="selectinstructor" name="instructor">
            <?php
                if ($instructors->num_rows == 0){
                    echo 'Error: no instructors found.';
                } else {
                    $instructors->data_seek(0);
                    while ($row = $instructors->fetch_assoc()) {
                        echo '<option>';
                        echo $row["lname"] . ', ' . $row["fname"];
                        echo '</option>';
                    }
                }

            ?>
            </select>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

	<br><br>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $_SESSION["instructor"] = $_POST["instructor"];
    $name = explode(', ', $_POST["instructor"]);
    $fname = $name[1];
    $lname = $name[0];
    $_SESSION["fname"] = $fname;
    $_SESSION["lname"] = $lname;
    $classes = $mysqli->query("select distinct(course_name) from instructor, teaches, class
                                where fname='$fname' and lname='$lname'
                                and instructor.instructorid = teaches.instructorid
                                and teaches.class_num = class.class_num;");
    echo '
    <h2> Instructor: ' . $lname . ', ' . $fname . '</h2>
    <h2>Select a class to see statistics:</h2>
    <form action="studentstatistics.php" method="post">
    <div class="form-group">
    <select class="form-control" id="select" name="class">
    ';
    if ($classes->num_rows == 0){
        echo 'Error: no classes found!';
    } else {
        $classes->data_seek(0);
        while ($row = $classes->fetch_assoc()){
                echo '<option>';
                echo $row["course_name"];
                echo '</option>';
        }
    }
    echo '
    </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>';

}

session_write_close();

?>


</body>
</div>

</html>
