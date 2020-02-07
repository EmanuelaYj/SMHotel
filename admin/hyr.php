<?php
include("lidhja.php");
session_start();

?>
<html> <title>Sistem Menaxhimi Hoteli</title>
 <link rel="stylesheet" type="text/css" href="css/style1.css"/>

</head>
<body>
    <div id="hyrje">

        <div id="koka">
		
            <div id="logo"> <h1> Sistem menaxhim hoteli </h1></div>
            <div id="linqe">
                <ul>
                     <li> <a href="index.php"> Kryefaqja </a></li>
					  <li> <a href="#"> Historiku  </a></li> 
                    <li> <a href="rezervo.php"> Rezervo</a></li>
                    <li> <a href="anullo.php"> Anullo</a></li>
                    <li> <a href="hyr.php"> Hyr</a></li>
                    <li> <a href="gjendja.php"> Gjendja</a></li>
                    <li> <a href="#">Kerko</a></li>
                    <li> <a href="#"> Info </a></li>
                </ul>
            </div>
        </div>
		 <div id="ndarje"> 
            <h2>Logohu!</h2>
     
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
            $_SESSION['admini']=$admini;
          header("location:index.php");}

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