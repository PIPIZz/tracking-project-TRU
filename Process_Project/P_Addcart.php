<?php
ob_start();
session_start();
	
if(!isset($_SESSION["intLine"]))
{

	 $_SESSION["intLine"] = 0;
	 $_SESSION["StuID"][0] = $_GET["id"];

     header("Location:../students/index.php?menu=Project");
    
}
else
{
	
	$key = array_search($_GET["id"], $_SESSION["StuID"]);
	
	if((string)$key != "")
	{
	
	}
	else
	{	
		 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
		 $intNewLine = $_SESSION["intLine"];
		 $_SESSION["StuID"][$intNewLine] = $_GET["id"];	
	}
	
	 header("location:../students/index.php?menu=Project");

}
?>