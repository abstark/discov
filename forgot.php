<?php
if(isset($_REQUEST["c1"]))
{
	if(isset($_REQUEST["newpass"]))
	{
		$password=stripslashes($_REQUEST["newpass"]);
		$password=@mysql_real_escape_string($password);
		$con=@mysql_connect("localhost","root","");
		if(!$con)
		{
			die("Connection could not be established!");
		}
		mysql_select_db("hello");
		if($t=mysql_query("SELECT * FROM register WHERE username='".$_REQUEST["user"]."'"))
		{
			$e=mysql_fetch_assoc($t);
			if($w=mysql_query("UPDATE register "))
			
		}
	
	}
	else
	{
		echo "<script>";
		echo "alert('Password Field Left Empty!!');";
		echo "</script>";
	}


}

?>

<?php
if(isset($_REQUEST["b1"]))
{
	$con=@mysql_connect("localhost","root","");
	if(!$con)
	{
		die("connection could not be established!");
	}
	mysql_select_db("hello");
	if($m=mysql_query("SELECT * FROM register WHERE username='".$_REQUEST["username"]."'"))
	{
		if(mysql_num_rows($m))
		{
			if($r=mysql_query("SELECT * FROM register WHERE username='".$_REQUEST["username"]."'"))
			{
				$q=mysql_fetch_assoc($r);
				$username=$_REQUEST["username"];
				if($q["securityquestion"]==$_REQUEST["security"]&&$q["answer"]==($_REQUEST["answer"]))
				{
					echo "<form action='forgot.php'>";
					echo "<input type='password' name='newpass'>";
					echo "<input type='submit' name='c1'>";
					echo '<input type="hidden" value="<?php echo "$username"; name="user"?>">';
					echo "</form>";

				}
				else
				{
					echo "<script>";
					echo "alert('Wrong Security Question or Answer!');";
					echo "</script>";

				}
			}
		}

		else
		{
			echo "<script>";
			echo "alert('You are not a Registered User!');";
			echo "</script>";

		}

	}
}
?>
<form method="post" action="forgot.php">
	<input type="text" name="username">
	Please select your Security Question<select name="security">
	<option > Who was your childhood hero? </option>
	<option > What was your childhood nickname? </option>
	<option > What is your oldest cousin's first and last name? </option>
	<option >What was the name of your elementary / primary school?</option>
	<option >What are the last 5 digits of your driver's license number?</option>
</select>
<input type="text" name="answer">
<input type="submit" name="b1">
</form>