

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>update_members</title>
  </head>
  <body>
  



   


<?php
    $dbconnect= mysqli_connect('localhost','root','','mydbase');
    include 'swal.php';

   $MemberID= $_GET['MemberID'];
   //echo $MemberID;
   
   $get_record=mysqli_query($dbconnect,"SELECT * FROM members WHERE  MemberID= '$MemberID' ");
   
   $get_record_num= mysqli_num_rows($get_record);




 if($get_record_num> 0){
    while($row= mysqli_fetch_assoc($get_record)){
      
      $db_last_name = $row['LastName'];
      $db_first_name= $row['FirstName'];
      $db_middle_name= $row['MiddleName'];
      $db_gender= $row['Gender'];
      $db_year= $row['Year'];
      $db_block= $row['Block'];
      $db_student_type= $row ['StudentType'];
      $db_contact_number= $row['ContactNumber'];
      $db_email= $row['Email'];
    }


    if(isset($_POST['btnUpdate'])){
         $new_last_name= $_POST['new_last_name'];
         $new_first_name= $_POST['new_first_name'];
         $new_middle_name= $_POST['new_middle_name'];

         $new_gender= $_POST['new_gender'];
         //isset($new_gender);
         $new_year= $_POST['new_year'];
         $new_block= $_POST['new_block'];
         $new_student_type= $_POST['new_student_type'];
         $new_contact_number= $_POST['new_contact_number'];
         $new_email= $_POST['new_email'];


         mysqli_query($dbconnect, "UPDATE members  SET LastName= '$new_last_name', FirstName= '$new_first_name', MiddleName= '$new_middle_name', Gender= '$new_gender',Year= '$new_year', Block= '$new_block', StudentType= '$new_student_type', ContactNumber= '$new_contact_number', Email='$new_email' WHERE MemberID= '$MemberID' ");
           echo '<script type="text/javascript">';
              echo 'setTimeout(function () { swal("Data Updated","Message!","success");';
              echo '}, 500);</script>';
     
          //header('Location:members.php');
    }
?>
    <form method="POST">



    <div class="form-row">


     <div class="col-md-4 mb-3">
      <label for="validationDefault02">Last name</label>
      <input type="text" class="form-control" id="validationDefault02" placeholder="Last Name" name="new_last_name" value="<?php echo $db_last_name;?>" required>
    </div> 

     <div class="col-md-4 mb-3">
      <label for="validationDefault02">First name</label>
      <input type="text" class="form-control" id="validationDefault06" placeholder="First Name"  name="new_first_name" value="<?php echo $db_first_name;?> " required>
    </div> 




     <div class="col-md-4 mb-3">
      <label for="validationDefault02">Middle name</label>
      <input type="text" class="form-control" id="validationDefault02" placeholder="Last name"  name="new_middle_name" value="<?php echo $db_middle_name;?> " required>
    </div>
   

     <div class="col-auto my-1">
      <label class="mr-sm-2" for="inlineFormCustomSelect">Gender</label>
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="new_Gender">
       <option selected>Choose..</option>
        <option value="Male" <?php if($db_gender =="Male"){echo "Selected ";} ?> value="Male">Male</option>
        <option value="Female" <?php if($db_gender == "Female"){echo "Selected ";} ?>value="Female">Female</option>
        
      </select>
    </div>

     <div class="col-md-1">
      <label for="validationDefault02">Year</label>
      <input type="text" class="form-control" id="validationDefault02" placeholder="Year" name="new_year" value="<?php echo $db_year;?>"  required>
    </div>

    <div class="col-md-1">
      <label for="validationDefault02">Block</label>
      <input type="text" class="form-control" id="validationDefault02" placeholder="Block" name="new_block" value="<?php echo $db_block;?>"required>
    </div>

      <div class="col-auto my-1">
      <label class="mr-sm-2" for="inlineFormCustomSelect">Student Type</label>
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="new_student_type">
        <option selected>Choose..</option>
        <option value="Officer"  <?php if($db_student_type == "Officer"){echo "Selected ";} ?>>Officer</option>
        <option value="Member"  <?php if($db_student_type == "Member"){echo "Selected ";} ?>>Member</option>
        
      </select>
    </div>

         
     <div class="col-md-4 mb-3">
      <label for="validationDefault02">Contact Number</label>
      <input type="text" class="form-control" id="validationDefault02" placeholder="Contact Number" name="new_contact_number" value="<?php echo $db_contact_number;?>" required>
    </div>

     <div class="col-md-4 mb-3">

    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="new_email" value="<?php echo $db_email;?>">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
  </div>









         <input type="submit" name="btnUpdate" value="Update">
    </form>



<?php


 }
 else{
  echo"<h1> No record </h1>";

 }
 

   






?>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>







