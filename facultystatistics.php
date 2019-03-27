<html>
<head>
	<title>Evaluation Start</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
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
<body>

<h2>Instructor ID: <?php echo $_SESSION["instructorID"]; ?>
<h2>Your class statistics for <?php echo $_POST["class_num"];?></h2>
<br>
<br>

<?php
$class_num = $_POST["class_num"];
//questions to get statistics for
$questions = $mysqli->query("select question.questionid, question.type, question.text, question.options
                            from class, question, class_question
                            where class.class_num='$class_num'
                            and class.class_num = class_question.class_num
                            and class_question.questionid = question.questionid
                            order by question.questionid;");

if ($questions){
    if ($questions->num_rows == 0){
        echo 'Error: no results found.';
    } else {
        $questions->data_seek(0);
        while ($row = $questions->fetch_assoc()){
            $questionid = $row["questionid"];
            //get the total number of responses.
            $num_responses = $mysqli->query("select count(*)
                                            from answer, eval_answer, evaluation, class
                                            where answer.questionid = '$questionid'
                                            and answer.answerid = eval_answer.answerid
                                            and eval_answer.evalid = evaluation.evalid
                                            and evaluation.class_num = class.class_num
                                            and class.class_num = '$class_num';");
            $num_responses->data_seek(0);
            $totcount = $num_responses->fetch_assoc();
            $totcount = $totcount["count(*)"];

            //get each of the responses
            $responses = $mysqli->query("select answer.response
                                        from answer, eval_answer, evaluation, class
                                        where answer.questionid = '$questionid'
                                        and answer.answerid = eval_answer.answerid
                                        and eval_answer.evalid = evaluation.evalid
                                        and evaluation.class_num = class.class_num
                                        and class.class_num = '$class_num';");
            $response_array = array();
            $responses->data_seek(0);
            while ($row2 = $responses->fetch_assoc()){
                array_push($response_array, $row2["response"]);
            }

            switch ($row["type"]){
                case "MC":
                    echo '<h2>' . $row["text"] . '</h2>';
                    echo '<h3>' . $totcount . ' responses total. Breakdown: </h3>';

                    $options = explode(',', $row["options"]);
					//breakdown by each option
					foreach ($options as $option){
						echo $option . ': ';
						$count = 0;
						foreach ($response_array as $response){
							if ($option == $response) {$count++;}
						}
						echo $count . ' responses. (' . ($count / $totcount)*100 . '%)';
						echo '<br>';

					}

                    echo '<br>';
                    break;

                case "110":
                    echo '<h2>' . $row["text"] . '</h2>';
                    echo '<h3>' . $totcount . ' responses total. Breakdown: </h3>';

                    $median_array = array();

                    for ($i = 1; $i <= 10; $i++){
                        echo $i . ': ';
                        $count=0;
                        foreach ($response_array as $response){
							if ($i == $response) {
                                $count++;
                                array_push($median_array, $i);
                            }
                        }
                        echo $count . ' responses.';
						echo '<br>';
                    }

                    sort($median_array);

                    echo 'Median of: ' . $median_array[sizeof($median_array)/2];

                    echo '<br>';
                    break;

                case "AD":
                    echo '<h2>' . $row["text"] . '</h2>';
                    echo '<h3>' . $totcount . ' responses total. Breakdown: </h3>';

                    $options = array('Strongly Disagree', 'Disagree', 'Neutral', 'Agree', 'Strongly Agree');
                    foreach ($options as $option){
                        echo $option . ': ';
						$count = 0;
						foreach ($response_array as $response){
							if ($option == $response) {$count++;}
						}
						echo $count . ' responses. (' . ($count / $totcount)*100 . '%)';
						echo '<br>';
                    }

                    echo '<br>';
                    break;

                case "FT":
                    echo '<h2>' . $row["text"] . '</h2>';
                    echo '<h3>' . $totcount . ' responses total. Responses: </h3>';

                    echo '<ul class="list-group">';
                    foreach ($response_array as $response){
                        echo '<li class="list-group-item">' . $response . '</li>';
                    }
                    echo '</ul>';

                    echo '<br>';
                    break;
            }
        }
    }
}

?>

<a href="facultyreport.php"><button type="button" class="btn btn-primary">Back</button></a>
<br><br><br>

</body>
</div>

</html>
