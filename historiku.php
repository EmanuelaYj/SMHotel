<?php


include("lidhja.php");
session_start();
if(!isset($_SESSION['perdorues'])) {
header("location:login.php");
}
$perdorues=$_SESSION['id_perdorues'];



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
                    <li> <a href="hyr.php"> Hyr</a></li>
                    <li> <a href="#"> Gjendja</a></li>
                   <li> <a href="dilni.php">Dilni</a></li>
                    <li> <a href="#"> Info </a></li>
                </ul>
            </div>
        </div>
		 <div id="ndarje">   
        <div style="height:30%"></div>
        <div style="background-color:rgba(255,255,255,.5);"><center> <form method="post" action="rezervo.php"><table id="table1">
             <tr>
                 <td>IDdhom</td>
                  <td>Emri</td>
                  <td>Mbiemri</td>
                  <td>Dhoma</td>
                  <td>Dita e check in</td>
                  <td>Dita e check out</td>
            
             </tr>
            
                 <?php
              $anketim="select * from klient Inner Join porosi on klient.ID=porosi.IDperdorues
            Inner Join dhoma on porosi.IDdhom=dhoma.IDdhom where porosi.IDperdorues='$perdorues'";
             $rezultati=mysqli_query($db,$anketim);
               while($el=mysqli_fetch_array($rezultati)){
                 echo"
		 <tr>
         <td>".$el['IDdhom']."</td>
         <td>".$el['emri']."</td>
		 <td>".$el['mbiemri']."</td>
		 <td>".$el['llojdhome']."</td>
          <td>".$el['hyrja']."</td>
		 <td>".$el['dalja']."</td>
  </tr>"; 
                 }

             ?>
             
         </table> </form>
             
             </center> </div></div> 
</div>
        
        
                
</body>
</html>
?>