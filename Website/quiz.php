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
<title>Quiz - Hollow Knight Wiki</title>
<link rel="shortcut icon" href="Img/favicon.ico">
<link href="CSS/main.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/slideshow.js"></script>
</head>

<body>
	
<header>


	
</header>
	<br>
	
<!-- Navigation bar at the top of the page. -->
	
<div class="navigationbar">
	<nav>
	
	<ul>

	<li><a href="index.html">Home</a></li>
	<li><a href="login.html">Login</a></li>
	<li><a href="underconstruction.html">Characters</a>
		<ul>
            <li><a href="theknight.html">The Knight</a></li>
            <li><a href="underconstruction.html">Friendly NPCs</a></li>
			<li><a href="underconstruction.html">Enemy NPCs</a></li>
			<li><a href="bosses.html">Bosses</a></li>
		</ul>
	</li>
	<li><a href="underconstruction.html">Combat</a></li>
	<li><a href="underconstruction.html">The World</a>
		<ul>
            <li><a href="underconstruction.html">Areas</a></li>
            <li><a href="underconstruction.html">Exploration</a></li>
		</ul>
	</li>
	<li><a href="underconstruction.html">Inventory</a>
		<ul>
			<li><a href="underconstruction.html">Items</a></li>
			<li><a href="underconstruction.html">Charms</a></li>
		</ul>
	</li>
	<li><a href="underconstruction.html">Miscellaneous</a>
		<ul>
			<li><a href="quiz.php">Quiz</a></li>
			<li><a href="underconstruction.html">Lore</a></li>
			<li><a href="underconstruction.html">Cut Content</a></li>
			<li><a href="underconstruction.html">Game Info</a></li>
		</ul>
	</li>	
	</ul>

	</nav>
</div>

<!-- Start Main Body -->

<div class="bodybox">
<br>
	<div class="bodyboxtitletext">
		<p>Quiz</p>
	</div>
	
<hr>
<br>
<br>	
	
<div class="bodyboxminitext">

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
		echo "<p>Welcome to the $quizTopicName quiz</p>";
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
						echo "<li><input type='radio' name='q$qno' id='q$qno$ano' value='$quizAnswerCorrectFlag'>$quizAnswer</input>";
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
</div>
	
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