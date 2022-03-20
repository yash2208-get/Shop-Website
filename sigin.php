<?php
// Include config file
require_once "cont.php";
  $name;
   $password;
    $email;
    $phone;
// Define variables and initialize with empty values
$email = $name = $phone = $password = $confirm_password = "";
$emailErr = $nameErr = $phone_err = $password_err = $confirm_password_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	 if(empty($_POST["name"])) 
	 {
    	$nameErr = "Name is required";
  	 }  
    else 
    {
    		$name = $_POST["name"];
    		if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) 
    		{
      			$nameErr = "Only letters and white space allowed";
    		}
	}

	if(strlen($_POST["content"]) < 10 || strlen($_POST["content"]) > 10)
	{
        $phone_err = "Phone Number must have atleast 10 digit .";
	}
    else
    {
        $phone = trim($_POST["content"]);
	}
    	//email
      if(empty($_POST["email"])) 
      {
     		$emailErr = "Email is required";
  	  } 
  	  else 
  	  {
    		$email = ($_POST["email"]);
    // check if e-mail address is well-formed
    		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    		{
      			$emailErr = "Invalid email format";
    		}
  	  }


    // Validate password
    if(empty(trim($_POST["sign_password"])))
        $password_err = "Please enter a password.";     
    elseif(strlen(trim($_POST["sign_password"])) < 6)
        $password_err = "Password must have atleast 6 characters.";
    else
        $password = trim($_POST["sign_password"]);
    
    
    // Validate confirm password
    if(empty(trim($_POST["re-password"])))
        $confirm_password_err = "Please confirm password.";     
    else
        $confirm_password = trim($_POST["re-password"]);
    if(empty($password_err) && ($password != $confirm_password))
            $confirm_password_err = "Password did not match.";
        
    
    
    // Check input errors before inserting in database
    if(empty($emailErr) && empty($nameErr) && empty($phone_err) && empty($password_err) && empty($confirm_password_err))
    {
      	$phone= strval($phone);
        // Prepare an insert 
        $sql = "INSERT INTO sign (name, pass,email,cont) VALUES ( '$name', '$password', '$email','$phone')";
         
       
            // Attempt to execute 
            if(mysqli_query($con,$sql))
            {
                // Redirect to login page
                header("location: index.php");
            }
             else
                echo "Something went wrong. Please try again later.";
    }
    
    // Close connection
    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Page</title>
	<style>
		* {
			margin: 0px;
			padding: 0px;
		}

		.main_div {
			width: 100%;
			height: 100vh;
			position: relative;
		}
		.box {
			width: 400px;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			padding: 50px;
			background: rgba(0, 0, 0, 0.8);
			border-radius: 10px;
		}
		::selection
		{
			background:yellow;
			color: grey; 
		}
		.box h1 {
			margin-bottom: 30px;
			color: #fff;
			text-align: center;
			text-transform: capitalize;
		}

		.box .inputbox {
			position: relative;
		}

		.box .inputbox input {
			width: 100%;
			padding: 10px;
			font-size: 16px;
			color: #fff;
			letter-spacing: 1px;
			margin-bottom: 30px;
			border: none;
			border-bottom: 1px solid #fff;
			background: transparent;
			outline: none;
		}

		.box .inputbox label {
			position: absolute;
			top: 0px;
			left: 0px;
			letter-spacing: 1px;
			padding: 10px 0;
			font-size: 16px;
			color: #fff;
			transition: 0.5s;
		}

		.box .inputbox input:focus~label,
		.box .inputbox input:valid~label {
			top: -20px;
			left: 0px;
			color: #03a9f4;
		}
		.box input[type="submit"] {
			background: transparent;
			border: none;
			outline: none;
			color: #fff;
			background: #03a9f4;
			padding: 8px 16px;
			border-radius: 5px;
			font-size: 20px;

		}
		input[type=number]::-webkit-inner-spin-button, 
		input[type=number]::-webkit-outer-spin-button 
		{ -webkit-appearance: none; 
			-moz-appearance: none; 
			appearance: none; 
			margin: 0; 
		}
		span
		{
			padding: 5px;
			color: red;
			font-size: 15px;
		}
	</style>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body>
	<div class="main_div">
		<div class="box">
			<h1>Sign Form</h1>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
				<div class="inputbox" <?php echo (!empty($nameErr)) ? 'has-error' : ''; ?>>
					<input type="text" name="name" autocomplete="off" required id="user_name" >
						<span><?php echo $nameErr; ?></span>					
					<label>User Name</label>
				</div>
				
				<div class="inputbox" <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>>
					<input type="number" minlength="10" name="content" autocomplete="off" required id="content" >
					<span><?php echo $phone_err; ?></span>
					<label>Contact Number</label>
				</div>
				<div class="inputbox" <?php echo (!empty($emailErr)) ? 'has-error' : ''; ?>>
					<input type="email" name="email" autocomplete="off" required id="e-mail">
					<label>E-mail id</label>
					<span><?php echo $emailErr; ?></span>
				</div>
				<div class="inputbox" <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>>
					<input type="password" name="sign_password" autocomplete="off" required id="sign_password">
					<span><?php echo $password_err; ?></span>
					<label>Password</label>
				</div>
				<div class="inputbox" <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>>
					<input type="password" name="re-password" autocomplete="off" required id="re-password">
					<span><?php echo $confirm_password_err; ?></span>
					<label>Re-Password</label>
				</div>
				<span id="p2"></span>
				<input type="submit" name="b1" value="Sign up">
			</form>
		</div>
	</div>
</body>
</html>