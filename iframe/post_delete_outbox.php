
<?php

$dbconnect= mysqli_connect('localhost','root','','mydbase');

if(isset($_POST["id"]))
{
 foreach($_POST["id"] as $id)
 {
  $query = "DELETE FROM outbox WHERE OutboxID = '".$id."' ";
  mysqli_query($dbconnect, $query);
 }
}


?>

