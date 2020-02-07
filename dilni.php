<?php
session_start();
unset($_SESSION["perdorues"]);
unset($_SESSION["id_perdorues"]);
unset($_SESSION["id_dhome"]);
header("location:index.php");
?>