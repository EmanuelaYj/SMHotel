<?php
include("lidhja.php");
session_start();

?>
<html> <title>Sistem Menaxhimi Hoteli</title>
 <link rel="stylesheet" type="text/css" href="css/style.css"/>

</head>
<body>
    <div id="hyrje">

        <div id="koka">
		
            <div id="logo"> <h1> Sistem menaxhim hoteli </h1></div>
            <div id="linqe">
                <ul>
                     <li> <a href="index.php"> Kryefaqja </a></li>
					  <li> <a href="historiku.php"> Historiku  </a></li> 
                    <li> <a href="rezervo.php"> Rezervo</a></li>
                    <li> <a href="anullo.php"> Anullo</a></li>
                    <li> <a href="logrregj.php"> Hyr/Rregjistrohu</a></li>
               
                    <li> <a href="dilni.php">Dilni</a></li>
                    <li> <a href="#"> Info </a></li>
                </ul>
            </div>
        </div>
		 <div id="ndarje"> 
          <center> <h2 style="color:yellow">Hyni  nese jeni te rregjistruar!</h2></center> 
     
            <div style="background-color:rgba(255,255,255,.5);">
            <form method="post" action="login.php">
             <table id="tabela1">
                <tr>
                    <td> <b>Perdoruesi:</b></td>
                    <td>  <input type="text" name="perdorues" placeholder="Jepni perdoruesin" /></td>
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
header("location:login.php"); }
          
}

?>
            
            </div>
        </div>
        </div>
    
</body>
</html>