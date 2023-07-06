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
    $nn=md5($n);
    
     $filename = $_FILES["uploadfile"]["name"];
     $tempname = $_FILES["uploadfile"]["tmp_name"];
     $folder = "../img/" . $filename;
    $chk="select * from users where email='$m'";
    $run_chk=mysqli_query($co,$chk);
    if(mysqli_num_rows($run_chk) > 0){
		echo '<script>alert("Email Already Exist");</script>';
}elseif (move_uploaded_file($tempname, $folder)) {
    $ins="INSERT INTO `users`(`name`,`password`,`email`,`profile`) VALUES ('$l','$nn','$m','$filename')"; 
    $run_ins=mysqli_query($conn,$ins);
    if($run_ins){
        echo '<script>alert("New User Added Successfully");</script>';
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
        <title>Add New User</title>
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
                               <form action="" method="POST">
                        <div class="form-group">
                        <label>اسم الموظف</label>
                        <input type="text" class="form-control" name="a" required/>
                           </div>
                        <div class="form-group">
                            <label>رقم الموظف</label>
                        <input type="number" class="form-control" name="b" required/>
                           </div>
                        <div class="form-group">
                            <label>رقم الهاتف</label>
                        <input type="number" class="form-control" name="c" required/>
                           </div>
                       <div class="form-group">
                        <label>سكن الموظف</label>
                        <input type="text" class="form-control" name="d" required/>
                           </div>
                        <div class="form-group">
                        <label>القسم</label>
                        <input type="text" class="form-control" name="e" required/>
                           </div>
                         <div class="form-group">
                        <label>المرتب</label>
                        <input type="text" class="form-control" name="f" required/>
                           </div>
                      <div class="form-group">
                        <label>تاريخ التعيين| التوظيف</label>
                        <input type="date" class="form-control" name="g" required/>
                           </div>
                        <input type="submit" name="add" value="اضافة الموظف الجديد" class="btn btn-info">
                        </form>
        