<?php
include("lidhja.php");
session_start();
if(!isset($_SESSION['admini'])) {
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
                     <li> <a href="index.php"> Kryefaqja </a></li>
					  <li   class="aktive"> <a href="gjendja.php"> Gjendja </a></li> 
                    <li> <a href="rezervo.php"> Rezervo</a></li>
                    <li> <a href="anullo.php"> Anullo</a></li>
                    <li> <a href="hyr.php"> Hyr</a></li>
            
              <li> <a href="info.php"> Info </a></li>
                  <li> <a href="dilni.php">Dilni</a></li>
                     <li> <form action="kerko.php" method="post">
                    <input  type="text" name="kerko" placeholder="kerko"> 
                    <input type="submit" name="kerkimi" value="Kerko"></form></li> 
                 
                </ul> </div>
<div class="titulli">
        <div style="height:10%"></div>
        <div style="background-color:rgba(255,255,255,.5);"><center><table id="tabela1" >
            <tr>
                <th style="color:red" colspan="5"> Dhomat </th>
            </tr>
             <tr>
                 <th>Id e dhomes</th>
                  <th>LLoji i dhomes</th>
                  <th>Numri i dhomave/lloj</th>
                  <th>Satusi</th>
                  <th>Cmimi i dhomes</th>
                  
            
             </tr>
            
                 <?php
            
              $anketim="select * from dhoma";
             $rezultati=mysqli_query($db,$anketim);
               while($el=mysqli_fetch_array($rezultati)){
                 echo"
		 <tr>
         <td>".$el['IDdhom']."</td>
         <td>".$el['llojdhome']."</td>
		 <td>".$el['Numri']."</td>
		 <td>".$el['Status']."</td>
          <td>".$el['Cmimi']."</td>
		
  </tr>"; 
                 }

               ?>
         
             
         </table> 
            </br> </br>
           <table id="tabela1">
            <tr>
                <th style="color:red" colspan="5"> Dhomat e zena:</th>
            </tr>
             <tr>
                  <th>Id e dhomes:</th>
                  <th>LLoji i dhomes</th>
                  <th>Klienti qe e ka zene:</th>
                  <th>Data e hyrjes:</th>
                  <th>Data e daljes:</th>
                  
            
             </tr>
            
                 <?php
             $data=date("Y-m-d");
              echo"</br> <h2> </h2> ";
               $anketim2="select * from klient  Inner Join porosi on klient.ID=porosi.IDperdorues
            Inner Join dhoma on porosi.IDdhom=dhoma.IDdhom where porosi.dalja > '$data'";
             $rezultat2=mysqli_query($db,$anketim2);
             while($el=mysqli_fetch_array($rezultat2)){
                 echo"
		 <tr>
         <td>".$el['IDdhom']."</td>
         <td>".$el['llojdhome']."</td>
		 <td>".$el['perdorues']."</td>
		 <td>".$el['hyrja']."</td>
          <td>".$el['dalja']."</td>
		
  </tr>"; 
                 }

               ?>
          
             
          </table>   </center> </div></div> 
</div>
        
        
                
</body>
</html>