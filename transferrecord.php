<?php
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

    <title>Transfer Record</title>
    
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">      
          <ul class="navbar-nav mr-auto">
            <img width="40px" height="40px" src="B.jpg">
            <li class="nav-item">
              <a class="nav-link" href="homepage.html"><b>Home</b> </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="prac.php"><b>Users</b></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="transferrecord.php"><b>Transfer Record</b><span class="sr-only">(current)</span></a>
            </li>
          </ul>
    </nav>
    <h3 style="text-align:center;height:200px;color:gray;font-size:35px;padding-top:80px">Transfer History</h3>
    <form action="view.php" method="POST">
    <table class="table table-hover">
          <tr>
            <th>Transfer ID</th>
            <th>Sender</th>
            <th>Reciever</th>
            <th>Amount Transfered</th> 
          </tr>
          <?php
          
          $result=mysqli_query($con,"SELECT * FROM `transfer record`");
           while($row=mysqli_fetch_array($result))
           {
             echo "<tr>";
             echo "<td name='ID'>".$row['Transfer ID']."</td>";
             echo "<td>".$row['Sender']."</td>";
             echo "<td>".$row['Reciever']."</td>";
             echo "<td>".$row['Amount']."</td>";
             echo "</tr>";
           }         
          ?>
          
</table>
          </form>