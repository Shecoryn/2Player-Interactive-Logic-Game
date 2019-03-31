<?php
    session_start();
    $raw = explode("\r\n", file_get_contents('clues.txt'));
    $clues;
  
     for ($x = 0; $x < count($raw)-1; $x++) {
         $clues[$x] = explode("|", $raw[$x]);
     }
	$user1trueclue;
	$user2trueclue;
	$toholdoption1=$_COOKIE['u1validate'];
	$toholdoption2=$_COOKIE['u2validate'];
	$toholdclue1=$_COOKIE['user1trueclue'];
	$toholdclue2=$_COOKIE['user2trueclue'];
 ?>   
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="InterfaceStyle.css"> 
    <title>Game Page</title>
</head>
<body>
<table>
	<tr>
	<td colspan="2" class="center">
		<form method="GET" class ="u1validate">
			<div>
				<h3>Please select the clues which is true or false to validate: </h3>
				<h5>both should agree to use it (each lose 10 point)</h5>
				<p>  
					<?php
						if((isset($_GET['select1'])||$toholdoption1==true)) {
							if ($_GET['select1']==0) {
								echo "<p>".$clues[0][0].",".$clues[0][1]."<br>".$clues[1][0]."<br>".$clues[2][0]."</p>";  
								$str=$clues[0][0].",".$clues[0][1]."<br>".$clues[1][0]."<br>".$clues[2][0];
							}
							else if ($_GET['select1']==1) {
								echo "<p>".$clues[0][0]."<br>".$clues[1][0].",".$clues[1][1]."<br>".$clues[2][0]."</p>";  
							}
							else {
								echo "<p>".$clues[0][0]."<br>".$clues[1][0]."<br>".$clues[2][0].",".$clues[2][1]."</p>";
							}
							$toholdoption1=true;
							setcookie("u1validate",true);	
						}
						else {
							echo "<select name='select1'>
								<option value=0>".$clues[0][0]."</option>
								<option value=1>".$clues[1][0]."</option>
								<option value=2>".$clues[2][0]."</option>
							</select>
							<button type='submit'>Validate now!</button>" ;
						}
					?>
				</p>    
			</div>
		</form>
	</td>
	</tr>
	<tr>
	<td class="center">
		<form method="post" class = "u1generate">
			<div>
				<h5>User1 true clue (lose 10 point)</h5>
				<?php 
					if (isset($_POST["u1generate"])||$toholdclue1==true) {
						for ($i = 3; $i < count($clues); $i++) {
							if($clues[$i][1]=="true") {
								echo "<p>". $clues[$i][0]."</p>";
								break;
							}
						}
						$toholdclue1=true;
						setcookie("user1trueclue",true);
					}
					else {
						echo "<button type='submit' name='u1generate' value='true'>Give me true clue!</button>";
					}
				?>
			</div>
		</form>
	</td>
	<td class="left">
		<form method="post" class="u2generate">
			<div>
			<h5>User2 true clue (lose 10 point)</h5>
				<?php 
					if (isset($_POST["u2generate"])||$toholdclue2==true) {
						for ($i = 6; $i < count($clues); $i++) {
							if($clues[$i][1]=="true") {
								echo "<p>". $clues[$i][0]."</p>";
								break;
							}
						}
						$toholdclue2=true;
						setcookie("user2trueclue",true);
					}
					else {
						echo "<button type='submit' name='u2generate' value='true'>Give me true clue!</button>";
					}
				?>
			</div>        
		</form>
	</td>
	</tr>
</table>
<br>
		<form action='Result.php' method="post" class="decision">
			<div>
				<table>
					<tr>
						<td class="left">
							<label><?php echo $_SESSION['username1']; ?>, please accuse the killer:</label>
						</td>
						<td class="center"></td>
						<td class="left">
							<label><?php echo $_SESSION['username2']; ?>, please accuse the killer:</label>
						</td>    
					</tr>
					<tr>
						<td class="right">   
							<input type="password" name="u1decision" placeholder="Enter the name only." class = "name" required  oninvalid="this.setCustomValidity('Please accuse the kiiler to continue.')"
							oninput="setCustomValidity('')">
						</td>
						<td class="center">
							<button class="btn" type="submit" >Accuse!</button>
						</td>
						<td class="right">
							<input type="password" name="u2decision" placeholder="Enter the name only." class="name" required oninvalid="this.setCustomValidity('Please accuse the kiiler to continue.')"
							oninput="setCustomValidity('')">
						</td>
					</tr>
				</table>
			</div>
		</form>                            
</body>
</html>