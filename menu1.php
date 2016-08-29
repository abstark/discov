<?php
if(isset($_REQUEST["logout"]))
{
	setcookie ("user", "", time() - 10000000, '/');
	echo '<script>';
	echo 'window.location.href="index.php"';
	echo '</script>';
}
/*if(isset($_REQUEST["delete"]))
{
	//header("location:delete.php");
	echo "<script>";
	echo "alert('Sorry the button is under construction!')";
	echo "</script>";
}*/
/*if(isset($_REQUEST["edit"]))
{
	//header("location:edit.php");
	echo "<script>";
	echo "alert('Sorry the button is under construction!')";
	echo "</script>";
}*/

?>
<link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.css">

<div class="navbar navbar-inverse">
	<ul class="nav navbar-nav " >
		<li class="nav-item">
			<a class="nav-link " href="index.php"  value="home">Home</a>
		</li>

		<li class="pull-left">
			<a class="nav-link " href="form.php" value="form">Comments</a>
		</li>

		<li class="pull-left">
			<a class="nav-link " href="aboutus.php" value="about">About Us</a>
		</li>

		<li class="pull-left">
			<a class="nav-link " href="#" style="margin-left:600px;">Welcome <?php echo $_COOKIE["user"]; ?>!</a>
		</li>
		
		<li class="pull-right">
			<form action="menu1.php">
				<input type="submit" class="btn btn-primary pull-right" style="margin-top:10px;" name="logout" value="Logout">
				<!--<input type="submit" class="btn btn-warning pull-right" style="margin-top:10px;" name="delete" value="Delete">
				<input type="submit" class="btn btn-danger pull-right" style="margin-top:10px;" name="edit" value="Edit">-->
			</form>
		</li>
	</ul>
</div>






