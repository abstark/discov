<?php
include 'header.php';

?>

	<?php
	if(isset($_REQUEST['b']))
	{
		
		if(isset($_REQUEST['firstname'])&&isset($_REQUEST['lastname'])&&isset($_REQUEST['username'])&&isset($_REQUEST['password'])&&isset($_REQUEST['email'])&& isset($_REQUEST['security']))
		{
			$con=mysqli_connect("localhost","root","","hello");
			if(!$con)

				die("Connection could not be established");
			
			$firstname=mysqli_real_escape_string($con,$_REQUEST['firstname']);
			$lastname=mysqli_real_escape_string($con,$_REQUEST['lastname']);
			$username=mysqli_real_escape_string($con,$_REQUEST['username']);
			$password=mysqli_real_escape_string($con,$_REQUEST['password']);
			$email=mysqli_real_escape_string($con,$_REQUEST['email']);
			$security=mysqli_real_escape_string($con,$_REQUEST['security']);
			$answer=mysqli_real_escape_string($con,$_REQUEST['answer']);
			//have to check wether the user exists or not.
			if($m=mysqli_query($con,"INSERT INTO register VALUES('".$firstname."','".$lastname."','".$username."','".$email."','".$security."','".$answer."')"))
			{
				echo "success";
				header("location:main.php");
				echo "login here";
			}
			
			
			
			else
				echo "not success";
			



		}
		else
		{
			die("ivalid login details");


		}

	}
	?>
	
	<link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.css">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
			</div>
			<form method="post">
				<div class="col-sm-6">
					<div class="panel panel-info" style="margin-top:100px;">
						<div class="panel panel-heading">
							<h4>Register</h4>
						</div>
						<div class="panel panel-body">
							<div class="form-group">
								<label class="control-label">FirstName</label>
								<div class="input-group">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-arrow-right"></span>
									</span>
									<input type="text" name="firstname" class="form-control">
								</div>
								<label class="control-label">LastName</label>
								<div class="input-group">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-arrow-right"></span>
									</span>
									<input type="text" name="lastname" class="form-control">
								</div>
								<label class="control-label">Username</label>
								<div class="input-group">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-user"></span>
									</span>
									<input type="text" name="username" class="form-control">
								</div>
								<label class="control-label">Password</label>
								<div class="input-group">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-lock"></span>
									</span>
									<input type="password" name="password" class="form-control">
								</div>
								<label class="control-label">Email</label>
								<div class="input-group">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-envelope"></span>
									</span>
									<input type="email" name="email" class="form-control">
								</div>
								<br>
								<strong>Security Question</strong>
								<select name="security">
									<option > Who was your childhood hero? </option>
									<option > What was your childhood nickname? </option>
									<option > What is your oldest cousin's first and last name? </option>
									<option >What was the name of your elementary / primary school?</option>
									<option >What are the last 5 digits of your driver's license number?</option>
								</select>
								<label class="control-label">Answer</label>
								<div class="input-group">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-pencil"></span>
									</span>
									<input type="text" name="answer" class="form-control">
								</div>
								<br>
								<br>
								
								<center>
									<input type="submit" class="btn btn-danger" value="Register" name="b">
								</center>
							</div>
						</div>
					</div>
				</div>
			</form>
			<div class="col-sm-3">
			</div>
		</div>
	</div>