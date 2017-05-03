
<?php

include 'Request.php';

 class Requester {
      var $firstname;
	  var $lastname;
	  var $email_id;
	  var $mobile;
	  var $age;
	  var $latitude;
	  var $longitude;
	  var $bloodDetails;
	  var $id;
   /*
    function setID($rid){
		$this->id=$rid;
      }
	  
	function getID(){
		return $this->id;
      }
	  */
	function trackLocation($lat, $lon){
		$this->latitude=$lat;
		$this->longitude=$lon;
      }
	  
	function calDistance($lat2, $lon2) {
					
				  $lat1=$this->getLatitude();
				  $lon1=$this->getLongitude();	
				  
				  $theta = $lon1 - $lon2;
				  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
				  $dist = acos($dist);
				  $dist = rad2deg($dist);
				  $miles = $dist * 60 * 1.1515;
				  $kilometers = $miles * 1.609344;
				  
				  return $kilometers;  
				}
				
	function searchBlood($bloodDetails){
		include 'db.php';
		$index = 0;
		$selId = '(0';
		
		
		$result = $mysqli->query("SELECT * 
		FROM users u
		WHERE u.blood_group = '$bloodDetails->bloodgroup'")  or die($mysqli->error());
		
		
		while($row=mysqli_fetch_array($result)){
			$dist = $this->calDistance($row['latitude'],$row['longitude']);
			if($dist<=5.0){
				$selId = $selId.','.$row['id'];
				
			}
		}
		
		$selId = $selId.')';
		$result = $mysqli->query("SELECT * 
		FROM users 
		WHERE id in $selId")  or die($mysqli->error());
		
		return $result;
		
         
      }	
	
	function notifyDonor($par){
         
      }
	
	function chooseHospital($par){
         
      }
	  
	function getFirstName(){
        return $this->firstname; 
      }
	
	function getLastName(){
        return $this->lastname; 
      }	
	  
	function getEmailId(){
        return $this->email_id; 
      }
	  
	function getMobile(){
        return $this->mobile;         
      }
	  
	function getAge(){
        return $this->age;         
      }
	  
	function getLatitude(){
        return $this->latitude;         
      }
	  
	function getLongitude(){
        return $this->longitude;         
      }
	  
   function __construct( $par1, $par2, $par3, $par4, $par5, $par6 ) {
   $this->firstname = $par1;
   $this->lastname = $par2;
   $this->email_id = $par3;
   $this->mobile = $par4;
   $this->age = $par5;
   $this->bloodDetails = new Request();
   $this->bloodDetails->setBloodType($par6);
	}
 }	
	  
?>