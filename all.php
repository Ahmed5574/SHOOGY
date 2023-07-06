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
        <title> My Images</title>
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
			  <li><a class="dropdown-item" href="up.php" title="Uploade Image"> <img src="images/up.png" width="40"></a></li>
		    </ul>
		</li>
	</ul>
  </div> <!-- navbar-collapse.// -->
 </div> <!-- container-fluid.// -->
</nav>
<section class="page-section bg-dark" id="about">
<table class="table table-striped table-dark">
                         <thead>
                           <tr align="center">
                             <th scope="col">Image</th>
                             <th scope="col">Uploade Date</th>
                            <th scope="col">Download Image</th>
                             <th scope="col">Delete</th>
                           </tr>
                         </thead>
                         <tbody>
                        <?php
                          $all="select * from uploaded where email='$x'";
                          $run_all=mysqli_query($co,$all);
                          while($row=mysqli_fetch_array($run_all))
                          {
                            $f=$row['file'];
                           $enc="AES-256-CBC";
                           $way="12345678901234567890123456789012";
                           $o=0;
                           $iv=str_repeat("0",openssl_cipher_iv_Length($enc));
                           $r=openssl_decrypt($f,$enc,$way,$o,$iv);   
                         ?>
                           <tr align="center">
                             <td><img src="./img/<?php echo $r; ?>" width="100" height="100"></td>
                             <td><br><?php echo $row['date']; ?></td>
                             <td><br>
                        <a class="btn btn-info btn-s" href="download.php?file=<?php echo $r; ?>">Download</a>
                             </td>
                             <td><br><a class="btn btn-danger btn-s" href="all.php?del=<?php echo $row['id']; ?>" onclick="return confirm('You Sure You Want Delete This Image??')">Delete</a></td>
                           </tr>
                             <?php } ?>
                         </tbody>
                       </table>
    <a  class="btn btn-danger btn-xl" href="home.php">Back</a>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</section>
    <?php

if(isset($_GET['del'])){
	$id=$_GET['del'];
	mysqli_query($co, "DELETE FROM uploaded WHERE id=$id");
	header("location:all.php");
}
?>