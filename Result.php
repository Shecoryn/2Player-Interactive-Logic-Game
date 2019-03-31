<?php
session_start();
	$killer="Ashley";
	$score1=0;
	$score2=0;
	$u1decision=$_POST['u1decision'];
	$u2decision=$_POST['u2decision'];
	
	if($_COOKIE['u1validate']==true){
		$score1=$score1-10;
		$score2=$score2-10;
	}
	
	if($_COOKIE['user1trueclue']==true){
		$score1=$score1-10;
	}
	
	if($_COOKIE['user2trueclue']==true){
		$score2=$score2-10;
	}
	
	if($u1decision==$killer){
		$score1+=50;
	}
	else{
		$score1-=50;
	}
	
	if($u2decision==$killer){
		$score2+=50;
	}
	else{
		$score2-=50;
	}
	
?>
<!Doctype html>
<html>
<head>
	<title>Results</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="Result.css">
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>Results</h1>
		</div>
		<div id="content">
			<div id="p1">
			<h2><?php echo "<h2>".$_SESSION["username1"]."</h2>" ?></h2>
				<ul>
					<li>Score <?php echo $score1; ?></li>
					<li>User1 Answer <?php echo $_POST['u1decision']; ?></li>
					<li>Answer <?php echo $killer; ?></li>
				</ul>
			</div>
			<div id="p2">
			<h2><?php echo "<h2>".$_SESSION["username2"]."</h2>" ?></h2>
				<ul>
					<li>Score <?php echo $score2; ?></li>
					<li>User2 Answer <?php echo $_POST['u2decision']; ?></li>
					<li>Answer <?php echo $killer; ?></li>
				</ul>
			</div>
		</div>
		<?php
			setcookie('u1validate');
			setcookie('user1trueclue');
			setcookie('u2validate');
			setcookie('user2trueclue');
?>
		<div id="footer">
			<div class="buttonHolder">
			<form action="project2_log_in.php">
				<input type = "submit" name = "submit" value = "Logout">
			</form>
			</div>	
		</div>
	</div>
</body>
</html>