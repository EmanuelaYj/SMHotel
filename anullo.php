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
                    <li> <a href="#">Kerko</a></li>
                    <li> <a href="#"> Info </a></li>
                </ul>
            </div>
        </div>
		 <div id="ndarje">
            <div style="height:30%"> Zgjidhni rezervimin qe doni te anulloni: </div>
        <div style="background-color:rgba(255,255,255,.5);"><center> <form method="post" action="anullo.php"><table id="table2">
             <tr>
                 <th> Jepni dhomen</th>
                  <th>Diten e hyrjes</th>
                  <th>Diten e daljes</th>
            
             </tr>
             <tr>
                 <td><select name="lloji">
            <option>Dhome teke</option>
            <option>Dhome cifte</option>
            <option>Dhome familjare</option>
            <option>Suite</option> </select></td>
                 <td> <input type="date"  name="hyrja" /></td>
                 <td><input type="date" name="dalja"/></td>
                 
                 <td> <input type="submit" value="Anullo" name="anullo" /></td>
                  
             </tr>
         </table> </form>
             <?php
             if(isset($_POST['anullo'])){
             $hyrja=$_POST['hyrja'];
              $dalja=$_POST['dalja'];
               $lloji=$_POST['lloji'];
              if($dalja>$hyrja){
            $anketim1="delete from dhoma where llojdhome='$lloji' and hyrja='$hyrja' and dalja='$dalja'";
              mysqli_query($db,$anketim1);
            }
            else echo"Ju lutem jepni datat e sakta te hyrjes dhe daljes!";
               
              
            }

             ?>
         </div>
    </div>


</body> </html>

</html>