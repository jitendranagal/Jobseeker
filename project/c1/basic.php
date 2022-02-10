<?php
$pic=$_SESSION['logindt']['pic'];
$sql="select id from personal where pic='$pic'";
$a=mysqli_query($con,$sql);
$b=mysqli_fetch_assoc($a);
$_SESSION['logindt']['id']=$b['id'];
include_once("lioj.php");
?>