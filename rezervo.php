<?php
include("lidhja.php");
session_start();
if(!isset($_SESSION['perdorues'])){
echo"<script>alert('Ju lutem logohuni!')</script>";
header("location:login.php");
}

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
					  <li> <a href="#"> Historiku  </a></li> 
                    <li> <a href="rezervo.php"> Rezervo</a></li>
                    <li> <a href="anullo.php"> Anullo</a></li>
                    <li> <a href="logrregj.php"> Hyr/Rregjistrohu</a></li>
                    
                    <li> <a href="dilni.php">Dilni</a></li>
                    <li> <a href="#"> Info </a></li>
                </ul>
            </div>
        </div>
		 <div id="ndarje">   
        <div style="height:30%"></div>
        <div style="background-color:rgba(255,255,255,.5);"><center> <table id="table2"> <form method="post" action="rezervo.php">
             <tr>
                 <th>Dhoma</th>
                  <th>Dita e check in</th>
                  <th>Dita e check out</th>
            
             </tr>  <tr>
           
                <td> <select name="lloji">
                     <option value="Teke">Dhome teke</option>
                     <option value="Cift">Dhome cift</option>
                     <option value="Familjare">Dhome familjare</option>
                     <option value="Suita">Suita</option></select> </td>
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
            $kontrollo="SELECT * FROM dhoma where llojdhome='$lloji' and hyrja = '$hyrja' and dalja='$dalja'";
			$sql1 = mysqli_query($db,$kontrollo);
										
			if(mysqli_num_rows($sql1)>1) //kam dy dhoma te secilit lloj
            {
											echo "<script type='text/javascript'> alert('Dhoma eshte e zene.')</script>";}
          else  {
             $anketim="insert into dhoma (llojdhome,hyrja,dalja) value ('$lloji','$hyrja','$dalja')";
            
               if(mysqli_query($db,$anketim)){
               $sql="update Dhoma  set status='Zene' where llojdhome='$lloji' and hyrja='$hyrja' and dalja='$dalja' ";
               mysqli_query($db,$sql);
             
         $anketim1="SELECT * FROM dhoma where llojdhome='$lloji' and hyrja = '$hyrja' and dalja='$dalja'";
             $rezultati= mysqli_query($db,$anketim1);
             
            if (mysqli_num_rows($rezultati)==1){
            
           while( $el=mysqli_fetch_assoc($rezultati)){
             $id=$el['IDdhom'];
                } 
          
           $_SESSION['id_dhome']=$id;
             header("location:kldhome.php");
            }
            }
              
            }
           
               
            }
            }

             ?>
             </center> </div></div> 
</div>
        
        
                
</body>
</html>