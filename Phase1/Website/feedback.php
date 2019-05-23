<?php
require('DBUtils.php');
$previous = "";
$message = "Fill in form and submit to save";
$conn = getConn();

IF($_SERVER["REQUEST_METHOD"]=="POST") {
	
	$fbName = mysqli_real_escape_string($conn, $_POST["fbName"]);
	$fbEmail = mysqli_real_escape_string($conn, $_POST["fbEmail"]);
	$fbComment = mysqli_real_escape_string($conn, $_POST["fbComment"]);
	
	IF($fbName == "" OR $fbEmail == "" OR $fbcomment == "") {
		$message = "You must enter data into all fields";
	} ELSE {
		$sql2 = "INSERT INTO feedback (fbName, fbEmail, fbComment) VALUES ('$fbName', '$fbEmail', '$fbComment')";

		//echo($sql2);

		IF(mysqli_query($conn,$sql2)) {
			$message = "New record successfully created";
		} ELSE {
			$message = "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

	}	
	unset($_POST);
	header("Location : ".$_SERVER['PHP_SELF']);
}

$sql1 = "(SELECT fbId, fbName, fbEmail, fbComment FROM feedback ORDER BY fbId DESC LIMIT 10) ORDER BY fbId ASC";
$prev_result = mysqli_query($conn,$sql1);

if (mysqli_num_rows($prev_result) > 0) { //Only generate HTML if some feedback
	
	$previous = "<div><h3><div>Id</div><div>Name</div><div>Email></div><div>Comments</div></h3></div>";
	while($row = $result->fetch_assoc()) {
		$fbId = mysqli_real_escape_string($conn, $row['fbId']);
		$fbName = mysqli_real_escape_string($conn, $row['fbName']);
		$fbEmail = mysqli_real_escape_string($conn, $row['fbEmail']);
		$fbComment = mysqli_real_escape_string($conn, $row['fbComment']);
		$previous = $previous."<div><div>$fbId</div><div>$fbName</div><div>$fbEmail</div><div>$fbComment</div></div>";
	}
}

?>

<!doctype html>
<!-- Try setting a maximum size to the page? -->
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<title>Feedback - Mechanical Engineering</title>
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
	<li><a href="">Branches</a>
		<ul>
            <li><a href="automotiveengineering.html">Automotive Engineering</a></li>
            <li><a href="underconstruction.html">Aerospace Engineering</a></li>
			<li><a href="underconstruction.html">Marine Engineering</a></li>
			<li><a href="underconstruction.html">Power Plant Engineering</a></li>
			<li><a href="underconstruction.html">Mechatronics</a></li>
			<li><a href="underconstruction.html">More...</a></li>
		</ul>
	</li>
	<li><a href="quiz.php">Quiz</a></li>	
	</ul>

	</nav>
</div>

<content>

	<div class="bodybox">
	<br>	
		<div class="bodyboxtitletext">
			<p>Feedback</p>
		</div>
		
<hr>
		
		<div class="bodyboxsubtitletext">
			<p>Previous Feedback</p>
		</div>
		
		<div class="bodyboxmaintext">
			
			<div>
				<?php echo $previous ?>
			</div>
			<form name="feedback" action="" method="post">
			<div class="tr">	
				<div class="td">Your Name: </div>
				<div class="td"><input type="text" name="fbName"></input></div>
			</div>	
			<div class="tr">	
				<div class="td">Your Email: </div>
				<div class="td"><input type="email" name="fbEmail"></input></div>
			</div>
			<div class="tr">
				<div class="td">Your Comment: </div>
				<div class="td"><input type="textarea" name="fbComment"></input></div>
			</div>
<br>
				<div>
					<button type="submit">Submit Feedback</button>
				</div>
			</form>
		</div>
		
<br>
		
		
		
<br>
<br>
<br>
	
	</div>

        
</content>

<br>

</body>
</html>