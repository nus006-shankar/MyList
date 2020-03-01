<?php
$edit_item="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
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
 
  <div>
      <table  width=100%>
          <tr>
              <td><button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#addModal">Add to the List</button></td>
              <td align="right"><a href="printtable.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-print"></span> Print Table</a>
              </td>
          </tr></table>
  </div> 
  <?php 
    if($_GET['msg']=="added")
    {
     echo '  <div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Item added!</strong>
  </div>';   
    }
    
     if($_GET['msg']=="updated")
    {
     echo '  <div class="alert alert-success alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Item updated!</strong>
  </div>';   
    }
    
    if($_GET['msg']=="duplicate")
    {
     echo '<div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Duplicate Names are not accepted.Please Try Again!</strong></div>';   
    }
    
    if($_GET['msg']=="removed")
    {
     echo '<div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Item removed!</strong></div>';   
    }
    ?>
  <table class="table" border=2>
      <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th colspan="2" style="text-align:center">Operations</th>
        </tr>
     </thead>
     <tbody>
         <!-- #################Table creation########################################-->
        <?php
                include 'connect.php';
                $sql = 'SELECT * FROM test;';
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) == 0) {
                    echo '<tr><td colspan="3" align="center" bgcolor="#f2f2f2">No Data to display!</td></tr>';
                }
            else{
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<tr><td>'.$row['Name'].'</td><td>'.$row['Description'].'</td><td align="center"><a href="remove.php?name='.$row['Name']. '" class="btn btn-danger btn-sm">Remove</a></td><td><a href="edit.php?name='.$row['Name']. '&desc='.$row['Description'].'" class="btn btn-success btn-sm">Edit</a></td></tr>';
                }
            }
                mysqli_close($conn);
                ?>
     </tbody>
  </table>
          <!-- #################Add Modal content#########################################################-->
<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add to List:</h4>
        </div>
        <div class="modal-body">
            <form role="form" method="get" action="save.php">
              <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" name="name" required>
              </div>
              <div class="form-group">
                  <label for="comment">Comment:</label>
                  <textarea class="form-control" rows="5" name="description" required></textarea>
              </div>
              <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
          
        <div class="modal-footer">
          
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
        </div>
</div>
 </div>
        
</body>
</html>
