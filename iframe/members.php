
<!doctype html>
<html lang="en">
<head>
    <title></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<form action="insert_members.php">
    <button type="submit" class="btn btn-success" >Add New</button>
    
  </form>

 <form action="members.php" method="post">

 <table class="table table-striped " id="recordsTable">
   <thead>
    <tr class="table-primary">

      <th scope="col">No.</th>
      <th scope="col">Name</th>
      <th scope="col">Year & Section</th>
      <th scope="col">Gender</th>
 
      <th scope="col">Contact Number</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

<?php

 $dbconnect= mysqli_connect('localhost','root','','mydbase');

$sql = "SELECT * FROM members";
$result = $dbconnect->query($sql);


if($result->num_rows > 0){

?>
<?php
include 'swal.php';

$i= 1;
while($row = $result->fetch_assoc()){
    
    $MemberID= $row['MemberID'];
    $db_last_name = $row['LastName'];
    $db_first_name= $row['FirstName'];
    $db_middle_name= $row['MiddleName'];
    $db_gender= $row['Gender'];
    $db_year= $row['Year'];
    $db_block= $row['Block'];
    $db_student_type= $row ['StudentType'];
    $db_contact_number= $row['ContactNumber'];
    $db_email= $row['Email'];
   
    $full_name= ucfirst($db_last_name).",".ucfirst($db_first_name)."   ".ucfirst($db_middle_name).".";
    $year_and_section= $db_year."-".$db_block;

    echo "<tr>";
    echo"<td>".$i."</td>";
    echo"<td>".$full_name."</td>";
    echo"<td>".$year_and_section."</td>";
    echo"<td>".$db_gender."</td>";
    echo"<td>".$db_contact_number."</td>";
    echo"<td>".$db_email."</td>";
    echo"<td> ";
    echo '<input  type = "checkbox"  class= "delete_member" name = "member_id[]" value="'.$MemberID.'" />';
    echo "<a href = 'update.php?MemberID= $MemberID'>Update</a> <br><br>";
    echo "</td>";
    echo "</tr>";

    $i= $i + 1;
}
}
else{

echo "string";
}

?>   

<div align="right">

<!-- <button type="submit" class="btn btn-success" >Add New</button> -->

<button type="button" name="btn_delete" id="btn_delete" class="btn btn-danger">Delete</button>

</div>
 
</form>
</tbody>
</table>

 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>


<script>
$(document).ready(function(){
 
 $('#btn_delete').click(function(){
  
    var id = [];
   
    $(':checkbox:checked').each(function(i){
    id[i] = $(this).val();
    });

    if(id.length === 0) //tell you if the array is empty
   {
    swal("No checked", "Deletion Cancelled", "warning");
    }
    else {

 swal({
        title: "Are you sure?",
        text: "But you will still be able to retrieve this file.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    //swal("Deleted!", "Successfully Deleted", "success");  
    $.ajax({
     url:'post_delete_members.php',
     method:'POST',
     data:{id:id},
     success:function()
     {
       swal("Deleted!", "Successfully Deleted", "success");
       location.reload();   
     }
     
    });   
  } else {
    swal("Cancelled", "Deletion Cancelled", "error");
    location.reload();
  }
}); 

}

 });
 
 });
</script>

    