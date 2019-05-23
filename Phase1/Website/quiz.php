<?php
session_start();
session_unset();
?>
<!doctype html>
<html>
<head>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- POSSIBLY REMOVE OR MODIFY TAG? TEST ON 1080p DISPLAY <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
<meta charset="utf-8">
<title>Quiz - Mechanical Engineering</title>

<!-- Icon for webpage -->
<link rel="shortcut icon" href="Img/favicon.ico">
	
<!-- Link to CSS -->
<link href="CSS/main.css" rel="stylesheet" type="text/css">
	
<!-- Link to custom icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>

<body>
	
<header>


	
</header>
	
<!-- Navigation bar at the top of the page. -->
<div class="navigationbar">
	<nav>
	
	<ul>

	<li><a href="index.html"><i class="fa fa-fw fa-home"></i> Home</a></li>
	<li><a href="login.html"><i class="fa fa-fw fa-user"></i> Login</a></li>
	<li><a id="branchestab"><i class="fas fa-code-branch"></i> Branches</a>
		<ul>
            <li><a href="automotiveengineering.html">Automotive Engineering</a></li>
            <li><a href="underconstruction.html">Aerospace Engineering</a></li>
			<li><a href="underconstruction.html">Marine Engineering</a></li>
			<li><a href="underconstruction.html">Power Plant Engineering</a></li>
			<li><a href="underconstruction.html">Mechatronics</a></li>
			<li><a href="underconstruction.html">More...</a></li>
		</ul>
	</li>
	<li><a class="active" href="quiz.php"><i class="fas fa-puzzle-piece"></i> Quiz</a></li>
	<li id="mutebuttonli"><a id="mutebutton">Audio<label class="switch"><input type="checkbox" id="mutebuttoncheckbox" onclick="var toggleAudio = document.getElementById('loginpopup'); toggleAudio.muted = !toggleAudio.muted;"><span class="slider round"></span></label></a></li>
	</ul>

	</nav>
</div>

<!-- Start Main Body -->
	
<br>
<br>
<br>
<br>
<br>
<br>
<br>	
	
<div class="bodyboxtitletext">
	<p>Quiz</p>
</div>
	
<hr style="margin-right: 10%; margin-left: 5%;">
	
<div class="bodyboxquiz">

<?php

FUNCTION esc($string) {
	return str_replace("'","&rsquo;",$string);
}

$error="Please Answer The Quiz"; //Default message
require 'DBUtils.php';
$conn = getConn();

// GET QUIZ TOPICS THAT ARE ACTIVE FIRST
$sql = 'SELECT t.quizTopicId, t.quizTopicName FROM quiztopic AS t WHERE t.quizActiveFlag = "Y"';

//echo $sql;
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
if (mysqli_num_rows($result)>0) {
	// Get the results into $topic
	echo "<form id='quiz' name='quiz' action='quizAnswers.php' method='post'>";
	while($topicRow = mysqli_fetch_assoc($result)) {
		$quizTopicId = $topicRow["quizTopicId"];
		$quizTopicName = $topicRow["quizTopicName"];
		echo'<div class="bodyboxmaintext">';
		echo "<p class='quizTopicName'>Welcome to the $quizTopicName quiz</p>";
		echo'</div>';
		echo '<br>';
		
		$sql2 = "SELECT q.quizQuestionsId, q.quizQuestion FROM quizquestions AS q WHERE q.quizTopicId = $quizTopicId ORDER BY q.quizQuestionsId";
		//echo $sql2;
		$qresult = mysqli_query($conn,$sql2) or die(mysqli_error($conn));
		if(mysqli_num_rows($qresult)>0) {
			$max = mysqli_num_rows($qresult);
			echo "<input type ='hidden' name='max' value='$max'/>";
			echo "<ol>";
			$qno=0;
			while($questionrow = mysqli_fetch_assoc($qresult)) {
				
				$qno++;
				$quizQuestionsId = $questionrow["quizQuestionsId"];
				echo "<br>";
				echo "<br>";
				$quizQuestion = esc($questionrow["quizQuestion"]);
				echo "<h3><li>$quizQuestion</li></h3>";
	
				$sql3 = "SELECT a.quizAnswer, a.quizAnswerCorrectFlag FROM quizanswers AS a WHERE a.quizQuestionsId = $quizQuestionsId ORDER BY RAND()"; //a.quizAnswersId
				//echo $sql3;
				
				$aresult = mysqli_query($conn,$sql3) or die(mysql_error($conn));
				if(mysqli_num_rows($aresult)>0) { 
					
					$ano = 0;
					echo "<ol type='A'>";
					while($ansrow = mysqli_fetch_assoc($aresult)) {
						$ano++;
						$quizAnswer = esc($ansrow["quizAnswer"]);
						$quizAnswerCorrectFlag = $ansrow["quizAnswerCorrectFlag"];
						echo "<div class='radiobuttons'>";
						echo "<li><label class='radiobox'><input type='radio' name='q$qno' id='q$qno$ano' value='$quizAnswerCorrectFlag'><span class ='checkmark'></span>$quizAnswer</input></label>";
						echo "</div>";
						if($quizAnswerCorrectFlag=="Y") {
							echo "<input type='hidden' name='q$qno"."c' value='Q: $quizQuestion "."is A: "."$quizAnswer'/>";
							
						}
						echo "</li>";
						
					}
					echo "</ol>";
				}
			}
			echo "</ol>";
		}
		echo "<br>";
		echo "<br>";
		echo '<div class="submitquiz">';
		echo "<button type='submit' name='submit'>Submit Answers</button>";
		echo '</div>';
		echo "</form>";
		}
	mysqli_close($conn);
} else {
	$error ="<p>No Quiz Available!</p>";
}
	
?>

<!--<span><?php echo $error; ?></span>-->
</div>
	
<br>
<br>
<br>
<br>
<br>
<br>
<br>

	
<content>
<p></p>	


<!--<div class="bottomnav">

<nav>
	
<ul>
	
<li><a href="about.html" style="font-family: 'Gotham, 'Helvetica Neue', Helvetica, Arial, 'sans-serif';">About</a></li>
<li><a href="faq.html" style="font-family: 'Gotham, 'Helvetica Neue', Helvetica, Arial, 'sans-serif;">Support and FAQ</a></li>
<li><a href="login.html" style="font-family: 'Gotham, 'Helvetica Neue', Helvetica, Arial, 'sans-serif';">Login</a></li>	

</ul>	

</nav>

</div>-->
</content>
<!-- <script src="js/jquery-1.11.3.min.js"></script> -->
<script src="js/jquery-3.2.1.min.js"></script>
<!-- <script src="js/bootstrap.js"></script> -->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.0.0.js"></script>
</body>
</html>