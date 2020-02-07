<?php
session_start();
unset($_SESSION["admini"]);
header("location:index.php");
?>