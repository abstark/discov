<?php
session_start();
delete();
?>
<?php
function delete()
{
	
	$con=@mysql_connect("localhost","root","");
	if(!$con)
	{
		die("Connection could not be established!");
	}
	mysql_select_db("hello");
	if($m=mysql_query("SELECT * FROM opinion WHERE username='".$_COOKIE["user"]."'"))
	{
		//$q=mysql_fetch_array($m);
		//mysql_data_seek($m,0);
		/*if(mysql_num_rows($q)==0)
		{
			echo "No Comments Till Now"."<br>";
		}*/
		while($r=mysql_fetch_array($m))
			{
				$a=$r["city"];
				$b=$r["comment"];
				$_SESSION["a"]=$a;
				$_SESSION["b"]=$b;
				echo "<form>".$a."->".$b."<input type='submit' value='Delete' name='delete'>"."</form>";
		
			}
		/*else
		{
			echo "<script>";
			echo "alert('You have no comments till now')";
			echo "window.location.href='main.php'";
			echo "</script>";
		}*/
	}
}

?>
<?php
if(isset($_REQUEST["delete"]))
{
	$con=@mysql_connect("localhost","root","");
	if(!$con)
	{
		die("Connection could not be established!");
	}
	mysql_select_db("hello");
	$m = mysql_query("DELETE FROM opinion WHERE city='".$_SESSION["a"]."' and comment='".$_SESSION["b"]."'");
	//if($m=mysql_query("DELETE FROM opinion WHERE city='".$_SESSION["a"]."' and comment='".$_SESSION["b"]."'"))
	//{
		echo "<script>";
		echo "alert('You have successfully deleted the comment!')";
		echo "</script>";
		delete();
	//}
}
?>