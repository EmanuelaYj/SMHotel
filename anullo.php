<?php
include("lidhja.php");
session_start();
if(!isset($_SESSION['perdorues'])) {
header("location:hyr.php");
}

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
                    <li> <a href=" class="aktive"> Anullo</a></li>
                    <li> <a href="hyr.php"> Hyr</a></li>
             <li> <a href="regjistrimi.php"> Rregjistrohu</a></li>
              <li> <a href="info.php"> Info </a></li>
                  <li> <a href="dilni.php">Dilni</a></li>
                 
                </ul> </div>
<div class="titulli">
            <div style="height:30%"> <h2 style="color:yellow">Zgjidhni rezervimin qe doni te anulloni:</h2> </br></div>
       <div style="background-color:rgba(255,255,255,.5);"><center> <table id="tabela1"> <form method="post" action="anullo.php">
             <tr>
                 <th>Dhoma</th>
                  <th>Dita e check in</th>
                  <th>Dita e check out</th>
            
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
                 <td> <input type="submit" value="Anullo" name="anullo" /> </td>
                
                  
             </tr>
         </table> </form>
             <?php
             if(isset($_POST['anullo'])){
             $hyrja=$_POST['hyrja'];
              $dalja=$_POST['dalja'];
               $lloji=$_POST['lloji'];
               $id=$_SESSION['id_perdorues'];
              if($dalja>$hyrja){
               $data=date("Y-m-d");
              echo"</br> <h2> </h2> ";
            $anketim1="delete from porosi where hyrja='$hyrja' and dalja='$dalja' and  dalja > '$data' and IDperdorues='$id' and IDdhom='$lloji'";

             if( mysqli_query($db,$anketim1)){
             
             $anketim="update dhoma set  Numri=Numri+1 where IDdhom='$lloji' ";
               mysqli_query($db,$anketim);
                $anketim4="SELECT * FROM dhoma where IDdhom='$lloji'";
            while($el=mysqli_fetch_assoc(mysqli_query($db,$anketim4))) {
              if( $el['Numri']>2){
              $anketim5="update dhoma set Numri=Numri-1 ";
              mysqli_query($db,$anketim5);
            }
           }
           
              
            }
            else echo"Ju nuk keni nje rezervim qe mund te anulloni";
               
              
            } }

             ?>
         </div>
    </div>


</body> </html>

</html>