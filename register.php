<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];
$_SESSION['age'] = $_POST['age'];
$_SESSION['blood_group'] = $_POST['blood_group'];
$_SESSION['address'] = $_POST['address'];
$_SESSION['pincode'] = $_POST['pincode'];
$_SESSION['mobile'] = $_POST['mobile'];
$_SESSION['donor_gender'] = $_POST['donor_gender'];
$_SESSION['donor_latitude'] = $_POST['lat'];
$_SESSION['donor_longitude'] = $_POST['lng'];


// Escape all $_POST variables to protect against SQL injections
$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$age = $mysqli->escape_string($_POST['age']);
$blood_group = $mysqli->escape_string($_POST['blood_group']);
$address = $mysqli->escape_string($_POST['address']);
$pincode = $mysqli->escape_string($_POST['pincode']);
$mobile = $mysqli->escape_string($_POST['mobile']);
$donor_gender = $mysqli->escape_string($_POST['donor_gender']);
$donor_latitude = $mysqli->escape_string($_POST['lat']);
$donor_longitude = $mysqli->escape_string($_POST['lng']);



$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
      
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO users (first_name, last_name, email, age, gender, blood_group, address, pincode, latitude, longitude, mobile, password, hash) " 
            . "VALUES ('$first_name','$last_name','$email', '$age', '$donor_gender', '$blood_group', '$address', '$pincode', '$donor_latitude', '$donor_longitude', '$mobile', '$password', '$hash')";

    // Add user to the database
    if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification ( FindMyDonor.com )';
        $message_body = '
        Hello '.$first_name.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost/project/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );

        header("location: profile.php"); 

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

}