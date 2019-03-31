<?php
	session_start();
				setcookie('u1validate');
			setcookie('user1trueclue');
			setcookie('u2validate');
			setcookie('user2trueclue');
	$username1=$_POST['username1'];
	$username2=$_POST['username2'];
	
	if(strlen($username1) >=1 && strlen($username2) >=1){
		$_SESSION["username1"]=$username1;
		$_SESSION["username2"]=$username2;
		header("location: ./project2_story_page.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Logic Game</title>
<link rel="stylesheet" href="project2_css.css" type="text/css">
</head>
<body id="LogInPage">
	<h1 class="LogIn">Mike</h1>
	<div class="LogIn">
	<form method="post" action="<?php echo $SERVER["PHP_SELF"] ?>">
		<label>User-name1</label>
			<div>
				<input type="text" name="username1" required><br>
			</div><br>
		<label>User-name2</label>
			<div>
				<input type="text" name="username2" required><br>
			</div>
		    <div><br>
               <label></label>
               <button type="submit" >Log-in</button>
            </div><br>
	</form>
	</div>
	<div>
	<div class="textofhomer">"who is on the same level as me"</div><br>
	<img src="Homer_log_in.jpg" alt="Homer_log_in.jpg" width="300" height="200" class="Mleft">
	</div>
</body>
</html>