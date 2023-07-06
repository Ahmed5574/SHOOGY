<?php
session_start();
$co=mysqli_connect('localhost','root','','imagedrive');
if(!$co){
    echo'<script>alert("Error In Connection With Database");</script>';
}
if($_SESSION['user']){
	$x=$_SESSION['user'];
}else{
	echo '<script>alert("You Dont Have A Permision To Access To This Page");</script>';
	header('REFRESH:1;URL=index.php'); 
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet" />
		 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>

<style type="text/css">

/* ============ desktop view ============ */
@media all and (min-width: 992px) {
	.navbar .nav-item .dropdown-menu{ display: none; }
	.navbar .nav-item:hover .nav-link{   }
	.navbar .nav-item:hover .dropdown-menu{ display: block; }
	.navbar .nav-item .dropdown-menu{ margin-top:0; }
}	
/* ============ desktop view .end// ============ */

</style>
		<style>
		.out:hover{
			opacity:1;
		}
		</style>
    </head>
    <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 <div class="container-fluid">
 	 <a class="navbar-brand" href="out.php"><img src="images/out.png" width="40" style="border-radius:50%;"></a>
	 <a class="navbar-brand" href="#"><b style="margin-left:800%;">Pic Drive</b></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <div class="collapse navbar-collapse" id="main_nav">
	<ul class="navbar-nav ms-auto">
		<li class="nav-item dropdown">
			<a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown"> <img src="images/ham.png" width="40"> </a>
		    <ul class="dropdown-menu dropdown-menu-end">
			  <li><a class="dropdown-item" href="profile.php" title="My Profile"><img src="images/prof.png" width="40"></a></li>
			  <li><a class="dropdown-item" href="all.php" title="My Images"><img src="images/fold.png" width="40"></a></li>
		    </ul>
		</li>
	</ul>
  </div> <!-- navbar-collapse.// -->
 </div> <!-- container-fluid.// -->
</nav>

       <section class="page-section bg-dark" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">

                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">You Can Store Your Photos, And They Will Be Protected And Encrypted.</p>
                        <a class="btn btn-dark btn-xl" href="up.php"><i class="bi bi-upload"></i>&nbsp; Upload Now</a>
                         
                    </div>
                </div>
                <br><br><br><br><br><br><br><br><br><br><br><br>
            </div>
        </section>
        
      <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>