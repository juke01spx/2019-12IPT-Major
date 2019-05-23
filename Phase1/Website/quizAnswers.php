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
<title>Quiz Results - Mechanical Engineering</title>
<link rel="shortcut icon" href="Img/favicon.ico">
<link href="CSS/main.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<script type="text/javascript" src="js/slideshow.js"></script>
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
	<li><a style="cursor: pointer;"><i class="fas fa-code-branch"></i> Branches</a>
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
	<li id="mutebuttonli" style="margin-left: 0%;"><a id="mutebutton" style="cursor: default; margin-left: 950%;">Audio<label class="switch" style="cursor:pointer; transform: scale(0.5,0.5); margin-top: -0.6%;"><input type="checkbox" onclick="var toggleAudio = document.getElementById('loginpopup'); toggleAudio.muted = !toggleAudio.muted;" style="cursor: pointer;"><span class="slider round"></span></label></a></li>
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
	<p>Quiz Results</p>
</div>
	
<hr style="margin-right: 10%; margin-left: 5%;">
	
<br>
<br>
<br>

	
<div class="bodyboxquiz">

<?php
require 'DBUtils.php';
$right = "Y";
$wrong = "N";
$conn = getConn();
	
	//Input: $param - question to check in $_POST, e.g. "q1"
	//Process: Check if question in $_POST is set
	//			If it is, then return the avlue from $_POST
	//			Otherwise, just return "F" rather than an error
	//Output: $answer - the answer we derived in this function
	
	FUNCTION checkPost($param) {
		IF (isset($_POST[$param])){		//Check if the $_POST exists
			$answer = $_POST[$param];	//Retrieve it if it does
		} ELSE {						//Otherwise
			$answer = $GLOBALS['wrong'];
		}
		RETURN $answer;
	}

	//Function: Check Answer
	//Input: $qno - Question number
	//		$answer - the answer passed in from the webpage
	//		$correct - the correct answer to the quiz question
	//Process: This function checks the answer passed in and displays the correct answer
	//		and increments the totalscore
	//Output: $totscore - the toal score passed in and incremented by 1 if correct
	
	FUNCTION checkAnswer($qno, $answer) {
		IF($answer==$GLOBALS['right']) {
			$ok = TRUE;
			echo("<p><strong>Well done,</strong> ".$qno." is correct</p>");
			echo "<br>";
		} ELSE {
			$ok = FALSE;
			$correct=$_POST[$qno."c"];
			echo("<p><strong>Sorry, ".$qno." is incorrect.</strong> The correct answer for '".$correct."'</p>");
			echo "<br>";
		}
		RETURN $ok;
	}
	$qno = "q";
	$totalscore = 0;
	$max = checkPost('max');
	//echo('max='.$max);
	
	//Loop through from 1 to maximum number of questions, incremnting by 1
	FOR ($x=1;$x<=$max;$x++) {
		$q = $qno.$x;
		$ok = checkAnswer($q, checkPost($q));
		IF ($ok==TRUE) {
			$totalscore +=1;
		}
	}
	echo "<br>";
	echo "<br>";
	ECHO("<h3>Total score is ".$totalscore." out of ".$max."</h3>");
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