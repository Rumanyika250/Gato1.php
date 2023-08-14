<?php
include "connect.php";
if (isset($_POST['delete'])) {
	$query=mysqli_query($con,"delete from products where product_id='$_POST[delete]'");
	header("location:vproduct.php");
}

?>