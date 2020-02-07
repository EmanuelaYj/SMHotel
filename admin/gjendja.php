<?php
include("lidhja.php");
session_start();
if(!isset($_SESSION['admini'])) {
header("location:hyr.php");
}




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
                    <li> <a href="#"> Gjendja</a></li>
                    <li> <a href="#">Kerko</a></li>
                    <li> <a href="#"> Info </a></li>
                </ul>
            </div>
        </div>
		 <div id="ndarje">   
        <div style="height:30%"></div>
        <div style="background-color:rgba(255,255,255,.5);"><center> <form method="post" action="rezervo.php"><table id="table1">
             <tr>
                  <th>Emri</th>
                  <th>Mbiemri</th>
                  <th>Dhoma</th>
                  <th>Dita e check in</th>
                  <th>Dita e check out</th>
            
             </tr>
            
                 <?php
              $anketim="select * from klient Inner Join porosi on klient.ID=porosi.ID
            Inner Join dhoma on porosi.IDdhom=dhoma.IDdhom where status='Zene'";
             $rezultati=mysqli_query($db,$anketim);
               while($el=mysqli_fetch_array($rezultati)){
                 echo"
		 <tr>
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