<?php 
include("lidhja.php");

session_start();

?> 

<html> 
<title>SISTEM MENAXHIMI HOTELI </title>
 <link rel="stylesheet" type="text/css" href="css/style.css"/>

</head>
<body>
    <header> 
       <div id="hyrje">
          
                <ul>
                     <li class="aktive"> <a href="index.php"> Kryefaqja </a></li>
					  <li> <a href="gjendja.php"> Gjendja </a></li> 
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
      <h1>SISTEM MENAXHIMI HOTELI </h1>  </br> </br>
    <span id="pershkrim">
        Ky sistem sherben per te kryer rezervim online ne nje hotel specifik. 
    Ky produkt u nejvoitet hoteleve,qe te kene mundesi per te paraqitur  gjendjen ne hotel, 
      si edhe per klientet qe do kene mundesi te rezervojne dhoma online kur te duan.

    </span></div>
        <div class="shume">
            <a class="buton" href="info.php">Me shume mbi dhomat tona</a>

        </div>

 </header></body> </html>



          
    
