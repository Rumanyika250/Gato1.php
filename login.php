<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="c.css">
</head>
<body>
 <div id="layout">
 	<div id="banner"></div>
 	<div id="menu"><h3><u>login form</u></h3>
 	</div>
 	<div id="content">
 	<br>
 	<br>		
<form action="login.php" method="POST">
<center><table>
<tr><th>username</th><th><input type="text" required name="un"></th></tr>
<tr><th>password</th><th><input type="password" required name="ps"></th></tr>
<tr><th></th><th><input type="submit" value="login" name="logbtn"></th></tr>	
</table>
</center>	
</form>
<?php
if (isset($_POST['logbtn'])) {
	$names=$_POST['un'];
	$password=$_POST['ps'];
	include "connect.php";
	$query=mysqli_query($con,"select*from login where names='$names' and password='$password'");
	$check=mysqli_num_rows($query);
	if ($check==1) {
		while ($row=mysqli_fetch_array($query)) {
	          $_SESSION['password']=$row['password'];
	          header("location:home.php");

		}
	}
	else
	{
		echo "incorrect";
	}
}


?>

 	</div>
 	<div id="footer"></div>
 </div>
</body>
</html>