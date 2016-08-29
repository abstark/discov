<style type="text/css">
body
{
	background-image: url('images/coloured.jpg');
	
}

<?php
include 'menu.php'
?>



</style>
<body>
<link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.css">
<center>
<div class="panel panel-info " style="width:20%;margin-top:10em;">
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
						</div>
						<div class="form-group">
					<label class="control-label">Password</label>
						<div class="input-group">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
							</span>
							<input type="password" name="password" class="form-control">
						</div>
						</div>
						<input type="submit" name="b1" class="btn btn-primary" value="Login">
						<a href="#">Forgot Password?</a>					
						</form>
						</div>
						</div>
						</center>
						
						</body>