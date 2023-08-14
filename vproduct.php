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
 		<br>
 		<table border="2" align="center">
 		<tr>
 		<th>no</th>
 		<th>product name</th>
 		<th>price</th>
 		<th>date stored</th>
 		<th colspan="2">action</th>	
         </tr>
         <?php
         include "connect.php";
         $query=mysqli_query($con,"SELECT*from products");
         $i=1;
         while ($row=mysqli_fetch_array($query)) {
         ?>
         <tr>
         	<td><?php echo $i;?></td>
         	<td><?php echo $row['product_name'];?></td>
         	<td><?php echo $row['price'];?></td>
         	<td><?php echo $row['date_stored']; ?></td>
         	<td><form action="upproduct.php" method="POST"> 
         		<button type="submit" name="update" value=<?php echo $row['product_id']?>>update</button>
         	</form></td>
         	<td><form  action="dlproduct.php" method="POST">
         		<button type="submit" name="delete" value=<?php echo $row['product_id']?>>delete</button>
         	</form></td>
             </tr>
             <?php
$i++;
}


?>
 		</table>


 	</div>
 	<div id="footer"></div>
 	
 </div>



</body>
</html>
<?php
}
?>
