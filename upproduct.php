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
 		<?php
         include "connect.php";
         $query=mysqli_query($con,"select*from products where product_id='$_POST[update]'");
         $i=1;
          while ($row=mysqli_fetch_array($query)) {
 		?>
      <form action="upproduct.php" method="POST">
      	<center>
      	<table>
      		<tr><td><input type="hidden" name="id" value="<?php echo $row['product_id'];?>"></td></tr>
      		<tr><td>product name</td><td><input type="text" name="pn" value="<?php echo $row['product_name'] ;?>"></td></tr> 
            <tr><td>price</td><td><input type="text" name="p" value="<?php echo $row['price'] ;?>"></td></tr>
            <tr><td>date stored</td><td><input type="date" name="d" value="<?php echo $row['date_stored']; ?>"></td></tr>
             <tr><td></td><td><input type="submit" value="update" name="upbtn"></td></tr>
      	</table>
      </form>
  </center>
      <?php
       }
      ?>
      <?php
      include "connect.php";
       if (isset($_POST['upbtn'])) {
       	$up=mysqli_query($con,"update products set product_name='$_POST[pn]',price='$_POST[p]',date_stored='$_POST[d]' where product_id='$_POST[id]'");
       	if ($up) {
       		echo "updated";
       		header("location:vproduct.php");
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
