<?php
include 'connect.php';
if($_SERVER['REQUEST_METHOD'] == "GET")
{
	
	$name=$_GET['name'];
	$description=$_GET['description'];
    $sql = 'Select Name from test where Name="'.$name.'";';
    $result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0)
    {
        header("Location: /mlist2/index.php?msg=duplicate");
        exit();
    }
	else{

$sql = "INSERT INTO test VALUES('".$name."','".$description."');";

if (mysqli_multi_query($conn, $sql) or mysqli_error()) 
	{
		

    
    
			header("Location: /mlist2/index.php?msg=added");
			exit();
    }
 else 
	{
  			header("Location: /MyList/failed.html");
			exit();
	}


}
}
mysqli_close($conn);
?>
