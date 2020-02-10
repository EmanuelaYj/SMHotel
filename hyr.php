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
                     <li > <a href="index.php"> Kryefaqja </a></li>
					  <li> <a href="historiku.php"> Historiku  </a></li> 
                    <li> <a href="rezervo.php"> Rezervo</a></li>
                    <li> <a href="anullo.php"> Anullo</a></li>
                    <li  class="aktive"> <a href="hyr.php"> Hyr</a></li>
             <li> <a href="regjistrimi.php"> Rregjistrohu</a></li>
              <li> <a href="info.php"> Info </a></li>
                 
                 
                </ul> </div>
<div class="titulli">
		    <div class="shume1">
            <a class="buton" href="admin/hyr.php">Futu si administrator</a>

        </div>
          <center> <h2 style="color:yellow">Hyni  nese jeni te rregjistruar! Nese nuk jeni te rregjistruar klikoni <a style="text-decoration:none" href="regjistrimi.php" > ketu.</a></h2></center> 
     </br>
            <div style="background-color:rgba(255,255,255,.5);">
            <form method="post" action="hyr.php" autocomplete=off>
             <table id="tabela1">
                <tr>
                    <td> <b>Perdoruesi:</b></td>
                    <td>  <input type="text" name="perdorues" placeholder="Jepni perdoruesin"  required/></td>
                </tr>
           <tr>
                    <td><b>Fjalekalimi</b></td>
                   <td><input type="password" name="fjalekalim1" placeholder="Fusni fjalekalimin" required /></td>
                </tr>
            <tr>
                    <td ><input type="submit" value="Hyr" name="hyr" />  </td>
                
                </tr>
            </table></form>
                <?php

  if(isset($_POST['hyr'])){
            $perdorues=$_POST['perdorues'];
      
            $fjalekalim=$_POST['fjalekalim1'];
            
            $fjalekalim=md5($fjalekalim);

         $anketim1="SELECT * FROM klient WHERE perdorues='$perdorues' AND fjalekalim='$fjalekalim'";
             $rezultati= mysqli_query($db,$anketim1);
             
            if (mysqli_num_rows($rezultati)==1){
            
           while( $el=mysqli_fetch_assoc($rezultati)){
             $id=$el['ID'];
                } 
          
           $_SESSION['id_perdorues']=$id;
          $_SESSION['perdorues']=$perdorues;
          
          header("location:index.php");
                }
             else{
            echo"<script>alert('Te dhenat e futura jane te pasakta!')</script>";
 }
          
}

?>
            
            </div>
        </div>
        </div>
    
</body>
</html>