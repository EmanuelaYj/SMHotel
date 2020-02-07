<?php
include("lidhja.php");
session_start();
if(!isset($_SESSION['admini'])){
 echo "<script> alert('Ju lutem logohuni') </script>";
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
                    <li> <a href="hyr">HYR</a></li>
                    <li> <a href="gjendja.php"> Gjendja</a></li>
                    <li> <a href="#">Kerko</a></li>
                    <li> <a href="dilni.php"> Dilni</a></li>
                </ul>
            </div>
        </div>
		 <div id="ndarje">   
        <div style="height:30%"></div>
        <div style="background-color:rgba(255,255,255,.5);"><center> <form method="post" action="rezervo.php"><table id="table2">
             <tr>
                 <th>Dhoma</th>
                  <th>Dita e check in</th>
                  <th>Dita e check out</th>
            
             </tr>
             <tr>
                 <td><select name="lloji">
            <option>Dhome teke</option>
            <option>Dhome cifte</option>
            <option>Dhome familjare</option>
            <option>Suite</option> </select></td>
                 <td> <input type="date"  name="hyrja" /></td>
                 <td><input type="date" name="dalja"/></td>
                 <td> <input type="submit" value="Rezervo" name="rezervo" /> </td>
                 <td> <input type="reset" value="Anullo" name="anullo" /></td>
                  
             </tr>
         </table> </form>
             <?php
             if(isset($_POST['rezervo'])){
             $hyrja=$_POST['hyrja'];
              $dalja=$_POST['dalja'];
               $lloji=$_POST['lloji'];
            if($dalja<$hyrja)
             echo "<script> alert('Ju lutem jepni datat e sakta te hyrjes dhe daljes!')</script>";

            $kontrollo="SELECT * FROM dhoma WHERE llojdhome = '$lloji' AND hyrja = '$hyrja' and dalja='$dalja' and status='Zene'";
			$sql = mysqli_query($db,$kontrollo);
										
			if(mysqli_num_rows($sql)>1) //kam dy dhoma te secilit lloj
            {
											echo "<script type='text/javascript'> alert('Dhoma eshte e zene.')</script>";}
          else  {
             $anketim="insert into dhoma (llojdhome,hyrja,dalja) value ('$lloji','$hyrja','$dalja')";
               if(mysqli_query($db,$anketim)){
               $sql="update Dhoma  set status='Zene' where llojdhome='$lloji' and hyrja='$hyrja' and dalja='$dalja' ";
               mysqli_query($db,$sql);
             header("location:index.php");
            }

              
            }
           
               
            }

             ?>
             </center> </div></div> 
</div>
        
        
                
</body>
</html>