<?php
session_start();
$user_email = $_SESSION['email'];

$servername = "localhost";
$username = "root";//sql username
$password = "";//sql password
$dbname = "web";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

?>
<!DOCTYPE html>
<html>
<head>
<style>
body {margin:0;}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}


img
{
	padding-top: 2px
}
</style>
</head>
<body>

<ul>
	<li> <img src="logo.jpeg" width="100" height="100" ></li>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="signup.php">sign up</a></li>
  <li><a href="aboutus.html">log out</a></li>
  <li style="float:right"><a  href="#about">About</a></li>
</ul>
<br><br><br>

 <?php
                         $sql = "SELECT * FROM product";
                                 $result = mysqli_query($conn, $sql);
                          
                                 if (mysqli_num_rows($result) > 0) {
                                   // output data of each row
                                   while($row = mysqli_fetch_assoc($result)) {
                                  include 'des.html';
                                 // header( "refresh:2;url=index.php" );
                                    // echo "c-name: " . $row['c_name']. " - city: " . $row['city']. "<br>";
                                                                              }
                                 } else {
                                   echo "0 results";
                                        }
                      ?>
 

</body>
</html>
