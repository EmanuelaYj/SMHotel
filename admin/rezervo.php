<?php

include("lidhja.php");
session_start();
if(!isset($_SESSION['admini'])){
echo"<script>alert('Ju lutem logohuni!')</script>";
header("location:login.php");
}
$perdorues=$_SESSION['id_admin'];

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
					  <li> <a href="gjendja.php"> Gjendja  </a></li> 
                    <li> <a href="rezervo.php"> Rezervo</a></li>
                    <li> <a href="anullo.php"> Anullo</a></li>
                    <li> <a href="hyr.php"> Hyr</a></li>
                     <li> <a href="dilni.php">Dilni</a></li>
                    <li> <a href="#"> Info </a></li>
                     <li style="width:30%"> <form action="kerko.php" method="post">
                    <input  type="text" name="kerko" placeholder="kerko"> 
                    <input type="submit" name="kerkimi" value="Kerko"></form></li> 
                </ul>
            </div>
        </div>
		 <div id="ndarje">   
        <div style="height:30%"></div>
        <div style="background-color:rgba(255,255,255,.5);"><center> <table id="table2"> <form method="post" action="rezervo.php">
             <tr>
                 <th>Dhoma</th>
                  <th>Dita e check in</th>
                  <th>Dita e check out</th>
            
             </tr>  <tr><td> 
            <?php 
            echo" <select name='lloji'>";
				$anketim = "SELECT * FROM dhoma";
				$rez = mysqli_query($db, $anketim);
				if(mysqli_num_rows($rez) > 0)
				{
					while($el = mysqli_fetch_array($rez)){
					
                   echo"  <option value=".$el['IDdhom'].">". $el['llojdhome']."</option> "; }}
                   echo "</select>";
            ?>
                      </td>
                 <td> <input type="date"  name="hyrja" /></td>
                 <td><input type="date" name="dalja"/></td>
                 <td> <input type="submit" value="Rezervo" name="rezervo" /> </td>
                 <td> <input type="reset" value="Anullo" name="anullo" /></td>
                  
             </tr>
         </table> </form>
           <?php 
           
            if(isset($_POST['rezervo'])){
           $lloji=$_POST['lloji']; 
             $hyrja=$_POST['hyrja'];
              $dalja=$_POST['dalja'];
                if($dalja<$hyrja)
             echo "<script> alert('Ju lutem jepni datat e sakta te hyrjes dhe daljes!')</script>";
             else{
            $anketim1="SELECT * FROM dhoma where IDdhom='$lloji' and status='Lire'";
            $rez=mysqli_num_rows(mysqli_query($db,$anketim1));
            if($rez>0){
            $anketim2="insert into porosi (IDperdorues,IDdhom,hyrja,dalja) value ('$perdorues','$lloji','$hyrja','$dalja')";
            mysqli_query($db,$anketim2);
            $anketim3="update dhoma set Numri=Numri-1 where  IDdhom='$lloji'";
            mysqli_query($db,$anketim3);

           while($el=mysqli_fetch_assoc(mysqli_query($db,$anketim1))) {
              if( $el['Numri']==0){
              $anketim4="update dhoma set status='Zene' where IDdhom='".$el['IDdhom']."'";
              mysqli_query($db,$anketim4);
            }
            }
            }
            else{ 
            $anketim1="select * from klient Inner Join porosi on klient.ID=porosi.IDperdorues
            Inner Join dhoma on porosi.IDdhom=dhoma.IDdhom where ('$hyrja' not between porosi.hyrja and porosi.dalja) and ('$dalja' not between porosi.hyrja and porosi.dalja) and dhoma.IDdhom='$lloji'";
           $rez=mysqli_query($db,$anketim1);
             $rezultati=mysqli_num_rows($rez);

            if($rezultati>0){
             $anketim2="insert into porosi (IDperdorues,IDdhom,hyrja,dalja) value ('$perdorues','$lloji','$hyrja','$dalja')";
            mysqli_query($db,$anketim2);
            }
            else
             echo "<script> alert('Dhoma eshte e zene ne datat qe ju e kerkoni!')</script>";
         
                 }
             
            }
            }
            
         
              
           ?> 

