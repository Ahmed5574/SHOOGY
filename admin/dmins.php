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
if(isset($_GET['del'])){
	$id=$_GET['del'];
	mysqli_query($co, "DELETE FROM users WHERE id=$id");
	header("location:users.php");
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
        <title>Control Panel| Users</title>
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
                        <li class="nav-item"><a class="nav-link " href="profile.php">My Profile &nbsp;<i class="bi bi-people-fill"></i></a></li> 
                        <li class="nav-item"><a class="nav-link active" href="dmins.php">Admins &nbsp;<i class="bi bi-credit-card-2-front"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="files.php">Files &nbsp;<i class="bi bi-bag-heart"></i></a></li>
                        <li class="nav-item"><a class="nav-link " href="users.php">Users &nbsp;<i class="bi bi-capsule-pill"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="one.php">Home &nbsp;<i class="bi bi-house"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
      <br><br><br>
    
        <section class="page-section bg-light">
              <a href="newadmin.php"  class="btn btn-info">
         <i class="bi bi-plus-square-fill"></i> &nbsp;  Add New Admin 
        </a> <br><br>
 <table class="table">
  <thead>
    <tr class="table-dark" align="center">
    <th scope="col">Admin Name</th>
    <th scope="col">Admin Email</th>    
    </tr>
  </thead>
  <tbody>
      <?php
      $post="select * from admins";
      $run_post=mysqli_query($co,$post);
      while($row=mysqli_fetch_array($run_post)){
      ?>
    <tr align="center">
      <td><?php echo $row['f_name'];?></td>
      <td><?php echo $row['email'];?></td>
      
    </tr>
      <?php } ?>
    </tbody>
</table>
        </section>
        