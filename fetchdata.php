<?php
$con=mysqli_connect("localhost","root","","hello");
if(!$con)
die("bye bye");
$m=strtolower($_REQUEST['q']);
if($res=mysqli_query($con,"SELECT * FROM opinion WHERE city='".$m."'"))
    {
        while($row=mysqli_fetch_assoc($res))
        {
        echo $row["username"]." :".$row["comment"];
        echo "\n";
	    }


}

?>