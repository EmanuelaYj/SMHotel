<?php
include("lidhja.php");


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
                     <li> <a href="#"> Kryefaqja </a></li>
					  <li> <a href="#"> Historiku  </a></li> 
                    <li> <a href="rezervo.php"> Rezervo</a></li>
                    <li> <a href="#"> Anullo</a></li>
                    <li> <a href="logrregj.php"> Hyr/Rregjistrohu</a></li>
                    <li> <a href="#"> Gjendja</a></li>
                   <li> <a href="dilni.php">Dilni</a></li>
                    <li> <a href="#"> Info </a></li>
                </ul>
            </div>
        </div>
		 <div id="ndarje">
            <h2>Rregjistrohu!</h2>
            <div style="background-color:rgba(255,255,255,.5);">
            <form method="post" action="regjistrimi.php"> 
                <table id="tabela1">
                <tr>
                    <td> <b>Perdoruesi:</b></td>
                    <td>  <input type="text" name="perdorues" placeholder="Jepni perdoruesin" /></td>
                </tr>
                <tr>
                    <td><b>Emri</b>:</td>
                   <td> <input type="text" name="emri"  placeholder="Jepni emrin" /> </td>
                </tr>
                  <tr>
                    <td><b>Mbiemri:</b></td>
                   <td> <input type="text" name="mbiemri" title="mbiemri" placeholder="Jepni mbiemrin" /></td>
                </tr>
                  <tr>
                    <td><b>Fjalekalimi</b></td>
                   <td><input type="password" name="fjalekalim1" placeholder="Fusni fjalekalimin" /></td>
                </tr>
                <tr>
                    <td><b>Ri-fut fjalekalim-in:</b></td>
                   <td><input type="password" name="fjalekalim2" placeholder="Ri-fusni fjalekalimin" /></td>
                </tr>
                  <tr>
                    <td><b>Posta elektronike:</b></td>
                   <td><input type="email" name="posta" placeholder="perdorues@domain.com"  required /></td>
                </tr>
                  <tr>
                    <td><b>Adresa:</b></td>
                   <td><textarea cols="30" rows="5" name="adresa"></textarea> </td>
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
            $anketim=" insert into klient (perdorues,emri,mbiemri,posta,fjalekalim,adresa) value ('$perdorues','$emri','$mbiemri','$posta','$fjalekalim','$adresa')";
             mysqli_query($db,$anketim);
             header("location:index.php");
 
          
             }
            else{
               echo"Fjalekalimet nuk perputhen.";}
               }

            ?>
     
            
        </div>
        </div>
    
</body>
</html>