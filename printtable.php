
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Print Table</title>
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
 <table class="table table-striped table-hover" border="3">
      <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
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
                    echo '<tr><td>'.$row['Name'].'</td><td>'.$row['Description'].'</td></tr>';
                }
            }
                mysqli_close($conn);
                ?>
             
        
     </tbody>
    </table>
    <a href="index.php" class="btn btn-info btn-sm">Return to Home</a>
    </div>
    </body>
</html>