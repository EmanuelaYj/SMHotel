<?php
include("lidhja.php");
session_start();

?>
<html> 
<title>SISTEM MENAXHIMI HOTELI </title>
 <link rel="stylesheet" type="text/css" href="css/style.css"/>

</head>
<body>
    <header> 
       <div id="hyrje">
          
                <ul>
                     <li> <a href="index.php"> Kryefaqja </a></li>
					  <li> <a href="gjendja.php"> Gjendja </a></li> 
                    <li> <a href="rezervo.php"> Rezervo</a></li>
                    <li> <a href="anullo.php"> Anullo</a></li>
                    <li  class="aktive"> <a href="hyr.php"> Hyr</a></li>
            
              <li> <a href="info.php"> Info </a></li>
                  <li> <a href="dilni.php">Dilni</a></li>
                     <li> <form action="kerko.php" method="post">
                    <input  type="text" name="kerko" placeholder="kerko"> 
                    <input type="submit" name="kerkimi" value="Kerko"></form></li> 
                 
                </ul> </div>
<div class="titulli">
            <h2 style="color:yellow">Logohu!</h2>
     
            <div style="background-color:rgba(255,255,255,.5);">
            <form method="post" action="hyr.php">
             <table id="tabela1">
                <tr>
                    <td> <b>Administratori:</b></td>
                    <td>  <input type="text" name="admini" placeholder="Jepni perdoruesin" /></td>
                </tr>
           <tr>
                    <td><b>Fjalekalimi</b></td>
                   <td><input type="password" name="fjalekalim1" placeholder="Fusni fjalekalimin" /></td>
                </tr>
            <tr>
                    <td ><input type="submit" value="Hyr" name="hyr" />  </td>
                
                </tr>
            </table></form>
                <?php

  if(isset($_POST['hyr'])){
            $admini=$_POST['admini'];
      
            $fjalekalim=$_POST['fjalekalim1'];
            
           

         $anketim1="SELECT * FROM administrator WHERE admin='$admini' AND fjalekalim='$fjalekalim'";
             $rezultati= mysqli_query($db,$anketim1);
             
            if (mysqli_num_rows($rezultati)>0){
            while( $el=mysqli_fetch_assoc($rezultati)){
             $admini=$el['ID'];
                } 
          
           $_SESSION['id_admin']=$id;
            $_SESSION['admini']=$admini;
          header("location:index.php");
                }

             else{
             echo "<script> alert('Ju keni vene vlera te pasakta') </script>";
                header("location:hyr.php"); }
          
}

?>
            
            </div>
        </div>
        </div>
    
</body>
</html>