<?php
include 'connect.php';
if($_SERVER['REQUEST_METHOD'] == "GET")
{
	
	$name=$_GET['name'];
    $desc=$_GET['desc'];
	$_GET['key']=$name;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Table</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        h1{
            background-color: #FDDB27FF;
        }
    </style>
</head>
<body>

<div class="container">
    
  <h1 align="center">Welcome to My List</h1>
          <div class="edit">
            <form role="form" method="get" action="update.php">
              <div class="form-group">
                  <?php echo '<h3>Update the fields for :</h3><input type="text" name="key" value="'.$name.'"  readonly>'; ?>
              </div>
              <div class="form-group">
                  <label for="name">Name:</label>
                  <?php      
                  
                    echo '<input type="text" class="form-control" name="name" value='.$name.'>';
                  ?>
            </div>
                
              <div class="form-group">
                  <label for="comment">Comment:</label>
                  <textarea class="form-control" rows="5" name="desc">
                  <?php
                      echo $row['desc'];
                  ?>
                  </textarea>
              </div>
              <button type="submit" class="btn btn-success btn-sm">Update</button>
              <a href="index.php" class="btn btn-danger btn-sm">Cancel</a>
            </form>
        </div>
    </div>
    </body>
</html>