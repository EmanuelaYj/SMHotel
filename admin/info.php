<?php

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
					  <li> <a href="gjendja.php"> Gjendja </a></li> 
                    
                 
                    <?php if(!isset($_SESSION['admini'])){ ?>  <li> <a href="hyr.php"> Hyr</a></li> <?php } ?>
             
              <li class="aktive"> <a href="info.php"> Info </a></li>
                 <?php if(isset($_SESSION['admini'])){ ?>    <li> <a href="dilni.php">Dilni</a></li>  <?php } ?>
                    
                     <li> <form action="kerko.php" method="post">
                    <input  type="text" name="kerko" placeholder="kerko"> 
                    <input type="submit" name="kerkimi" value="Kerko"></form></li>
                 
                </ul> </div>
         <div id="fotot" >
 <div id="nje"> <img src="img/1.jpg" width="100%" />
     <center><h2>Dhoma teke!</h2>
         <p> <font size="3"><b>Kjo dhome mund te rezervohet per nje person </br> te vetem. Cmimi i saj eshte 20 euro/nata.</b></font></p></center></div>
      <div id="dy"> <img src="img/2.jpg" width="100%" />
     <center><h2>Dhoma cift!</h2>
          <p> <font size="3"><b>Kjo dhome mund te rezervohet nga nje </br> ose dy persona. Cmimi i saj eshte 40 euro/nata.</b></font></p</center></div>
      <div id="tre"><img src="img/3.jpg" width="100%" />
     <center><h2>Dhoma familjare!</h2>
        <p> <font size="3"><b>Kjo dhome mund te rezervohet per 2-7 persona. Cmimi i saj eshte 80 euro/nata.</b></font></p  </center></div>
      <div id="kater"> <img src="img/4.jpg" width="100%" />
     <center><h2>Suita!</h2>
          <p> <font size="3"><b>Kjo dhome mund te rezervohet per 1-2 persona. Cmimi i saj eshte 100 euro/nata.</b></font></p</center></div>
 </div>
 </header>