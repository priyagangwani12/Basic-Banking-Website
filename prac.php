<?php
session_start();
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"users");
if(!$con){
    die("Connection failed");
}
?>
  
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Users</title>
    
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">      
          <ul class="navbar-nav mr-auto">
            <img width="40px" height="40px" src="B.jpg">
            <li class="nav-item">
              <a class="nav-link" href="homepage.html"><b>Home</b> </a>
            </li>
            <li class="nav-item  active">
              <a class="nav-link" href="#"><b>Users</b><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="transferrecord.php"><b>Transfer Record</b></a>
            </li>
          </ul>
        
    </nav>
    <br><br>
    <form action="view.php" method="POST">
    <h3 style="text-align:center;height:100px;color:gray;font-size:35px;padding-top:20px">View Details</h3>
    <h6 style="text-align:center;color:gray">
    Select User to view details:
  <select name="user" id="user" required>
    <option>--Select User--</option>
<?php
$db = mysqli_connect("localhost", "root", "", "users");
$res = mysqli_query($db, "SELECT * FROM bank");
while($row = mysqli_fetch_array($res)) {
    echo("<option> ".$row['Name']."</option>");
}
?>
</select>
</h6>

<br><br>
<div style="text-align:center">
<button href="view.php" id="submit" name="submit" class="btn btn-outline-secondary"><b>View User Details</b></button>
</div>
</form>
    <h3 style="text-align:center;height:200px;color:gray;font-size:35px;padding-top:80px">List of Users</h3>
    <table class="table table-hover">
          <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Balance</th>
          </tr>
          <?php
          
          $result=mysqli_query($con,"SELECT * FROM bank");
           while($row=mysqli_fetch_array($result))
           {
             echo "<tr>";
             echo "<td id='ID' name='ID' class='nr'>".$row['User ID']."</td>";
             echo "<td>".$row['Name']."</td>";
             echo "<td>".$row['Email ID']."</td>";
             echo "<td>".$row['Money']."</td>";
             echo "</tr>";
           }         
          ?>
          
</table>
          </body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
</script>
</html>