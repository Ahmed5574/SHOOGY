<?php
session_start();
session_unset();
session_destroy();
echo '<script>alert("Logout Complete");</script>';
header('REFRESH:1;URL=login.php');

?>
