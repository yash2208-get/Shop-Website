<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		*{
			margin:0px;
			padding: 0px; 
		}
		.main_div
		{
			width: 100%;
			height: 100vh;
			position: relative;
		}
		.box
		{
			width: 400px;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			padding: 50px;
			background: rgba(0,0,0,0.8);
			border-radius: 10px; 
		}
		::selection
		{
			background:yellow;
			color: grey; 
		}
		.box h1
		{
			margin-bottom: 30px;
			color: #fff;
			text-align: center;
			text-transform: capitalize;
		}
		.box .inputbox
		{
			position: relative;
		}
		.box .inputbox input
		{
			width: 100%;
			padding: 10px;
			font-size: 16px;
			color: #fff;
			letter-spacing: 1px;
			margin-bottom: 30px;
			border :none;
			border-bottom: 1px solid #fff;
			background:transparent;
			outline: none; 
		}
		.box .inputbox label
		{
			position: absolute;
			top: 0px;
			left: 0px;
			letter-spacing: 1px;
			padding: 10px 0;
			font-size: 16px;
			color: #fff;
			transition: 0.5s;
		} 
		.box .inputbox input:focus ~label,
		.box .inputbox input:valid ~label
		{
			top: -20px;
			left: 0px;
			color: #03a9f4;
		}
		.box input[type="submit"]
		{
			background:transparent;
			border:none;
			outline: none;
			color: #fff;
			padding: 8px 16px;
			border-radius: 15px ; 
			display: grid;
			width: 10pc;
			font-size: 15px;
			border: 1px pink solid; 
		}
		.box input[type="submit"]:hover
		{
			background-color: #03a9f4;
		}
		span
		{
			margin-top: -30px; 
		}
		</style>
</head>
<body> 
	<?php
		require_once "cont.php";
		error_reporting(1);

		if (isset($_POST['submit'])) 
		{	
			$name=$_POST['user'];
			$pass=$_POST['password'];
			$num = array($name,$pass);
			$_SESSION["sign"]=$num;
			$mail="select *from sign where e_mail='$name'";
			$check=mysqli_query($con,$mail);
			$emailcount=mysqli_num_rows($check);
			if ($emailcount) 
			{
				$email_pass=mysqli_fetch_assoc($check);
				$db=$email_pass['passwords'];
				//$decode=password_verify($pass,$db);
				if ($db==$pass) 
				{
					echo "login Successful";
					header("location: add_card.php");
				}
				else
				{
					$a="Password Incorrrct!";
				}
			}
			else
			{
				$b="Invalid Email";
			}
			//echo $_SESSION["sign"];
		}
		//session_unset();

	?>
<div class="main_div">
	<div class="box">
		<h1>Login Form</h1>
		<form method="post" action="">
			<div class="inputbox">
				<input type="email" name="user" autocomplete="off" required id="user">
				<label>Email Name</label>
				<span id="p1"><?php echo $b; ?></span>
			</div>
			<div class="inputbox">
				<input type="password" name="password" autocomplete="off" required id="pass">
				<label>Password</label>
				<span id="p1"><?php echo $a; ?></span>
			</div>
			<span id="p2" style="margin:5px; color: red"></span>
			<br>
			<br>
			<center>
			<input type="submit" name="submit" value="Login" onclick="login1()">
			<br>
			<a href="singn2.php"><input type="submit" name="" value="Sign up"></center>
		</form>
	</div>
</div>
</body>
</html>