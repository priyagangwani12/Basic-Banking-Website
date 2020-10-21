<?php
//session_start();
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="prac.php"> -->
    <title>View and Transfer!</title>
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
      <form action="dummy.php" method="POST">
      <div class="container">
  <div class="row">
  <div class="col-sm-6">
    <div class="card border-secondary mb-3" style="height:400px">
      <div style="font-size:20px;color:gray" class="card-body">
        <h4 class="card-title">User Details</h4>
        <br>
        <?php
        if (isset($_POST['submit']))
        {
          $user=$_POST['user'];
          $result=mysqli_query($con,"SELECT * FROM bank WHERE Name='$user'");
          while($row=mysqli_fetch_array($result))
          {
            echo "<p><b>User ID</b> : ".$row['User ID']."</p><br>";
            echo "<p name='sender'><b>Name</b> : ".$row['Name']."</p><br>";
            echo "<p><b>Email ID</b> : ".$row['Email ID']."</p><br>";
            echo "<p><b>Balance</b> : ".$row['Money']."</p>";
          }         
        }
      ?>
      </div>
    </div>
  </div>
  <br><br>
  <div class="col-sm-6">
    <div class="card border-secondary mb-3" style="font-size:20px;height:400px;color:gray">
      <div class="card-body">
      
        <h4 class="card-title">Transfer Money</h4><br>
        Sender : <input type="text" name="sender" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo "$user";?>">

        <br>
        Select Reciever:
  <select name="reciever" id="dropdown" required>
    <option>--Select Reciever--</option>
<?php
$db = mysqli_connect("localhost", "root", "", "users");
$res = mysqli_query($db, "SELECT * FROM bank WHERE Name!='$user'");
while($row = mysqli_fetch_array($res)) {
    echo("<option> "."  ".$row['Name']."</option>");
}
?>
</select>
<br><br>
        Amount to be transferred :
        <input name="amount" type="number" required>
        <br><br>
        <button id="transfer"  name="transfer" class="btn btn-outline-secondary"><b>Transfer</b></button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<br><br>

  


</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</html>
