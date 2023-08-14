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
 		
       <form  action="nclient.php" method="POST">
       	<table>
       		<tr>

              <?php
         include "connect.php";
         $query=mysqli_query($con,"select product_name from products");
         while (($row=mysqli_fetch_array($query)) {
         
         
 		?>


       			<td>product name</td><td><select name="pn">
       			<option value="<?php echo $row['product_id'];?> "><?php echo $row['product_name'];} ?></option>
     
       		</select></td></tr>
       		
       		<tr><td>client name</td><td><input type="text" name="cn"></td></tr>
       		<tr><td>date</td><td><input type="date" name="d"></td></tr>
       		<tr><td></td><td><input type="submit" value="save" name="sbtn"></td></tr>
       	</table>
       </form>

<?php
if (isset($_POST['sbtn'])) {
	include "connect.php";
	$query=mysqli_query($con,"insert into clients values('','$_POST[cn]','$_POST[d]','$_POST[pn]')");
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
