<?php
include 'connect.php';
if($_SERVER['REQUEST_METHOD'] == "GET")
{
    $key=$_GET['key'];
    $name=$_GET['name'];
    $desc=$_GET['desc'];
	
}
$sql = 'UPDATE test SET Name="'.$name.'", Description="'.$desc.'" WHERE Name="'.$key.'";';
//$sql = 'Update test SET Name="Orange",Description="Juice" where Name="Cow"';
if (mysqli_multi_query($conn, $sql) or mysqli_error()) 
	{
			header("Location: /mlist2/index.php?msg=updated");
			exit();
    }
 else 
	{
  			header("Location: /mlist2/failed.html");
			exit();
	}

mysqli_close($conn);
?>
