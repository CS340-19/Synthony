<html>
<head>
    <title>Evaluation Submit</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link rel="stylesheet" href="new.css">
</head>

<?php
$mysqli = new mysqli("localhost", "cs340", "cs340_s19", "courseeval");
if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	echo "Please try again.";
}
?>

<div class="container">
<body>
  <div id="nav"><a href="http://34.73.123.138/">Home</a></div>

<?php
session_start();
$class_num = $_SESSION["class_num"];
$studentID = $_SESSION["studentID"];
$class_num = substr($class_num, 0, 4);

$count = $mysqli->query("select count(*) from evaluation
                        where studentid='$studentID'
                        and class_num='$class_num';");
$count->data_seek(0);
$num = $count->fetch_assoc();
$count = $num["count(*)"];
if ($count > 0){ //check to make sure the user didn't already submit the evaluation
    echo 'Sorry, you have already reviewed this class.';
    echo '<br>';
    echo '<a href="home.php"><button type="button" class="btn btn-primary">Go home</button></a>';
    exit(0);
}


$questions = $mysqli->query("select question.questionid, question.type, question.text, question.options
                            from class, question, class_question
                            where class.class_num='$class_num'
                            and class.class_num = class_question.class_num
                            and class_question.questionid = question.questionid
                            order by question.questionid;");

$answerid = $mysqli->query("select answerid from answer order by answerid desc limit 1;");
$answerid->data_seek(0);
$max = $answerid->fetch_assoc();
$answerid = $max["answerid"];

$evalid = $mysqli->query("select evalid from evaluation order by evalid desc limit 1;");
$evalid->data_seek(0);
$max = $evalid->fetch_assoc();
$evalid = $max["evalid"];


if ($questions){

    $mysqli->begin_transaction(); //Transaction to guarantee all parts of application are inserted into database
    $questions->data_seek(0);
    $answerid++;
    $evalid++;
    $mysqli->query("insert into evaluation
                    values ('$evalid', '$studentID', '$class_num');");
    while ($row = $questions->fetch_assoc()){
        $questionid = $row["questionid"];
        $response = $_POST["$questionid"];
        if (empty($response)) {
            $mysqli->rollback();
            echo 'Sorry, but you must answer all of the questions. Please answer: ' . $row["text"];
            echo '<br>';
            echo '<a href="evaluation.php"><button type="button" class="btn btn-primary">Go back</button></a>';
            exit(0);
        } else if ($row["type"]=="FT" && $response==""){
            $mysqli->rollback();
            echo 'Sorry, but you must answer all of the questions. Please answer: ' . $row["text"];
            echo '<br>';
            echo '<a href="evaluation.php"><button type="button" class="btn btn-primary">Go back</button></a>';
            exit(0);
        }
        $mysqli->query("insert into answer values ('$answerid', '$response', '$questionid');");
        $mysqli->query("insert into eval_answer values ('$evalid', '$answerid');");
        $answerid++;
    }
    echo '<h2>Evaluation submitted! Thank you for participating.</h2>';
    $mysqli->commit(); //commit transaction
    echo '<a href="home.php"><button type="button" class="btn btn-primary">Go home</button></a>';
}

session_write_close();
?>



</body>
</div>


</html>
