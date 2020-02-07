<?php
include("lidhja.php");
session_start();
if(isset($_POST["rezervo"]))
{
	if(isset($_SESSION["shporta"]))
	{
		$dhoma_id = array_column($_SESSION["shporta"], "id_dhome");
		if(!in_array($_GET["id"], $dhoma_id))
		{
			$num = count($_SESSION["shporta"]);
			$dhoma = array(
				'id_dhome'			=>	$_GET["id"],
				'lloj_dhome'		=>	$_POST["lloji_fshehur"],
				'cmim_dhome'		=>	$_POST["cmim_fshehur"],
				'hyrje_dhome'		 =>	$_POST["hyrja"],
               'dalje_dhome'		 =>	$_POST["dalja"]
			);
			$_SESSION["shporta"][$num] = $dhoma;
		}
		else
		{
			echo '<script>alert("Dhoma eshte rezervuar")</script>';
		}
	}
	else
	{
		$dhoma = array(
				'id_dhome'			=>	$_GET["id"],
				'lloj_dhome'		=>	$_POST["lloji_fshehur"],
				'cmim_dhome'		=>	$_POST["cmim_fshehur"],
				'hyrje_dhome'		        =>	$_POST["hyrja"],
               'dalje_dhome'		        =>	$_POST["dalja"]
			);
			$_SESSION["shporta"][0] = $dhoma;
	}
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
                     <li> <a href="#"> Kryefaqja </a></li>
					  <li> <a href="#"> Historiku  </a></li> 
                    <li> <a href="rezervo.php"> Rezervo</a></li>
                    <li> <a href="anullo.php"> Anullo</a></li>
                    <li> <a href="logrregj.php"> Hyr/Rregjistrohu</a></li>
                    <li> <a href="#"> Gjendja</a></li>
                    <li> <a href="dilni.php">Dilni</a></li>
                    <li> <a href="#"> Info </a></li>
                </ul>
            </div>
        </div>
		 <div   id="ndarje">   
        
        
            <?php
				$sql = "SELECT * FROM dhoma";
				$rezultat = mysqli_query($db, $sql);
				if(mysqli_num_rows($rezultat) > 0)
				{
					while($el = mysqli_fetch_assoc($rezultat))
					{ ?> 
            <form method="post" action="script1.php?action=add&id=<?php echo $el["IDdhom"]; ?>"> <center>
			      <h4 style="background-color:grey" width=20%"><?php echo $el["llojdhome"]; ?> <?php echo $el["Cmimi"]; ?></h4>

               <input type="date"  name="hyrja" />
                 <input type="date" name="dalja"/>
				<input type="hidden" name="lloji_fshehur" value="<?php echo $el["llojdhome"]; ?>" />
                	<input type="hidden" name="cmim_fshehur" value="<?php echo $el["Cmimi"]; ?>" />
                 	<input type="hidden" name="hyrja_fshehur" value="<?php echo $el["hyrja"]; ?>" />
                <input type="hidden" name="hyrja_fshehur" value="<?php echo $el["dalja"]; ?>" />
                <input type="submit" value="Rezervo" name="rezervo" /> 
                 <input type="reset" value="Anullo" name="anullo" />
                  </center>
             </form>
            
			<?php
					}
				}
			?>
        

             <?php
            /* if(isset($_POST['rezervo'])){
             $hyrja=$_POST['hyrja'];
              $dalja=$_POST['dalja'];
               $lloji=$_POST['lloji']; 
            if($dalja<$hyrja)
             echo "<script> alert('Ju lutem jepni datat e sakta te hyrjes dhe daljes!')</script>";

            $kontrollo="SELECT * FROM dhoma WHERE llojdhome = '$lloji' AND hyrja = '$hyrja' and dalja='$dalja'";
			$sql1 = mysqli_query($db,$kontrollo);
										
			if(mysqli_num_rows($sql1)>1) //kam dy dhoma te secilit lloj
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

             */?>
          <div >
				<table >
					<tr>
						<th >LLoj Dhome</th>
						<th >Cmimi</th>
						
						
					</tr>
					<?php
					if(!empty($_SESSION["shporta"]))
					{
						
						foreach($_SESSION["shporta"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["lloj_dhome"]; ?></td>
						<td>$<?php echo $values["cmim_dhome"]; ?></td>
						
			
					
					</tr>
					<?php
							
						}
					?>
					
					<?php
					}
					?>
						
				</table>
			</div>
        
        
                
</body>
</html>