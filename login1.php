<?php
if(isset($_POST['b1']))
{
	$a=$_POST['username'];
	$b=$_POST['password'];

	
	
	$con=@mysql_connect("localhost","root","");
	if(!$con)
		die("connection could not be established");
	$a = stripslashes($a);
	$b = stripslashes($b);
	$a=@mysql_real_escape_string($a);
	$b=@mysql_real_escape_string($b);
	mysql_select_db("hello");
	$b=md5($b);	
	if($r=mysql_query("SELECT * FROM register WHERE username='".$a."' AND password='".$b."'"))
	{
		if(mysql_num_rows($r)==1)
		{


			setcookie("user",$a,time()+3600,'/');
			echo '<script>';
			echo 'alert("Successful Login!");';
			echo 'window.location.href="form.php"';
			echo '</script>';
		}
		else
			echo "<script>";
		echo 'alert("Insuccessful Login");';
		echo 'window.location.href="l.php"';
		echo "</script>";
	}
	


}
?>


