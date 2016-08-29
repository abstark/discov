
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-82341238-1', 'auto');
	ga('send', 'pageview');
</script>
<!DOCTYPE html>

<?php

if(!isset($_COOKIE["user"]))
{
	include 'menu.php';
}
else
{
	include 'menu1.php';
}
?>

<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="JQuery.js"></script>
</head>

<body>
	<div id="home" style="margin-top:-20px">
		<center><h1 style="font-size:2em;font-family:tahoma;text-shadow:2px 2px 2px black;">Discover Your Places.</h1></center>
		<center style="margin-top:100px;"><strong style="font-size:2em">Comment      .       Discover.</strong></center>

		<?php
		if(!isset($_COOKIE["user"]))
		{

			echo '<div class="panel panel-info" style="width:20%;margin:30em, 20em, 10em, 30em">
			<div class="panel panel-heading" >
				<center>Login</center>
			</div> 
			<div class="panel panel-body">	
				<form action="login1.php" class="form-horizontal" method="post">

					<div class="form-group">
						<label class="control-label">Username</label>
						<div class="input-group">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
							</span>
							<input type="username" name="username" class="form-control">
						</div>
						<label class="control-label">Password</label>
						<div class="input-group">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
							</span>
							<input type="password" name="password" class="form-control">
						</div>
					</div>

					<input type="submit" value="Login" class="btn btn-danger" name="b1" style="margin-left:10px;margin-bottom:5px;">
					<a href="login.php" style="margin-left:50px;">Register here</a>

				</form>
			</div>
		</div>
	</div>';
}
else 
{
		//echo '<link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.css">';

	echo '<div class="panel panel-info" style="width:20%;">';
	echo '<div class="panel-heading">';
	echo '<center>Your Comments!</center>';
	echo '</div>';
	echo '<div class="panel-body">';

	$a=$_COOKIE["user"];
	$con=@mysql_connect("localhost","root","");
	if(!$con)
		die("Connection could not be Established!");
	mysql_select_db("hello");
	if($m=mysql_query("SELECT * FROM opinion WHERE username='".$a."'"))
	{
		if(mysql_num_rows($m)==0)
		{
			echo "<center>No Comments Till Now!</center>";
		}
		while($r=mysql_fetch_array($m))
		{
			echo $r["city"]."->".$r["comment"];
			echo "<br>";

		}
	      /*for($i=0;$i<mysql_num_rows($m);$i++)
	      {
	          echo $r["comment"];
	      }*/
	  }

	  echo ' </div>';
	  echo '</div>';

	}

	?>
	<div class="container">

		<div class="row">

			<div class="col-sm-6" style="margin-top:600px;">
				<div class="panel-info">
					<div class="panel-heading a">

					</div>
					<div class="panel body" style="background-color:#272822;color:white;">
						<strong>Discover the City you want to visit from those who have visited.</strong>
					</div>
				</div>
			</div>

			<div class="col-sm-6" style="margin-top:600px;">
				<div class="panel-info">
					<div class="panel-heading b" style="height:150px;background-image:url('images/comment.jpg'); background-repeat:no repeat;">

					</div>
					<div class="panel body" style="background-color:#272822;color:white">
						<strong>You can comment to make others know of your experience.</strong>
					</div>
				</div>
			</div>

		</div>
	</div>
</body>
</html>