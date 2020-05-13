<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  
<form method="post" action="#">

           <div class="form-check form-check-inline">
            <DIV>
                <h5>Recipient: &nbsp &nbsp</h5> 
            </DIV>
          <input class="form-check-input" type="radio" name="mode" id="inlineRadio1" value="Officers" required>
          <label class="form-check-label" for="inlineRadio1">Officers</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="mode" id="inlineRadio2" value="Members">
          <label class="form-check-label" for="inlineRadio2">Members</label>
        </div>

        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="mode" id="inlineRadio2" value="All">
          <label class="form-check-label" for="inlineRadio2">All</label>
        </div>

        <DIV>
                <h5>Message: &nbsp &nbsp</h5> 
            </DIV>

        <div class="form-group">
         
          <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="22" name= "message" required></textarea>
        </div>

<div align="right">
<button type="submit" class="btn btn-success waves-effect"  name="btnsubmit">&nbsp SEND &nbsp</button>
<button type="button" class="btn btn-danger waves-effect">CANCEL</button>

</div>

<?php
include 'swal.php';
$checker= "";

  $dbconnect= mysqli_connect('localhost','root','','mydbase');
            require_once('smsGatewayV4.php');
            $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU4NjY5MjI0OCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjc5MjgxLCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.qkBxBNZKT8pi4c6r9LWWm7TjVPUuwV905hhby_JCw1Y";

          //  $phone_number = "09219657947";

           // $deviceID = "116661";
            $deviceID = "117039";
            $options = [];
            $smsGateway = new SmsGateway($token);


if(isset($_POST["btnsubmit"]))
{       
               if (isset($_POST['mode'])) {
                     $mode = $_POST['mode'];

                      echo "". $mode;


                        if($mode == 'Officers'){
                          $sql= "SELECT ContactNumber FROM members WHERE StudentType = 'Officer'  or 'officer' ";
                          $array_mode=  'Officers';

                          echo $array_mode;
                        }
                        elseif ($mode == 'Members') {
                          $sql= "SELECT ContactNumber FROM members WHERE StudentType = 'Member'  or 'member' ";
                          $array_mode=  'Members';
                          echo $array_mode;
                        }
                        else{
                          $sql = "SELECT ContactNumber FROM members ";
                          $array_mode= 'All';
                          echo $array_mode;
                        }

                  }

             $message = $_POST['message'];

          
            //$sql = "SELECT ContactNumber FROM members ";
            $result = $dbconnect->query($sql);


            if($result->num_rows > 0)

            {
              $array_Contact_numbers= array();
                while($row = $result->fetch_assoc()){  
                       $array_Contact_numbers[]= $row;        
                    }
                   
            foreach ($array_Contact_numbers as $value ){
                    $phone_number= implode("", $value);
                    $sms_info= $smsGateway->sendMessageToNumber($phone_number, $message, $deviceID, $options);

                    //print_r($sms_info);
               
                    }
            }

            else{
              $checker = "error";

                echo "no record";
            }

            echo "<br>";echo "<br>";
       

        if ($checker !== "error"){
              print_r($sms_info);

          echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";

            $array_outbox_id= $sms_info['response'][0]['id'];
            $array_message = $sms_info['response'][0]['message'];
            $array_date= $sms_info['response'][0]['updated_at'];
            $array_response= $sms_info['response'][0]['status'];
            $array_status= $sms_info['status'];

               echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";


            if(($array_response=='pending' or 'sent') and ($array_status=='200')){
                                $array_message_status= "Sent";
                //timezone conversion
                date_default_timezone_set('UTC');
                $date= $sms_info['response'][0]['updated_at'];
                $datetime = new DateTime($date);
                $datetime->format(DATE_ISO8601);
                $manila_time = new DateTimeZone('Asia/Manila');
                $datetime->setTimezone($manila_time);
                echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
                  $datetime->format(DATE_RFC850);
                   $array_date_sent= $datetime->format(DATE_RFC850);


                mysqli_query($dbconnect,"INSERT INTO outbox (OutboxID,Date_sent,Message,Mode,Status) VAlUES ('$array_outbox_id','$array_date_sent','$array_message','$array_mode','$array_message_status') ");

                         
              echo '<script type="text/javascript">';
              echo 'setTimeout(function () { swal("Message Sent","Message!","success");';
              echo '}, 500);</script>';
                                                                                         
            }

            else{
              echo "Sending Failed saved to outbox";
                           
              echo '<script type="text/javascript">';
              echo 'setTimeout(function () { swal("Sending Failed","Check your internet connection","error");';
              echo '}, 500);</script>';

      
             }

              
                    // $array_message_status= "Failed";

                    // mysqli_query($dbconnect,"INSERT INTO outbox (OutboxID,Date_sent,Message,Mode,Status) VAlUES ('$array_outbox_id','$array_date_sent','$array_message','$array_mode','$array_message_status') ");

            }
            else{

             echo '<script type="text/javascript">';
              echo 'setTimeout(function () { swal("Sending Failed","Check yor internet connection","error");';
              echo '}, 500);</script>';

            }


}
?>



</form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>