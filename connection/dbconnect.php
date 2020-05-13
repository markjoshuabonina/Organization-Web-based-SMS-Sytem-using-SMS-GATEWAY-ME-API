<?php
//$dbconnect= mysqli_connect('localhost','root','','mydbase');
if (mysqli_connect_errno($dbconnect))
{
	echo "Failed";
}
else{
	echo "Connected";
}
     


?>