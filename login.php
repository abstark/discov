<script type="text/javascript" src="JQuery.js"></script>
<script type="text/javascript">
	$(document).ready(function()
		{
			alert("Please enter a strong password. The site will not be responsible if any kind of password leak happens.");

		});
</script>
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

<?php
if(isset($_REQUEST['b']))
{

	if(isset($_REQUEST['firstname'])&&isset($_REQUEST['lastname'])&&isset($_REQUEST['username'])&&isset($_REQUEST['password'])&&isset($_REQUEST['email'])&& isset($_REQUEST['security']))
	{
		$con=mysqli_connect("localhost","root","","hello");
		if(!$con)

			die("Connection could not be established");



		$firstname=$_REQUEST['firstname'];
		$lastname=$_REQUEST['lastname'];
		$username=$_REQUEST['username'];
		$password=$_REQUEST['password'];
		$email=$_REQUEST['email'];
		$security=$_REQUEST['security'];
		$answer=md5($_REQUEST['answer']);
		$password=md5($password);
			//have to check wether the user exists or not.
		if(mysqli_query($con,"SELECT username from register where username='".$username."'"))
		{
			echo'<script>alert("Username not available"); window.location.href="login.php";</script>';

			//header("location:login.php");

		}


		if($m=mysqli_query($con,"INSERT INTO register(firstname, lastname, username, password, email, securityquestion, answer) VALUES ('".$firstname."','".$lastname."','".$username."','".$password."','".$email."','".$security."','".$answer."')"))
		{
			echo "success";
			header("location:index.php");
			echo "login here";
		}



		else
			echo "not success";




	}
	else
	{
		die("invalid login details");


	}

}
?>

<link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.css">
<div class="container">
	<div class="row">
		<div class="col-sm-3">
		</div>
		<form method="post" action="login.php">
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
								<input type="email" name="email" id="email" >
								<input type="button" name="checkemail" value="Check Email" class="btn btn-warning" onclick="show(document.getElementById('email').value)" >

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
								<input type="submit" class="btn btn-danger" value="Register" name="b" id="final" disabled="true">
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
<script type="text/javascript">
	function show(i)
	{
		$(document).ready(function()
		{
			var access_key ="9365198fd1a502aa3c62ce3fdc853b21";

			var email_address=i;


			$.ajax({
				url: "http://apilayer.net/api/check?access_key=" + access_key + "&email=" + email_address,   
				dataType: "jsonp",
				success: function(json) {

    // Access and use your preferred validation result objects
  	//alert(json.format_valid);
  	//alert(json.smtp_check);
  	//alert(json.score);
  	if(json.format_valid==false||json.smtp_check==false)
  	{
  		alert("the email address provided is not valid!!");
  		window.location.href="login.php";
  	}  		
  	else
  	{
  		document.getElementById('final').disabled=false;
  	}


  }
});
		});
	}

	</script>

