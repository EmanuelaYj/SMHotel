<?php
include("lidhja.php");


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
                    <li > <a href="rezervo.php"> Rezervo</a></li>
                    <li> <a href="anullo.php"> Anullo</a></li>
                  <?php if(!isset($_SESSION['perdorues'])){ ?>  <li> <a href="hyr.php"> Hyr</a></li> <?php } ?>
             <li class="aktive"> <a href="regjistrimi.php"> Rregjistrohu</a></li>
              <li> <a href="info.php"> Info </a></li>
                 
                   <?php if(isset($_SESSION['perdorues'])){ ?>    <li> <a href="dilni.php">Dilni</a></li>  <?php } ?>
                 
                </ul> </div>
<div class="titulli">
            <h2 style="color:yellow">Regjistrohu!</h2> </br>
            <div style="background-color:rgba(255,255,255,.5);">
            <form method="post" action="regjistrimi.php" autocomplete=off> 
                <table id="tabela1">
                <tr>
                    <td> <b>Perdoruesi:</b></td>
                    <td>  <input type="text" name="perdorues" placeholder="Jepni perdoruesin" required/></td>
                </tr>
                <tr>
                    <td><b>Emri</b>:</td>
                   <td> <input type="text" name="emri"  placeholder="Jepni emrin" required /> </td>
                </tr>
                  <tr>
                    <td><b>Mbiemri:</b></td>
                   <td> <input type="text" name="mbiemri" title="mbiemri" placeholder="Jepni mbiemrin" required/></td>
                </tr>
                  <tr>
                    <td><b>Fjalekalimi</b></td>
                   <td><input type="password" name="fjalekalim1" placeholder="Fusni fjalekalimin" required /></td>
                </tr>
                <tr>
                    <td><b>Ri-fut fjalekalim-in:</b></td>
                   <td><input type="password" name="fjalekalim2" placeholder="Ri-fusni fjalekalimin" required/></td>
                </tr>
                  <tr>
                    <td><b>Posta elektronike:</b></td>
                   <td><input type="email" name="posta" placeholder="perdorues@domain.com"  required /></td>
                </tr>
                  <tr>
                    <td><b>Adresa:</b></td>
                   <td><textarea cols="30" rows="5" name="adresa" required></textarea> </td>
                </tr>
               
                  <tr>
                    <td ><input type="submit" value="Regjistrohu" name="regjistrohu" /> <input type="reset" value="Anullo" name="anullo" /> </td>
                
                </tr>
            </table></div>
            </form>
            <?php
          if(isset($_POST['regjistrohu'])){
           $perdorues=$_POST['perdorues'];
           $emri=$_POST['emri'];
           $mbiemri=$_POST['mbiemri'];
            $posta=$_POST['posta'];
            $fjalekalim=$_POST['fjalekalim1'];
            $fjalekalim2=$_POST['fjalekalim2'];
            $adresa=$_POST['adresa'];
            if($fjalekalim==$fjalekalim2){
        $fjalekalim=md5($fjalekalim);
        $anketim1="SELECT * FROM klient WHERE perdorues='$perdorues'";
             $rezultati= mysqli_query($db,$anketim1);
             
            if (mysqli_num_rows($rezultati)==1) {
             echo "<script> alert('Ky emer perdoruesi eshte i zene')</script>";
    }
    
            else{ $anketim=" insert into klient (perdorues,emri,mbiemri,posta,fjalekalim,adresa) value ('$perdorues','$emri','$mbiemri','$posta','$fjalekalim','$adresa')";
             mysqli_query($db,$anketim);
             header("location:index.php");}
 
          
             }
            else{
               echo"<script> alert('Fjalekalimet nuk perputhen')</script>";}
               }

            ?>
     
            
        </div>
        </div>
    
</body>
</html>