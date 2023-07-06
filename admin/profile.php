<?php
session_start();
$co=mysqli_connect('localhost','root','','imagedrive');
if(!$co){
    echo'<script>alert("Error In Connection With Database");</script>';
}
if($_SESSION['admin']){
	$em=$_SESSION['admin'];
}else{
	echo '<script>alert("You Dont Have A Permision To Access To This Page");</script>';
	header('REFRESH:1;URL=index.php'); 
}

?>
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Control Panel| My Profile</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/style.css" rel="stylesheet" />
    </head>
    <body id="page-top">
    
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="one.html"><img src="img/admin.png" width="80" style="border-radius:50%;"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="profile.php">My Profile &nbsp;<i class="bi bi-people-fill"></i></a></li> 
                        <li class="nav-item"><a class="nav-link" href="dmins.php">Admins &nbsp;<i class="bi bi-credit-card-2-front"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="files.php">Files &nbsp;<i class="bi bi-bag-heart"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="users.php">Users &nbsp;<i class="bi bi-capsule-pill"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="one.php">Home &nbsp;<i class="bi bi-house"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
      <br><br><br>
    
        <section class="page-section bg-light">
 <?php
						$sel="select * from admins where email='$em'";
						$runsel=mysqli_query($co,$sel);
						while($row=mysqli_fetch_array($runsel)){
                            $n=$row['f_name'];
                            $p=$row['password'];
                            $id=$row['id'];
						
						?>
            <center>
            <form action="" method="post">
              <i class="bi bi-person"></i>&nbsp;  Your Name<input type="text" name="name" value="<?php echo $n ?>" class="form-control"><br><br> 
               <i class="bi bi-envelope-at"></i>&nbsp; Your Email<input type="text" name="email" value="<?php echo $em ?>" class="form-control"><br><br> 
                <i class="bi bi-lock-fill"></i> &nbsp; Your Password<input type="text" name="pass" value="<?php echo $p ?>" class="form-control"><br><br> 
                <input type="submit" name="update" value="Update Data" class="btn btn-dark">
                </form>
                <?php 
                if(isset($_POST['update'])){
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $pass=$_POST['pass'];
                    
                    $upd="UPDATE `admins` SET `email`='$email',`password`='$pass',`f_name`='$name' WHERE id='$id'";
                    $runup=mysqli_query($co,$upd);
                    if($runup){
                        echo '<script>alert("The data has been updated, you will be redirected to the login page");</script>';
                        header('REFRESH:1;URL=index.php'); 
                    }else{
                        echo '<script>alert("Error, Try Again");</script>';
                    }
                }
                ?>

            </center>
            <?php } ?>
        </section>
        