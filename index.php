<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
		<script src="http://maps.google.com/maps/api/js?sensor=false">
        </script>
        <script>
            if (navigator.geolocation)
            {
                navigator.geolocation.getCurrentPosition(showCurrentLocation);
            }
            else
            {
               alert("Geolocation API not supported.");
            }

            function showCurrentLocation(position)
            {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                var coords = new google.maps.LatLng(latitude, longitude);

                var mapOptions = {
                zoom: 15,
                center: coords,
                mapTypeControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            //create the map, and place it in the HTML map div
            map = new google.maps.Map(
            document.getElementById("mapPlaceholder"), mapOptions
            );

            //place the initial marker
            var marker = new google.maps.Marker({
            position: coords,
			draggable:true,
            map: map,
            title: "Current location!"
            });
            
			google.maps.event.addListener(marker, 'dragend', function (event) {
				document.getElementById("latbox").value = this.getPosition().lat();
				document.getElementById("lngbox").value = this.getPosition().lng();
			});

			
			}
        </script>
		
		<script type="text/javascript">
		function myValidation(){
		//Validate regular expression
		var re_age=/^\d{1,3}$/;
		var re_pincode=/^\d{6}$/;
		var re_name=/^[A-Za-z]+$/;
		var re_cntc=/^\d{10,12}$/;
		
		
		
		var vaidate_mobile=document.getElementById("mobile").value;
		var vaidate_age=document.getElementById("age").value;
		var vaidate_pincode=document.getElementById("pincode").value;
		var vaidate_firstname=document.getElementById("firstname").value;
		var vaidate_lastname=document.getElementById("lastname").value;
		
		
		if(!re_cntc.test(vaidate_mobile)){
				alert("Please enter 10 digit mobile number!");
				return false;
			}
		
		
		if(!re_age.test(vaidate_age)){
				alert("Please enter correct age!");
				return false;
			}
		
		
		if(!re_pincode.test(vaidate_pincode)){
				alert("Please enter correct 6 digit pincode!");
				return false;
			}
		
		
		if(!re_name.test(vaidate_firstname)){
				alert("First name should be alphabetic!");
				return false;
			}
		
		
		if(!re_name.test(vaidate_lastname)){
				alert("Last name should be alphabetic!");
				return false;
			}
			
		}
		
		
		
		
		</script>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Welcome to FindMyDonor</title>
<link href="css/webpagestyle.css" rel="stylesheet" type="text/css" media="screen" />
</head>
  <style>
    #mapPlaceholder {
        height: 140px;
        width: 700px;
    </style>
<body>
<div id="wrapper">
	<div id="header">
		<div id="logo">
		 
			<h1><a href="index.php">Findmydonor</a></h1>
			<p>save life, give blood.</p>
		</div>
	</div>
	<!-- end #header -->
	<div id="menu">
		<ul>
			<li class="current_page_item"><a href="index.php">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="donor_registration.php">Donor Registraion</a></li>
			<li><a href="#">Find Hospitals</a></li>
			<li><a href="#">Report a Problem</a></li>
			<li><a href="#">Contact Us</a></li>
		</ul>
	</div>
	<!-- end #menu -->
	<div id="page">
		 
		<form name="indexform" onsubmit="return myValidation()" action="donorlist.php" method="post" autocomplete="off">		
		<table style="font-size:12 px">
			<tr><td><b>Please fill in the details:</b><td>
			</tr>
			<tr>
				<td>Blood Group:</td>
				<td><select name="blood_group" id="Blood_Group" class =""  required >
                                                <option value="">-- Select Blood Group --</option>
                                                       <option value="A +ve" >A+</option>
                                                       <option value="A -ve" >A-</option>
                                                       <option value="B +ve" >B+</option>
                                                       <option value="B -ve" >B-</option>
                                                       <option value="AB +ve" >AB+</option>
                                                       <option value="AB -ve" >AB-</option>
                                                       <option value="A1 +ve" >A1+</option>
                                                       <option value="A1 -ve" >A1-</option>
                                                       <option value="A2 +ve" >A2+</option>
                                                       <option value="A2 -ve" >A2-</option>
                                                       <option value="O +ve" >O+</option>
                                                       <option value="O -ve" >O-</option>
             </select></td>
			</tr>
			
			<tr>
				<td>Age:</td>
				<td><input type="text" required autocomplete="off" name='age' id='age'/></td>
			</tr>
			<tr>
				<td>Location(Pincode):</td>
				<td><input type="text" required autocomplete="off" name='pincode' id='pincode'/></td>
			</tr>
			<tr>
				<div>
				<b>Your current location</b>
				Latitude: <input size="20" type="text" id="latbox" name="lat" >Longitude: <input size="20" type="text" id="lngbox" name="lng" >
				<div id="mapPlaceholder"></div>
				</div>
			<tr>
			<tr>
				<td>First Name:</td>
				<td><input type="text" required autocomplete="off" name='firstname' id='firstname'/></td>
			</tr>
			
			<tr>
				<td>Last Name:</td>
				<td><input type="text" required autocomplete="off" name='lastname' id='lastname'/></td>
			</tr>
					
			<tr>
				<td>Email Id:</td>
				<td><input type="email"required autocomplete="off" name='email' /></td>
			</tr>
			
			<tr>
				<td>Mobile number:</td>
				<td><input type="text" required autocomplete="off" name='mobile' id='mobile'/></td>
			</tr>
			
			
		</table>
		
		<button type="submit" class="button button-block" name="Search" />Search</button>
		
		</form>
		
	</div>
	<!-- end #page -->
</div>
<div id="footer">
	<p>Copyright &copy All rights reserved.</p>
</div>
<!-- end #footer -->
</body>
</html>
