<?php
session_start();
$co=mysqli_connect('localhost','root','','imagedrive');
if(!$co){
    echo'<script>alert("Error In Connection With Database");</script>';
}
if(isset($_POST['sign'])){
    $n=$_POST['name'];
    $e=$_POST['email'];
    $p=$_POST['pass'];
    $p2=$_POST['pass2'];
   
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./img/" . $filename;
    $pp=md5($p);
    if($p !=$p2){
        echo'<script>alert("Passwords  Do Not Match");</script>';
    }else{
        $sel="select * from users where email='$e'";
        $run=mysqli_query($co,$sel);
        if(mysqli_num_rows($run) > 0){
            echo'<script>alert("Sorry!, Email Used");</script>';
    }else{
         $ins="INSERT INTO `users`(`name`, `password`, `email`, `profile`) VALUES ('$n','$pp','$e','$filename')";
          $run_ins=mysqli_query($co,$ins);
            $_SESSION['user']= $e;
            if (move_uploaded_file($tempname, $folder)) {
                echo'<script>alert("Welcome Member, Forwording To Login Page");</script>';
                header('REFRESH:1;URL=login.php'); 
            }else{
                echo '<script>alert("Sorry, You cant Signup No");</script>';
            }
        }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css2/util.css">
	<link rel="stylesheet" type="text/css" href="css2/main.css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/pic.jpg" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="" method="POST" enctype="multipart/form-data">
					<span class="login100-form-title">
						Sign up
					</span>
                    
                    	<div class="wrap-input100 validate-input" >
						<input class="input100" type="text"  placeholder="Full Name" name="name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

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
                    
                    		<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass2" placeholder="Retype Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Profile is required">
                        <input class="input100" type="file" name="uploadfile" required/>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="sign">
							Sign Up
						</button>
					</div>
	
<br><br>
			I Have Account &nbsp;&nbsp;&nbsp;&nbsp; <a href="login.php">Login</a>
					
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>