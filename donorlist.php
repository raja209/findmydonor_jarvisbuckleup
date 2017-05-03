
<?php
session_start();
include 'php/Requester.php';
include 'php/Location.php';

$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];
$_SESSION['age'] = $_POST['age'];
$_SESSION['blood_group'] = $_POST['blood_group'];
$_SESSION['mobile'] = $_POST['mobile'];
$_SESSION['lat'] = $_POST['lat'];
$_SESSION['lng'] = $_POST['lng'];


$newReq = new Requester($_SESSION['first_name'],$_SESSION['last_name'],$_SESSION['email'],$_SESSION['mobile'],
						   $_SESSION['age'],$_SESSION['blood_group']);
$newReq->trackLocation($_SESSION['lat'],$_SESSION['lng']);

$reqLocation = new Location($_SESSION['lat'],$_SESSION['lng']);

$_SESSION['newreq'] = $newReq;  
?>


<html>
<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>MyDonorList</title>
<link href="css/webpagestyle.css" rel="stylesheet" type="text/css" media="screen" />
</head>
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
		<form name="donorselectform" action="NotifyDonors.php" method="post">
			<?php
				
				//Searching for prospective donors
				$result = $newReq->searchBlood($newReq->bloodDetails);
				;				
				
			?>
			<style>
				table,th,td{border:1px solid black;border-collapse:collapse;

				table.gridtable{
					border-collapse:collapse;
					border-color:#666666;
					color:#333333;
					font-family:verdana,arial,sans-serif;
					font-size:11px;
			}
			
			}
			.homebutton
			{
				padding-left: 30em;
				
                                border: none;
 
			}
			</style>
			
			<table style=" width:100%; " class="gridtable">
			<tr style="background-color: #4CAF50; color: white; height: 35px;">
			<th>Donor Name</th>
			<th>Donor Age</th>
			<th>Donor Gender</th>
			<th>Donor Address</th>
			</tr> 
			<?php
			$rowcount = mysqli_num_rows($result);
			if($rowcount>=1){
			while($row=mysqli_fetch_array($result)){?>
			
				<tr>
				<td><center><?php echo $row['first_name'] . " ". $row['last_name']?><center></td>
				<td><center><?php echo $row['age']?><center></td>
				<td><center><?php echo $row['gender']?><center></td>
				<td><center><?php echo $row['address']?><center></td>
				
				</tr>
			<?php	
			}
			}
			else{
				 header( "location: donornotfounderror.php" );
			}
			?>
			
			</table>
			<br>
			<div class="homebutton">
			<input type="submit" value="Notify" /> 
			</div>
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