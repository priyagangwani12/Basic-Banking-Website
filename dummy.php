<html>
<head>
<title>Transaction</title>
<meta http-equiv = "refresh" content = "6; url = homepage.html" />
</head>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-light bg-light">  
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <img width="40px" height="40px" src="B.jpg">
            <li class="nav-item">
              <a class="nav-link" href="homepage.html"><b>Home</b> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="prac.php"><b>Users</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="transferrecord.php"><b>Transfer Record</b></a>
            </li>
            </li>
          </ul>
        </div>
      </nav>
<br>
<div id="text" name="text1" class="alert alert-success" role="alert">
  Transaction Successful!<br><br>
  Please wait...Redirecting you to home page...
</div>

<div id="text2" name="text2" class="alert alert-danger" role="alert">
  Transaction Cancelled due to Insufficient Balance!<br><br>
  Please wait...Redirecting you to home page...
</div>
<p id="message"></p>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script>
  $('#text').hide();
  $('#text2').hide();
  
 
  function pageRedirect(){
 var delay = 1000; // time in milliseconds

 // Display message
 document.getElementById("message").innerHTML = "Please wait, you are redirecting to the new page.";
 
 setTimeout(function(){
  window.location = "homepage.html";
 },delay);
 
}
</script>
</body>
</html>

<?php
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password,"users");
if(!$con){
    die("Connection failed");
} 


$flag=false;

if (isset($_POST['transfer']))
{
  $sender=$_POST["sender"];
$receiver=$_POST["reciever"];
$amount=$_POST["amount"];
$sql = "SELECT Money FROM bank WHERE Name='$sender'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 if($row["Money"]-$amount>100){
$sql = "UPDATE `bank` SET Money=(Money-$amount) WHERE Name='$sender'";

if ($con->query($sql) === TRUE) {
  $flag=true;
} else {
  echo "Error updating record: " . $conn->error;
}
 }
 else{
     echo "";
 }
  }
} else {
  echo "0 results";
} 

if($flag==true){
$sql = "UPDATE `bank` SET Money=(Money+$amount) WHERE Name='$receiver'";

if ($con->query($sql) === TRUE) {
  $flag=true;  
  
} else {
  echo "Error updating record: " . $con->error;
}
}
if($flag==true){
$sql = "INSERT INTO `transfer record` (`Transfer ID`, `Sender`, `Reciever`, `Amount`) VALUES (NULL, '$sender','$receiver','$amount')"; 
if ($con->query($sql) === TRUE) {
} else 
{
  echo "Error updating record: " . $con->error;
}
}
}
if($flag==true){
echo "<script>
$('#text').show();
     </script>";
}
elseif($flag==false)
{
    echo "<script>
        $('#text2').show()
     </script>";
}
?>