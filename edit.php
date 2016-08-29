<?php
session_start();
edit();
$con=@mysql_connect("localhost","root","");
if(!$con)
	die("Connection could not be established!");
mysql_select_db("hello");
if(isset($_REQUEST["submit_edit"]))
{
	if($m=mysql_query("INSERT INTO opinion( `city`, `username`, `comment`) VALUES ('".$_SESSION["a"]."','".$_COOKIE["user"]."','".$_REQUEST["newedit"]."')"))
	{
		edit();
	}
}
if(isset($_REQUEST["edit"]))
{
	show();
}
?>
<?php
function edit()
{
	$con=@mysql_connect("localhost","root","");
	if(!$con)
	{
		die("Connection could not be established!");
	}
	mysql_select_db("hello");

	if($m=mysql_query("SELECT * FROM opinion WHERE username='".$_COOKIE["user"]."'"))
	{
		

		if(mysql_num_rows($m)>-1)
		{

			while($r=mysql_fetch_array($m))
			{

				$a=$r["city"];
				$b=$r["comment"];
				$_SESSION["a"]=$a;
				$_SESSION["b"]=$b;
				echo "<form>".$a."->".$b."<input type='submit' value='Edit' name='edit'></form>";
				
			}
		}
	}
}
?>
<?php
function show()
{
	

	
	echo "<form><input type='text' name='newedit'><input type='submit' name='submit_edit'></form>";
	
}

?>