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
// Add new use 
if(isset($_POST['add'])){
    $l=$_POST['a'];
    $m=$_POST['b'];
    $n=$_POST['c'];
    
    $sel="select * from admins where email='$m'";
    $runsel=mysqli_query($co,$sel);
     if(mysqli_num_rows($runsel) > 0){
            echo'<script>alert("Sorry!, Email Used");</script>';
     }else{
   
    $ins="INSERT INTO `admins`(`email`,`password`,`f_name`) VALUES ('$m','$n','$l')"; 
    $run_ins=mysqli_query($co,$ins);
    if ($run_ins) {
        echo '<script>alert("New Admin Added Successfully");</script>';
        header('REFRESH:1;URL=dmins.php');
    }else{
        echo '<script>alert("Error In Adding, Try Again");</script>';
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Add New Admin</title>
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
        <center>
            <BR><BR><BR>
                               <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                        <label>Admin Name</label>
                        <input type="text" class="form-control" name="a" required/>
                           </div>
                        <div class="form-group">
                            <label>Admin Email</label>
                        <input type="email" class="form-control" name="b" required/>
                           </div>
                        <div class="form-group">
                            <label>Admin Password</label>
                        <input type="password" class="form-control" name="c" required/>
                           </div>
                       
                        <input type="submit" name="add" value="Add New Admin" class="btn btn-info">
                        </form>
            </center>
        