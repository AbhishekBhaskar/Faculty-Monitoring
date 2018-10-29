<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="Login_v1/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/css/util.css">
	<link rel="stylesheet" type="text/css" href="Login_v1/css/main.css">
	
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
	  
		<div class="container-login100">
			<h1 style="font-family: Poppins-Bold;padding-bottom: 60px;padding-top: 40px; text-shadow: 2px 2px 5px;">Faculty Monitoring System</h1>	   
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt style="padding-top: 5px;">
					<img src="Login_v1/images/img-01.png" alt="IMG" style="margin-left: 220px;">
				</div>

				<form class="login100-form validate-form" style="margin-left: 230px;" method="post" action="login.php">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136" style="padding-top: 30px;">
					<!--	<a class="txt2" href="#"> -->
							<a class="txt2" onClick="plusDivs(1)">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
			
			<div class="wrap-login100 w3-animate-right" >
			<div class="login100-pic js-tilt" data-tilt>
					<img src="Login_v1/images/img-01.png" alt="IMG" style="margin-left: 220px;">
				</div>
			
				<form class="login100-form validate-form" method="post" action="reg.php" style="margin-left: 230px;">
				    <span class="login100-form-title">Member registeration</span>
				    
				    <div class="wrap-input100 validate-input">
				    	Select user type:
				    	<select name="u_type" class="input100">
				    		<option value="Faculty">Faculty</option>
				    		<option value="HOD">HOD</option>
				    		<option value="Admin">Admin</option>
				    	<!--	<option value="" selected>Select an option</option> -->
				    		<option hidden="Select an option" selected>Select an option</option>
				    	</select>
					</div>
				    
				    <div class="wrap-input100 validate-input">
				    
				    	Enter name:
				    	<input class="input100" type="text" name="U_name" placeholder="">
				    <!--	<span class="error">* <?php echo $nameError;?></span> -->
				    	
				    </div>
				   
				    <div class="wrap-input100 validate-input">
				    Enter email:
				    <input class="input100" type="text" name="email" placeholder="">
				  <!--  <span class="error">* <?php echo $emailError;?></span> -->
					</div>
			    
			    	<div class="wrap-input100 validate-input">
				    Enter password:
				    <input class="input100" type="password" name="pass" placeholder="">
				<!--    <span class="error">* <?php echo $passError;?></span> -->
					</div>
		    
		    		<div class="wrap-input100 validate-input">
				    Enter phone number:
				    <input class="input100" type="text" name="phNo" placeholder="">
				<!--    <span class="error">* <?php echo $passError;?></span> -->
					</div>
			    
			    <input type="submit">
			    	<div class="container-login100-form-btn">
					<!--	<button class="login100-form-btn">
							Register
						</button> -->
						
					</div>
				    
				</form>
			
			</div>
			
		</div>
	</div>
	
	
<script>
	var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("wrap-login100");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
	</script> 
	
	

	
<!--===============================================================================================-->	
<!--	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>-->
<!--===============================================================================================-->
<!--	<script src="vendor/bootstrap/js/popper.js"></script> -->
<!--	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>-->
<!--===============================================================================================-->
<!--	<script src="vendor/select2/select2.min.js"></script>-->
<!--===============================================================================================-->
<!--	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>-->
<!--===============================================================================================-->
	<!--<script src="js/main.js"></script> -->

</body>
</html>