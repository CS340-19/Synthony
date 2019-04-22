<html>
<head>
    <title>Class Statistics: Results</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link rel="stylesheet" href="new.css">
</head>

<div class="container">
<body>
  <div id="nav"><a href="http://34.73.123.138/">Home</a></div>


<?php
session_start();
$mysqli = new mysqli("localhost", "cs340", "cs340_s19", "courseeval");
if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	echo "Please try again.";
}
$fname = $_SESSION["fname"];
$lname = $_SESSION["lname"];
$course_name = $_POST["class"];

?>

<h2>Class statistics for <?php echo $lname . ', ' . $fname . ' - ' . $_POST["class"];?></h2>

<?php
//classes taught by lname,fname with name course_name
$classeslist = $mysqli->query( "select class.class_num
							from instructor, teaches, class
							where instructor.fname = '$fname' and instructor.lname = '$lname'
							and instructor.instructorid = teaches.instructorid
							and teaches.class_num = class.class_num
							and class.course_name like '%$course_name%';");

$classes = array();
$classeslist->data_seek(0);
while ($row = $classeslist->fetch_assoc()){
	array_push($classes, $row["class_num"]);
}

//questions to get statistics for
$questions = $mysqli->query("select question.questionid, question.type, question.text, question.options
							from class, question, class_question
							where class.class_num='$classes[0]'
							and class.class_num = class_question.class_num
							and class_question.questionid = question.questionid
							order by question.questionid;");

if ($questions){
	if ($questions->num_rows == 0){
		echo 'Error: no results found.';
	} else {
		$questions->data_seek(0);
		while ($row = $questions->fetch_assoc()){
			switch ($row["type"]){

				case "MC":
					echo '<h2>' . $row["text"] . '</h2>';
					$questionid = $row["questionid"];
					//get the total number of responses.
					$num_responses = $mysqli->query("select count(*)
													from answer, eval_answer, evaluation, class
													where answer.questionid = '$questionid'
													and answer.answerid = eval_answer.answerid
													and eval_answer.evalid = evaluation.evalid
													and evaluation.class_num = class.class_num
													and class.course_name like '%$course_name%'
													and class.class_num in
															(select class.class_num from teaches, instructor, class
																where instructor.fname = '$fname' and instructor.lname='$lname'
																and instructor.instructorid = teaches.instructorid
																and teaches.class_num = class.class_num)"
												);
					$num_responses->data_seek(0);
					$totcount = $num_responses->fetch_assoc();
					$totcount = $totcount["count(*)"];
					echo '<h3>' . $totcount . ' responses total. Breakdown: </h3>';
					//get each of the responses
					$responses = $mysqli->query("select answer.response
												from answer, eval_answer, evaluation, class
												where answer.questionid = '$questionid'
												and answer.answerid = eval_answer.answerid
												and eval_answer.evalid = evaluation.evalid
												and evaluation.class_num = class.class_num
												and class.course_name like '%$course_name%'
												and class.class_num in
														(select class.class_num from teaches, instructor, class
															where instructor.fname = '$fname' and instructor.lname='$lname'
															and instructor.instructorid = teaches.instructorid
															and teaches.class_num = class.class_num)
												;");
					$response_array = array();
					$responses->data_seek(0);
					while ($row2 = $responses->fetch_assoc()){
						array_push($response_array, $row2["response"]);
					}

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

					break;

				case "110":
					echo '<h2>' . $row["text"] . '</h2>';
					$questionid = $row["questionid"];
					//total number of responses:
					$num_responses = $mysqli->query("select count(*)
										from answer, eval_answer, evaluation, class
										where answer.questionid = '$questionid'
										and answer.answerid = eval_answer.answerid
										and eval_answer.evalid = evaluation.evalid
										and evaluation.class_num = class.class_num
										and class.course_name like '%$course_name%'
										and class.class_num in
												(select class.class_num from teaches, instructor, class
													where instructor.fname = '$fname' and instructor.lname='$lname'
													and instructor.instructorid = teaches.instructorid
													and teaches.class_num = class.class_num)"
									);
					$num_responses->data_seek(0);
					$totcount = $num_responses->fetch_assoc();
					$totcount = $totcount["count(*)"];
					echo $totcount . ' responses total. ';
					//get each of the responses
					$responses = $mysqli->query("select answer.response
										from answer, eval_answer, evaluation, class
										where answer.questionid = '$questionid'
										and answer.answerid = eval_answer.answerid
										and eval_answer.evalid = evaluation.evalid
										and evaluation.class_num = class.class_num
										and class.course_name like '%$course_name%'
										and class.class_num in
												(select class.class_num from teaches, instructor, class
													where instructor.fname = '$fname' and instructor.lname='$lname'
													and instructor.instructorid = teaches.instructorid
													and teaches.class_num = class.class_num)
										;");
					$response_array = array();
					$responses->data_seek(0);
					while ($row2 = $responses->fetch_assoc()){
						array_push($response_array, $row2["response"]);
					}

					$sum = 0;
					foreach ($response_array as $response){
						$sum += $response;
					}

					echo 'Average of ' . $sum/$totcount . '.';
					echo '<br>';

					break;

				case "AD":
					echo '<h2>' . $row["text"] . '</h2>';
					$questionid = $row["questionid"];
					//total number of responses:
					$num_responses = $mysqli->query("select count(*)
										from answer, eval_answer, evaluation, class
										where answer.questionid = '$questionid'
										and answer.answerid = eval_answer.answerid
										and eval_answer.evalid = evaluation.evalid
										and evaluation.class_num = class.class_num
										and class.course_name like '%$course_name%'
										and class.class_num in
												(select class.class_num from teaches, instructor, class
													where instructor.fname = '$fname' and instructor.lname='$lname'
													and instructor.instructorid = teaches.instructorid
													and teaches.class_num = class.class_num)"
									);
					$num_responses->data_seek(0);
					$totcount = $num_responses->fetch_assoc();
					$totcount = $totcount["count(*)"];
					echo $totcount . ' responses total. ';

					//get each of the responses
					$responses = $mysqli->query("select answer.response
										from answer, eval_answer, evaluation, class
										where answer.questionid = '$questionid'
										and answer.answerid = eval_answer.answerid
										and eval_answer.evalid = evaluation.evalid
										and evaluation.class_num = class.class_num
										and class.course_name like '%$course_name%'
										and class.class_num in
												(select class.class_num from teaches, instructor, class
													where instructor.fname = '$fname' and instructor.lname='$lname'
													and instructor.instructorid = teaches.instructorid
													and teaches.class_num = class.class_num)
										;");
					$response_array = array();
					$responses->data_seek(0);
					while ($row2 = $responses->fetch_assoc()){
						array_push($response_array, $row2["response"]);
					}
					$count = 0;
					foreach ($response_array as $response){
						if ($response == "Agree" || $response == "Strongly Agree"){
							$count++;
						}
					}
					echo ($count/$totcount)*100 . '% responsed Agree or Strongly Agree.';
					echo '<br>';
					break;

				case "FT":
					//students cannot see these answers.
					break;
			}
			echo '<br>';
		}
	}
}



session_write_close();
?>

<a href="studentreport.php"><button type="button" class="btn btn-primary">Back</button></a>
<br><br><br>
</body>
</div>
</html>
