<?php


include("lidhja.php");
session_start();
if(!isset($_SESSION['perdorues'])) {
header("location:login.php");
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
					  <li class="aktive"> <a href="historiku.php"> Historiku  </a></liclass="aktive"> 
                    <li> <a href="rezervo.php"> Rezervo</a></li>
                    <li> <a href="#"> Anullo</a></li>
                    <li> <a href="login.php"> Hyr</a></li>
             <li> <a href="rregjistrohu.php"> Rregjistrohu</a></li>
              <li> <a href="info.php"> Info </a></li>
                  <li> <a href="dilni.php">Dilni</a></li>
                 
                </ul> </div>
<div class="titulli">
        
        <div style="background-color:rgba(255,255,255,.5);"><center> <form method="post" action="rezervo.php"><table id="tabela1"> <tbody>
             <tr>
                 <th>IDdhom</th>
                  <th>Emri</th>
                  <th>Mbiemri</th>
                  <th>Dhoma</th>
                  <th>Dita e hyrjes</th>
                  <th>Dita e daljes</th>
            
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
       </tbody>      
         </table> </form>
             
             </center> </div></div> 

        
        
                
</body>
</html>
?>