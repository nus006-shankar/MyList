<?php
include 'connect.php';
if($_SERVER['REQUEST_METHOD'] == "GET")
{
	
	$name=$_GET['name'];
	
}
$sql = 'DELETE FROM test WHERE Name="'.$name.'"';

if (mysqli_multi_query($conn, $sql) or mysqli_error()) 
	{
		

    
    
			header("Location: /mlist2/index.php?msg=removed");
			exit();
    }
 else 
	{
  			header("Location: /mlist2/failed.html");
			exit();
	}

mysqli_close($conn);
?>
