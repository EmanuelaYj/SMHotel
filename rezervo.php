<?php

include("lidhja.php");
session_start();
if(!isset($_SESSION['perdorues'])){
echo"<script>alert('Ju lutem logohuni!')</script>";
header("location:hyr.php");
}
$perdorues=$_SESSION['id_perdorues'];

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
                    <li class="aktive"> <a href="rezervo.php"> Rezervo</a></li>
                    <li> <a href="anullo.php"> Anullo</a></li>
                    <li> <a href="hyr.php"> Hyr</a></li>
             <li> <a href="regjistrimi.php"> Rregjistrohu</a></li>
              <li> <a href="info.php"> Info </a></li>
                  <li> <a href="dilni.php">Dilni</a></li>
                 
                </ul> </div>
<div class="titulli">
        <div style="height:30%"></div>
        <div style="background-color:rgba(255,255,255,.5);"><center> <table id="tabela1"> <form method="post" action="rezervo.php">
             <tr>
                 <th>Dhoma</th>
                  <th>Dita e hyrjes</th>
                  <th>Dita e daljes</th>
            
             </tr>  <tr><td> 
            <?php 
            echo" <select name='lloji' id='selekto'>";
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
            $rezultati1=mysqli_query($db,$anketim1);
            $rez=mysqli_num_rows($rezultati1);
            if($rez>0){
            $anketim2="insert into porosi (IDperdorues,IDdhom,hyrja,dalja) value ('$perdorues','$lloji','$hyrja','$dalja')";
            mysqli_query($db,$anketim2);
            $anketim3="update dhoma  set  Numri=Numri-1 where IDdhom='$lloji' ";
              mysqli_query($db,$anketim3);
               $anketim4="SELECT * FROM dhoma where IDdhom='$lloji'";
            while($el=mysqli_fetch_assoc(mysqli_query($db,$anketim4))) {
              if( $el['Numri']==0){
              $anketim5="update dhoma set status='Zene' where IDdhom='$lloji'";
              mysqli_query($db,$anketim5);
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

