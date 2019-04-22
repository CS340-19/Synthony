<html>
<head>
    <title>Faculty Portal</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link rel="stylesheet" href="new.css">
</head>

<?php
session_start();
$mysqli = new mysqli("localhost", "cs340", "cs340_s19", "courseeval");
if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	echo "Please try again.";
}
?>

<div class="container">
<body
<div id="nav"><a href="http://34.73.123.138/">Home</a></div>


<h2>Please enter your instructor ID</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<div class="form-group">
		<input type="text" class="form-control" id="instructorID   " name="instructorID" aria-describedy="instructorID" placeholder="Enter Instructor ID">
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>

<br><br>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $instructorID = $_POST["instructorID"];
    $_SESSION["instructorID"] = $instructorID;
    echo '<h2>Select one of your classes to see statistics:</h2>';
    $classes = $mysqli->query("select class_num from teaches where instructorid='$instructorID';");

    if ($classes){
        if ($classes->num_rows == 0){
            echo 'You have not taught any classes.';
        } else {
            $classes->data_seek(0);
            echo '
            <form action="facultystatistics.php" method="post">
            <div class="form-group">
            <select class="form-control" id="class_num" name="class_num">';
            while ($row = $classes->fetch_assoc()){
                echo '<option>' . $row["class_num"] . '</option>';
            }
            echo '</select></div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>';
        }
    } else {echo 'no classes';}


}

session_write_close();
?>

</div>
</body>


</hmtl>
