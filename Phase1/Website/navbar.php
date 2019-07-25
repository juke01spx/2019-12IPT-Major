<!doctype html>

<div class="navigationbar">
	<nav>
	
	<ul>

	<li <?php if($active == "index") {echo 'class="active"';} ?>><a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a></li>
	<li <?php if($active == "login") {echo 'class="active"';} ?>><a href="loginform.php"><i class="fa fa-fw fa-user"></i> Login</a></li>
	<li <?php if($active == "branches") {echo 'class="active"';} ?>><a id="branchestab"><i class="fas fa-code-branch"></i> Branches</a>
		<ul>
            <li><a href="automotiveengineering.php">Automotive Engineering</a></li>
            <li><a href="underconstruction.php">Aerospace Engineering</a></li>
			<li><a href="underconstruction.php">Marine Engineering</a></li>
			<li><a href="underconstruction.php">Power Plant Engineering</a></li>
			<li><a href="underconstruction.php">Mechatronics</a></li>
			<li><a href="underconstruction.php">More...</a></li>
			<li><a href="bitesthedust.php">Killer Queen...</a></li>
		</ul>
	</li>
	<li <?php if($active == "quiz") {echo 'class="active"';} ?>><a href="quiz.php"><i class="fas fa-puzzle-piece"></i> Quiz</a></li>
	<li id="mutebuttonli"><a id="mutebutton">Audio<label class="switch"><input type="checkbox" id="mutebuttoncheckbox" onclick="var toggleAudio = document.getElementById("loginpopup"); toggleAudio.muted = !toggleAudio.muted;"><span class="slider round"></span></label></a></li>

	</ul>

	</nav>
</div>