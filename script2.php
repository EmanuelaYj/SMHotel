<?php 
session_start();
include("lidhja.php");
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
				'cmim_dhome'		=>	$_POST["cmimi_fshehur"],
				'hyrje_dhome'		        =>	$_POST["hyrja"],
                'dalje_dhome'		        =>	$_POST["dalja"]
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
				'cmim_dhome'		=>	$_POST["cmimi_fshehur"],
				'hyrja'		        =>	$_POST["hyrja"],
                'dalja'		        =>	$_POST["dalja"]
			);
			$_SESSION["shporta"][0] = $dhoma;
	}
}


?>