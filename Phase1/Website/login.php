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
<title>Login - Mechanical Engineering</title>
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
	
<!-- Navigation bar at the top of the page. -->
<div class="navigationbar">
	<nav>
	
	<ul>

	<li><a href="index.html"><i class="fa fa-fw fa-home"></i> Home</a></li>
	<li><a class="active" href="login.html"><i class="fa fa-fw fa-user"></i> Login</a></li>
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
	<li><a href="quiz.php"><i class="fas fa-puzzle-piece"></i> Quiz</a></li>
	<li id="mutebuttonli"><a id="mutebutton">Audio<label class="switch"><input type="checkbox" id="mutebuttoncheckbox" onclick="var toggleAudio = document.getElementById('loginpopup'); toggleAudio.muted = !toggleAudio.muted;"><span class="slider round"></span></label></a></li>
	</ul>

	</nav>
</div>
	
</header>
	
<br>
<br>
<br>
<br>
<br>
<br>
<br>

	
<!-- Start Main Body -->

<div class="bodyboxtitletext">
	<p>Login</p>
</div>
	
<hr style="margin-right: 10%; margin-left: 5%;">
	
<div class="bodyboxmaintext">

<?php

$error="Processing Login";
require 'DBUtils.php';
	
if (isset($_POST['submit'])) { // Has the submit button been pressed?
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Login invalid - please enter a Username and Password";
	} else {
	// ATTEMPTING LOGIN NOW
		
		$conn = getConn(); 
		
		// Get Login fields
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$sql = "SELECT userID, UserName, passWord, isAdmin FROM Users WHERE UserName = '$username' AND passWord = '$password'";
		
		//echo $sql;
		
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn)) ;
		//$result = $conn->query($sql);
		//echo "After query:".$sql;
		if (mysqli_num_rows($result) > 0) {
			//echo "<p>Got some results</p>";
			// Get the results into $row
			$row = mysqli_fetch_assoc($result);
			
			//echo "<div>UserId:".$row["userID"]."</div>";
			//echo "<div<isAdmin:".$row["isAdmin"]."</div>";
			$isAdmin = $row["isAdmin"];
			//echo "<p> $isAdmin</p>";
			
			if ($isAdmin=='Y') {
				$error = "<p>Welcome back, Administrator</p>";
			} else {
				$error = "<p>Welcome, $username. You have logged In Successfully.</p";
			
			}
			
			$_SESSION["username"]=$username;
			$_SESSION["password"]=$password;
			$_SESSION["isAdmin"]=$isAdmin;
			$footer = "<div><div>Current User: $username</div><div> Is Admin: $isAdmin</div></div>";
			
		} else {
			$error = "Invalid Username and/or Password";
		}
		
			mysqli_close($conn);
		}
} else {
	$error = "Login Invalid!";
}
?>

<span><?php echo $error; ?></span>
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


	
</content>
<!-- <script src="js/jquery-1.11.3.min.js"></script> -->
<script src="js/jquery-3.2.1.min.js"></script>
<!-- <script src="js/bootstrap.js"></script> -->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.0.0.js"></script>
</body>
</html>