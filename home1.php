<!--
 * Author : Rohit Shakya
 * Date   : June-2020
 * Editor : Sublime text
 * Local server: Xampp
 * Title : Blog posting site featuring with Weather and News report  
 * Version: v5.3
 -->
 <?php
  session_start();
  if(!isset($_POST['submit']))
  {
  	header('Location:home1.html');
  }
  $_SESSION['start'] = time();
  $_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;
  $_SESSION['msg']=""; //session exist for 5 minutes 
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>HomePage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" >
  <meta name="author" content="Rohit Shakya">
  <meta name="keywords" content="Commment, Map, User, Authentication, Weather, Report, News ">
  <meta name="title" content="Commment Posting Site">
  <meta name="description" content="Welcome to our comment posting site. Enjoy!!">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
<body style="background: orange;">

</body>
</html>
<?php
$servername = "localhost";
$dbusername = "root";
$password = "";
$database="mydb";
$name=$_POST['name'];
$pass=$_POST['pass'];
error_reporting ( E_ALL ) ;
ini_set ( 'display_errors' , 1 ) ;

// Create connection
$conn = new mysqli($servername, $dbusername, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  
  $message="";
if(count($_POST)>0) {
   $result = mysqli_query($conn,"SELECT * FROM user WHERE name='" . $_POST["name"] . "' and password = '". $_POST["pass"]."'");
   $count  = mysqli_num_rows($result);
   if($count==0) {
     header('Location: failure.php');
   } else {
    // Associative array
$row = $result -> fetch_array(MYSQLI_ASSOC);
$_SESSION['id']= $row["user_id"];
    
    $_SESSION["username"]=$_POST['name'];
    $_SESSION['submit']=$_POST['submit'];
    header('Location: user.php');

   }
}
echo $message;   
         

?>
		