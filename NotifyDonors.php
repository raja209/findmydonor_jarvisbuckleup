<?php

session_start();

$email = $_SESSION['email'];
$f_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$age = $_SESSION['age'];
$donblood_group = $_SESSION['blood_group'];
$pincode = $_SESSION['pincode'];
		
				
				include("db.php");
				$result = $mysqli->query("SELECT * FROM users WHERE blood_group='$donblood_group'")  or die($mysqli->error());
				
				$row=mysqli_fetch_array($result);
				$donorfirst_name=$row['first_name'];
			
				$to = $row['email'];
				$subject = 'Blood request ( FindMyDonor.com )';
				$message_body = '
				Hello '.$donorfirst_name.',

				'.$f_name.' is in need of blood.

				Please click this link to accept the request:

				http://localhost/Design%20Lab%20Project/ConfirmRequest.php?email='.$row['email'].'&hash='.$hash;  

				mail( $to, $subject, $message_body );

				header("location: profile.php"); 
			

echo "$f_name"."<br>";
echo "$last_name"."<br>";
echo "$donblood_group"."<br>";
echo "$pincode"."<br>";

?>