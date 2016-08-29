<link rel="stylesheet" type="text/css" href="form.css">

<?php
if(!isset($_COOKIE["user"]))
{
	echo "<script> alert('Please Log in First!'); window.location.href='l.php'; </script>";
}


?>

<script type="text/javascript">
	alert("You can only enter your Description if the place is Valid.To check if the place is valid Just enter the city name and click on Check button.If it exists then the description textarea will automatically be enabled.");
		document.getElementById("b").disabled=true;
</script>


<?php
include "menu1.php";

?>

<?php
//session_start();
if(isset($_REQUEST['b']))
{
	$a=$_REQUEST['city'];
	$b=$_REQUEST['description'];
	$c=$_COOKIE['user'];
	if(isset($a)&&isset($b))
	{
		$con=@mysql_connect("localhost","root","");
		if(!$con)
		{
			die("bye bye");
		}
		mysql_select_db("hello");
		$m="INSERT INTO `opinion`( `city`, `username`, `comment`) VALUES ('".$a."','".$c."','".$b."')";
		if($res=mysql_query($m))
		{
			echo '<script>';
			echo 'alert("You have successfully entered your comment");';
			echo "window.location.href='index.php'";
			echo '</script>';

		}
		else
		{
			echo "alert('Sorry the Comment could not be entered!')";
			echo "window.location.href='form.php'";
		}
	}
}
?>
<style type="text/css">
	#a
	{

		height:200;
		width:500;
	}
</style>

<script type="text/javascript">
	function show(i)
	{
		if(i.length==0)
		{
			document.getElementById("a").value=null;
			return;
		}
		else
		{
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function()
			{
				document.getElementById("a").value=xmlhttp.responseText;

			}
			xmlhttp.open("GET","fetchdata.php?q="+i,true);
			xmlhttp.send();
		}
	}
</script>
</script>
<body>

	<table style="margin-top:100px;">
		<form method="get" action="form.php">
			<table>
				<tr><td>City:</td><td><input type="text" onkeyup="show(this.value)" name="city" id="address" list="list"></td><td><input id="submit" type="button" value="Check" class="btn btn-danger" style="margin-left:-300px;" ></td></tr>
				<datalist id="list">
					<option value="chennai"></option>
					<option value="afghanistan"></option>
					<option value="andaman and nicobar"></option>
					<option value="new-york"></option>
					<option value="delhi"></option>
					<option value="kolkota"></option>
					<option value="bhubaneswar"></option>
					<option value="manipal"></option>
					<option value="mangalore"></option>
					<option value="bangalore"></option>
					<option value="gurgaon"></option>
				</datalist>
				<br>
				<tr><td>Description:</td><td><textarea id="b" name="description" disabled ="true" style="width:400px;height:100px;"></textarea></td></tr>

				<tr><td>Previous Comments:</td><td><textarea id="a" disabled="true"></textarea></td></tr>
				<br>
				<tr><td></td><td><input type="submit" name="b" class="btn btn-primary" ></td></tr>
			</table>

		</form>
	</div>
</body>





<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	<meta charset="utf-8">
	<style>

		#map 
		{
			height: 40%;
			width:30%;
			margin-top: -20em;
			margin-left:60em;
		}

	</style>

</head>

<body>
	<div id="map"></div>
	<script>
		function initMap() {
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 8,
				center: {lat: 28.6139391, lng: 77.2090212}
			});
			var geocoder = new google.maps.Geocoder();

			document.getElementById('submit').addEventListener('click', function() {
				geocodeAddress(geocoder, map);
			});
		}

		function geocodeAddress(geocoder, resultsMap) {
			var address = document.getElementById('address').value;
			geocoder.geocode({'address': address}, function(results, status) {
				if (status === 'OK') {
					//alert(address);
					document.getElementById("b").disabled=false;
					resultsMap.setCenter(results[0].geometry.location);
					var marker = new google.maps.Marker({
						map: resultsMap,
						position: results[0].geometry.location
					});
				} else {
					document.getElementById("b").disabled=true;
					alert("Sorry the place you entered could not be found.");
				}
			});
		}
	</script>
	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuXpEmuqEKxwoRXl-rLtrkwJ9KyXWwArg&callback=initMap">
</script>

</body>
</html>