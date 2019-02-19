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
<title>Quiz Results - Hollow Knight Wiki</title>
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
		<p>Quiz Results</p>
	</div>
	
<hr>
<br>
<br>	
	
<div class="bodyboxminitext">

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