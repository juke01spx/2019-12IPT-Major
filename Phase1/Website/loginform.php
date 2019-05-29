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
	
<!-- Link to script for closing loginForm-->
<script type="text/javascript" src="js/login.js"></script>
	
<!-- Audio for loginForm pop up -->	
<audio id="loginpopup" src="audio/pop_sound_effect.mp3" preload="auto"></audio>

</head>

<body>

<header>

<!-- Navigation bar at the top of the page. -->	
<?php 
	$active = "login";
	require 'navbar.php';
?>

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
	<p>Welcome to the Mechanical Engineering Hub login page.</p>
	
	<div class="loginbutton">


<br>	
<br>
<br>
<br>

<!-- Button to open loginForm -->
<button onclick="document.getElementById('id01').style.display='block';document.getElementById('loginpopup').play();" style="width:auto;">Login Here</button>
	
</div>
</div>

<br>

<!-- Start the login form -->
<div id="id01" class="loginbox">
  	

	
	<div class="bodyboxminitext">
	
		<form action="loginresults.php" method="post" id="login" name="login" class="loginForm animate">
			
			<!-- Container for the "avatar" -->
			<div class="imgcontainer">
					<!-- 'X' icon to close loginForm -->
					<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close">&times;</span>
      			<img src="Img/avatar.jpg" alt="Login Picture" class="avatar">
    		</div>
			
			<!-- Part to fill out loginForm -->
			<div class="logincontainer">
				<label for="username"><b>Username:</b></label>
					<input type="text" id="username" name="username" placeholder="Enter Username" required>

				<label for="password"><b>Password:</b></label>
					<input type="password" id="password" name="password" placeholder="Enter Password" required>

				<br>
				
				<!-- Submit loginForm details -->
				<div class="submitlogin">
					<button type="submit" name="submit" id="submit" onClick="document.getElementById('id01').style.display='block'">Login</button>
				</div>
			</div>
			
			<div class="logincontainer" style="background-color:#f1f1f1">
				
			<!-- Button to close loginForm -->
			<div class="cancelbutton">	
				<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
				
				
			</div>
				
    		</div>
			
			
		</form>

	</div>

</div>
	
<br>
<br>
<br>
<br>
<br>

	
<content>
<p></p>	


	
</content>

	
</body>
</html>