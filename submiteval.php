<html>
<head>
    <title>Class Evaluation: <?php echo $_POST["class_num"];?> </title>
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
$_SESSION["class_num"]=$_POST["class_num"];
?>

<h2>Class Evaluation for <?php echo $_POST["class_num"];?> </h2>
<br><br>

<div class="container">
<body>
  <div id="nav"><a href="http://34.73.123.138/">Home</a></div>

<?php
$classnum = substr($_POST["class_num"], 0, 4);
//questions to be answered by the student
$questions = $mysqli->query("select question.questionid, question.type, question.text, question.options
                            from class, question, class_question
                            where class.class_num='$classnum'
                            and class.class_num = class_question.class_num
                            and class_question.questionid = question.questionid
                            order by question.questionid;");

if ($questions){
    if($questions->num_rows == 0){
        echo 'Error: no questions found.';
    } else {
        $questions->data_seek(0);
        echo '<form action="evalsubmitted.php" method="post">';
        $number = 1;

        while ($row = $questions->fetch_assoc()) {
            echo '<h3>Question ' . $number . ': ' . $row["text"] . '</h3>';
            switch ($row["type"]){
                case "MC":
                    echo '<div class="form-group">';
                    echo '<select class="form-control" id="select" name="' . $row["questionid"] . '">';
                    $options = explode(',', $row["options"]);
                    foreach ($options as $option){
                        echo '<option>';
                        echo $option;
                        echo '</option>';
                    }
                    echo '</select>';
                    echo '</div>';
                    break;
                case "110":
                    echo '<div class="form-group">';
                    echo '<select class="form-control" id="select" name="' . $row["questionid"] . '">';
                    for ($i = 1; $i <= 10; $i++){
                        echo '<option>';
                        echo $i;
                        echo '</option>';
                    }
                    echo '</select>';
                    echo '</div>';
                    break;
                case "AD":
                    echo '
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="' . $row["questionid"] . '" value="Strongly Agree">
                        <label class="form-check-label" for="sagree">Strongly Agree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="' . $row["questionid"] . '" id="agree" value="Agree">
                        <label class="form-check-label" for="agree">Agree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="' . $row["questionid"] . '" id="neutral" value="Neutral">
                        <label class="form-check-label" for="neutral">Neutral</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="' . $row["questionid"] . '" id="disagree" value="Disagree">
                        <label class="form-check-label" for="disagree">Disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="' . $row["questionid"] . '" id="sdisagree" value="Strongly Disagree">
                        <label class="form-check-label" for="sagree">Strongly Disagree</label>
                    </div>
                    <br>
                    ';
                    break;
                case "FT":
                    echo '
                    <div class="form-group">
                        <textarea class="form-control" id="freetext" name="' . $row["questionid"] . '" rows="3" maxlength="500"></textarea>
                    </div>
                    ';
                    break;

            }
            $number++;
        }
        echo '<br><br>';
        echo '<button type="submit" class="btn btn-primary">Submit</button>';
        echo '</form>';
    }
} else {
    echo 'Error retrieving questions';
}
session_write_close();
?>


</body>
</div>
</html>
