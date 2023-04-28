<?php
ob_start();
session_start();
	
if(!isset($_SESSION["intLine"]))
{

	 $_SESSION["intLine"] = 0;
	 $_SESSION["ProID"][0] = $_GET["id"];
	
	// alert ($_SESSION["ProID"]);
	// exit();

     header("Location:../Faculty/index.php?menu=Date_test");
    
}
else
{
	
	$key = array_search($_GET["id"], $_SESSION["ProID"]);
	
	if((string)$key != "")
	{
	
	}
	else
	{
		
		 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
		 $intNewLine = $_SESSION["intLine"];
		 $_SESSION["ProID"][$intNewLine] = $_GET["id"];
		
	}
	
	 header("location:../Faculty/index.php?menu=Date_test");

}
?>