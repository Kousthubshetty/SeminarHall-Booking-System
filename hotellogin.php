<?php 
include("header.php"); 
if(isset($_SESSION['adminid']))
{
    echo "<script>window.location='dashboard.php';</script>";  
}
if(isset($_SESSION['staffid']))
{
    echo "<script>window.location='staffdashboard.php';</script>";  
}
if(isset($_SESSION['hotel_id']))
{
    echo "<script>window.location='hoteldashboard.php';</script>";  
}
if(isset($_POST['btnsubmit']))
{
    $pwd = md5($_POST['password']);
    $sqllogin= "SELECT * FROM hotel WHERE email_id='$_POST[email_id]' AND password='$pwd' AND status='Active'";
    $qsqllogin = mysqli_query($con,$sqllogin);

	$sqllogin1= "SELECT * FROM hotel WHERE email_id='$_POST[email_id]' AND password='$pwd' AND status='Inactive'";
    $qsqllogin1 = mysqli_query($con,$sqllogin1);

	

    if(mysqli_num_rows($qsqllogin) == 1)
    {
        $rslogin = mysqli_fetch_array($qsqllogin);
        $_SESSION['hotel_id'] = $rslogin['hotel_id'];
        echo "<script>window.location='hoteldashboard.php';</script>";
    }
    else if(mysqli_num_rows($qsqllogin1) == 1)
    {
		echo "<script>alert('You account is Inactive...');</script>";
	}
	else
    {
        echo "<script>alert('You have entered invalid login credentials');</script>";
        echo "<script>window.location='hotellogin.php';</script>";
    }
}
?>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="Login_v8/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v8/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v8/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login_v8/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v8/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v8/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login_v8/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v8/css/util.css">
	<link rel="stylesheet" type="text/css" href="Login_v8/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<br><br><br><br>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form p-l-55 p-r-55 p-t-178" method="post" onsubmit="return validateform()">
					<span class="login100-form-title">
						Hotel Login <br>
					</span>
					<span class="errmsg"  id="erremail_idf"></span>
					<div class="wrap-input100 m-b-16">
						<input class="input100" type="email" name="email_id" id="email_idf" placeholder="Email ID">
						<span class="focus-input100"></span>
					</div>
					<span class="errmsg"  id="errpassword"></span>
					<div class="wrap-input100 ">
						<input class="input100" type="password"  name="password" id="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="text-right p-t-13 p-b-23">
						<a href="hotelforgotpassword.php" class="txt2">
							Forgot Password?
						</a>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn"  name="btnsubmit">
							Login
						</button>
					</div>
					<br><br><br><br>

					<!-- <div class="flex-col-c p-t-17 p-b-40">
						<span class="txt1 p-b-9">
							Don’t have an account?
						</span>

						<a href="#" class="txt3">
							Register now
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	<br><br><br>
	
<!--===============================================================================================-->
	<script src="Login_v8/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v8/vendor/bootstrap/js/popper.js"></script>
	<script src="Login_v8/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v8/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v8/vendor/daterangepicker/moment.min.js"></script>
	<script src="Login_v8/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="Login_v8/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="Login_v8/js/main.js"></script>
	<?php include("footer.php"); ?>
	<script>
function validateform()
{
	var numericExpression = /^[0-9]+$/;
	var alphaExp = /^[a-zA-Z]+$/;
	var alphaNumericExp = /^[0-9a-zA-Z]+$/;
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,5}$/;
	var alphaspaceExp = /^[a-zA-Z\s]+$/;
	var err = "false";
	$('.errmsg').empty();
	if(!$('#email_idf').val().match(emailExp))
	{
		$('#erremail_idf').html('Entered Email ID is not valid..');
		err = "true";
	}
	if($('#email_idf').val() == "")
	{
		$('#erremail_idf').html('Email ID Should not be empty..');
		err = "true";
	}
	if($('#password').val().length < 6)
	{
		$('#errpassword').html('Password should contain more than 6 characters..');
		err = "true";
	}
	if($('#password').val() == "")
	{
		$('#errpassword').html('Password Should not be empty..');
		err = "true";
	}
	if(err == "true")
	{
		return false;
	}
	else
	{
		return true;
	}
}
</script>