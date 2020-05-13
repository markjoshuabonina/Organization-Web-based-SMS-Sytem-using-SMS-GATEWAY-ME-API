<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Insert Members</title>
  </head>
  <body>
     


     
     <form  action="insert_members.php" method="POST">
  <div class="form-row">


     <div class="col-md-4 mb-3">
      <label for="validationDefault02">Last name</label>
      <input type="text" class="form-control" id="validationDefault02" placeholder="Last name"  name="Lastname" required>
    </div> 

     <div class="col-md-4 mb-3">
      <label for="validationDefault02">First name</label>
      <input type="text" class="form-control" id="validationDefault06" placeholder="First Name"  name="Firstname" required>
    </div> 




     <div class="col-md-4 mb-3">
      <label for="validationDefault02">Middle name</label>
      <input type="text" class="form-control" id="validationDefault02" placeholder="Last name" name="Middlename"  required>
    </div>
   

     <div class="col-auto my-1">
      <label class="mr-sm-2" for="inlineFormCustomSelect">Gender</label>
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="Gender">
       <option selected>Choose..</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        
      </select>
    </div>

     <div class="col-md-1">
      <label for="validationDefault02">Year</label>
      <input type="text" class="form-control" id="validationDefault02" placeholder="Year" name="Year" required>
    </div>

    <div class="col-md-1">
      <label for="validationDefault02">Block</label>
      <input type="text" class="form-control" id="validationDefault02" placeholder="Block" name="Block"  required>
    </div>

      <div class="col-auto my-1">
      <label class="mr-sm-2" for="inlineFormCustomSelect">Student Type</label>
      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="StudentType">
        <option selected>Choose..</option>
        <option value="Officer">Officer</option>
        <option value="Member">Member</option>
        
      </select>
    </div>

         
     <div class="col-md-4 mb-3">
      <label for="validationDefault02">Contact Number</label>
      <input type="text" class="form-control" id="validationDefault02" placeholder="Contact Number" name="ContactNumber"  required>
    </div>

     <div class="col-md-4 mb-3">

    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="Email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
  </div>

   <button class="btn btn-primary" type="submit" name="Member_Submit">Submit form</button> 
  


</form>


   <form action="members.php">
     <button type="submit" class="btn btn-outline-warning">Cancel</button>
    
  </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

<?php

include 'swal.php';

$dbconnect= mysqli_connect('localhost','root','','mydbase');
  //  include '/connection/dbconnect.php';
    

     if(isset($_POST['Member_Submit'])){

      //echo "string";

      $Last_name=  $_POST["Lastname"];
      $First_name= $_POST["Firstname"];
      $Middle_name= $_POST['Middlename'];
      $Gender= $_POST['Gender'];
      $Year= $_POST['Year'];
      $Block= $_POST['Block'];
      $Student_type = $_POST['StudentType'];
      $contact_Number= $_POST['ContactNumber'];
      $Email= $_POST['Email'];

      mysqli_query( $dbconnect,"INSERT INTO members (LastName,FirstName,MiddleName,Gender,Year,Block,StudentType,ContactNumber,Email) VALUES ('$Last_name','$First_name','$Middle_name','$Gender', '$Year','$Block','$Student_type','$contact_Number','$Email') ");

       
  echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Data inserted!","Message!","success");';
  echo '}, 500);</script>';


       // header('Location:members.php');
     }

    



?>

