<?php
include("lidhja.php");
session_start();
if(isset($_SESSION['perdorues'])){
$perdorues= $_SESSION['id_perdorues'];
$dhome= $_SESSION['id_dhome'];}
$sql="insert into porosi (ID,IDdhom) value ('$perdorues','$dhome')";
if(mysqli_query($db,$sql))
header("location:index.php");

?>