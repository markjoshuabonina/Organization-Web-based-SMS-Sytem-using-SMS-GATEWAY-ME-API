



<html>
<head>
<title>PHP isset() example</title>
</head>


<body>



<form method="post" action="#">
       <input type="radio" name="mode" value="Officers">Officers 
	   <input type="radio" name="mode" value="Members">Members
	   <input type="radio" name="mode" value="All">All<br><br> Message
       <input type="text" name="message"><br/>

       <input type="submit" value="Send" name="btnsubmit"><br/><br/>

</form>
</body>
</html>
 


<?php


	$dbconnect= mysqli_connect('localhost','root','','mydbase');
						require_once('smsGatewayV4.php');
						$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU4NjY5MjI0OCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjc5MjgxLCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.qkBxBNZKT8pi4c6r9LWWm7TjVPUuwV905hhby_JCw1Y";

					//	$phone_number = "09219657947";

						$deviceID = "116661";
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
               						$array_mode=  'All';
               						echo $array_mode;
               					}

               		}




	                	$message = $_POST['message'];

					
						//$sql = "SELECT ContactNumber FROM members ";
						$result = $dbconnect->query($sql);


						if($result->num_rows > 0){
							$array_Contact_numbers= array();
								while($row = $result->fetch_assoc()){  
						       		 $array_Contact_numbers[]= $row;        
						        }
						       
						foreach ($array_Contact_numbers as $value ){
										$phone_number= implode("", $value);
										$sms_info= $smsGateway->sendMessageToNumber($phone_number, $message, $deviceID, $options);

										print_r($sms_info);
						   
						        }
						}
						else{
							echo "no record";
						}

						echo "<br>";echo "<br>";


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
                                                                                

							    
						}

						else{
							echo "Sending Failed saved to outbox";
						}


}
?>










<?php


 			// if (isset($_POST['btnSubmit'])){

 			// 			 echo "string";

				// 		$dbconnect= mysqli_connect('localhost','root','','mydbase');
				// 		require_once('smsGatewayV4.php');
				// 		$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTU4NjY5MjI0OCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjc5MjgxLCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.qkBxBNZKT8pi4c6r9LWWm7TjVPUuwV905hhby_JCw1Y";

				// 		$phone_number = "09219657947";

				// 		$deviceID = "116661";
				// 		$options = [];

 			// 			$message = $_POST['message'];

				// 		$smsGateway = new SmsGateway($token);
				// 		$sql = "SELECT ContactNumber FROM members";
				// 		$result = $dbconnect->query($sql);


				// 		if($result->num_rows > 0){
				// 			$array_Contact_numbers= array();
				// 				while($row = $result->fetch_assoc()){  
				// 		       		 $array_Contact_numbers[]= $row;        
				// 		        }
						       
				// 		foreach ($array_Contact_numbers as $value ){
				// 						$phone_number= implode("", $value);
				// 						$sms_info= $smsGateway->sendMessageToNumber($phone_number, $message, $deviceID, $options);
						   
				// 		        }
				// 		}
				// 		else{
				// 			echo "no record";
				// 		}


						// Array ( [response] => Array ( [0] => Array ( [id] => 111593096 [device_id] => 116661 [phone_number] => 09111111111 [message] => message = lalaland [status] => pending [log] => Array ( ) [updated_at] => 2020-04-19T07:23:53+00:00 [created_at] => 2020-04-19T07:23:53+00:00 ) ) [status] => 200 )


			// 			print_r($sms_info);
			// 			echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";

			// 			$outbox_id= $sms_info['response'][0]['id'];
			// 			$array_message = $sms_info['response'][0]['message'];
			// 			$array_date= $sms_info['response'][0]['updated_at'];
			// 			$array_response= $sms_info['response'][0]['status'];
			// 			$array_status= $sms_info['status'];

			// 			   echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";


			// 			if(($array_response=='pending' or 'sent') and ($array_status=='200')){

			// 					//timezone conversion
			// 					 date_default_timezone_set('UTC');
			// 					$date= $sms_info['response'][0]['updated_at'];
			// 					$datetime = new DateTime($date);
			// 					echo $datetime->format(DATE_ISO8601) . "\n";
			// 					$manila_time = new DateTimeZone('Asia/Manila');
			// 					$datetime->setTimezone($manila_time);
			// 					echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
			// 					echo $datetime->format(DATE_RFC850);
			// 					//
			// 			}

			// }

        ?>

