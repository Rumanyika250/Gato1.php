<div class="dropdown">
	<button class="dropbtn">products</button>
	<div class="drop_content">
		<a href="nproduct.php">new products</a>
		<a href="vproduct.php">view products</a>
	</div>
</div>
<div class="dropdown">
	<button class="dropbtn">clients</button>
	<div class="drop_content">
		<a href="nclient.php">record clients</a>
		<a href="">view clients</a>
	</div>
</div>
<form method="POST">
	<div class="dropdown">
		<button class="btn"name="logout">logout</button>
	</div>
</form>
<?php
if (isset($_POST['logout'])) {
	session_destroy();
	header("location:login.php");
}
?>
