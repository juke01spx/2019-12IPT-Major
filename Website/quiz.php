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
<title>Login - Hollow Knight Wiki</title>
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
	<li><a href="characters.html">Characters</a>
		<ul>
            <li><a href="theknight.html">The Knight</a></li>
            <li><a href="friendlynpcs.html">Friendly NPCs</a></li>
			<li><a href="enemynpcs.html">Enemy NPCs</a></li>
			<li><a href="bosses.html">Bosses</a></li>
		</ul>
	</li>
	<li><a href="combat.html">Combat</a></li>
	<li><a href="theworld.html">The World</a>
		<ul>
            <li><a href="areas.html">Areas</a></li>
            <li><a href="exploration.html">Exploration</a></li>
		</ul>
	</li>
	<li><a href="inventory.html">Inventory</a>
		<ul>
			<li><a href="items.html">Items</a></li>
			<li><a href="charms.html">Charms</a></li>
		</ul>
	</li>
	<li><a href="misc.html">Miscellaneous</a>
		<ul>
			<li><a href="items.html">Lore</a></li>
			<li><a href="items.html">Cut Content</a></li>
			<li><a href="items.html">Game Info</a></li>
		</ul>
	</li>	
	</ul>

	</nav>
</div>

<!-- Start Main Body -->

<div class="bodybox">
<br>
	<div class="bodyboxtitletext">
		<p>Login</p>
	</div>
	
<hr>
<br>
<br>	
	
<div class="bodyboxminitext">

<?php

$error="Please Answer The Quiz";
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
				$error = "<p>$username Logged In Successfully</p";
			
			}
			
			$_SESSION["username"]=$username;
			$_SESSION["password"]=$password;
			$_SESSION["isAdmin"]=$isAdmin;
			
		} else {
			$error = "Invalid Username and Password";
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