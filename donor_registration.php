
<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign-Up/Login Form</title>
  <?php include 'css/css.html'; ?>
</head>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in

        require 'login.php';
        
    }
    
    elseif (isset($_POST['register'])) { //user registering
        
        require 'register.php';
        
    }
}
?>
<body>
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab"><a href="#signup">Sign Up</a></li>
        <li class="tab active"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">

         <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="donor_registration.php" method="post" autocomplete="off">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="email"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password"/>
          </div>
          
          <p class="forgot"><a href="forgot.php">Forgot Password?</a></p>
          
          <button class="button button-block" name="login" />Log In</button>
          
          </form>

        </div>
          
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="donor_registration.php" method="post" autocomplete="off">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='firstname' />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name='lastname' />
            </div>
          </div>
		  
		  <div class="top-row">
			<div class="field-wrap">
              <label>
                Age<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='age' />
            </div>
			
			<div class="field-wrap">
              
               <select name="donor_gender" id="Donor_gender" class =""  required >
                                                <option value="">-- Select Gender --</option>
                                                       <option value="Male" >Male</option>
                                                       <option value="Female" >Female</option>
				</select>									   
            </div>
        
            <div class="field-wrap">
			 
             <select name="blood_group" id="Blood_Group" class =""  required >
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
             </select>
			
              
            </div>

          </div>
		  
		  

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name='email' />
          </div>
		  
		  <div class="field-wrap">
            <label>
              Present Address<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off" name='address' />
		 </div>
		
		<div class="top-row">
			<div class="field-wrap">
              <label>
                Pincode<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='pincode' />
            </div>
        
            <div class="field-wrap">
              <label>
                Mobile Number<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='mobile' />
            </div>
        </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name='password'/>
          </div>
          
          <button type="submit" class="button button-block" name="register" />Register</button>
          
          </form>

        </div>  
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
