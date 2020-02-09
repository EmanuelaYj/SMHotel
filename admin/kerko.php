<?php
include("lidhja.php");
session_start();
if(!isset($_SESSION['admini'])) {
header("location:hyr.php");
}

if(isset($_POST['kerkimi'])){

  $kerko=$_POST['kerko'];
            $anketim="select * from klient where perdorues like '%".$kerko."%' or emri like '%".$kerko."%' or mbiemri like '%".$kerko."%' or posta like '%".$kerko."%'  or adresa like '%".$kerko."%'";
            $rez=mysqli_query($db,$anketim);
           $anketim1="select * from dhoma where llojdhome like '%".$kerko."%' or hyrja like '%".$kerko."%' or dalja like '%".$kerko."%'";
            $rez1=mysqli_query($db,$anketim1);
   
if($rez){while($el=mysqli_fetch_assoc($rez)){ 
        echo"<html> <body> <table>";
 echo"<h3>".$kerko."</h3>";
  echo"<tr><td>" .$el['perdorues'].   "</td><td>".$el['emri']." </td><td>".$el['mbiemri']." </td><td>".$el['posta']." </td><td>".$el['adresa']."</td></tr>";}}
        
  if($rez1){while($el=mysqli_fetch_assoc($rez1)){ 
        
 echo"<h3>".$kerko."</h3>";
  echo"<tr><td>".$el['llojdhome']." </td><td>".$el['hyrja']." </td><td>".$el['dalja']." </td></tr>";}
}
else{
echo"Kerkimi juaj nuk dha rezultat";
}
        
 
  echo"</table> </body> </html>"; }
  ?>