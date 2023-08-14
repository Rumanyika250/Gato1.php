<?php
session_start();
if (!isset($_SESSION['password'])) {
	header("location:login.php");
}
else
{
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
 	<div id="menu">
 		<?php
          include "menu.php";

 		?>

 	</div>
 	<div id="content">
 		<br>
 		<br><center>
 		<form method="POST">
 			<table>
 				<tr><td>product name</td><td><input type="text" name="pn" required></td></tr>
 					<tr><td>price</td><td><input type="text" name="p" required ></td></tr>
 					<tr><td>date</td><td><input type="date" name="date" required></td></tr>
 					<tr><td></td><td><input type="submit" name="pbtn" value="save"></td></tr>
 			</table>
 		</form>
 	</center>
<?php

if (isset($_POST['pbtn'])) {
	include "connect.php";
	$query=mysqli_query($con,"INSERT into products VALUES('','$_POST[pn]','$_POST[p]','$_POST[date]')");
	if ($query) {
		echo "saved";
	}
}

?>

 	</div>
 	<div id="footer"></div>
 	
 </div>



</body>
</html>
<?php
}
?>
