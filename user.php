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
include 'functions.php';
if (isset($_POST['submit'])) {
  insert();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
	<title>UserPage</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" >
  <meta name="author" content="Rohit Shakya">
  <meta name="keywords" content="Commment, Map, User, Authentication, Weather, Report, News ">
  <meta name="title" content="Commment Posting Site">
  <meta name="description" content="Welcome to our comment posting site. Enjoy!!">
  <link rel="stylesheet" href="css/mycss.css">
  <link rel="stylesheet" type="text/css" href="css/search.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head><body style="background: white">
<!-- nav bar-->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="user.php">Home</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="weather.php">Weather</a></li>
      <li><a href="news.php">News</a></li>
     </ul>
     <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
    </div>
  </div>
</nav>

<div class="alert alert-success">
	<div class="container">
  <h2><strong>Welcome!!
<?php
if(!isset($_SESSION['username']))
{
	header('Location: home1.html');
}
else
{
  echo ucfirst($_SESSION['username']);  
} 
?>
</h2>
<p>"You are successfully authenticated!!"</p><?php echo $_SESSION['msg']."<br>";?></strong>
<a href='user.php?clearAll=true'>Delete All</a>
</div></h2></div>
<!--alert box over-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
  <hr>
    <div class="info">
      <label for="example">Add Commment
      </label>
      <!--<form action="comment.php" method="post" onsubmit="alert('Commment posted successfully!')"> for alert on submission-->
      <form action="user.php" method="post">
        <label>Title</label>
      <input id="example" type="text" name="title" style="border: 1px solid #F2F2F2;">
      <textarea placeholder="Write your comment here!" class="pb-cmnt-textarea" name="desc"></textarea>
      <input id=sent type="submit" name="submit">
      </form> 
    </div>
</div>
<div class="container-fluid" id="Commments">
<?php
showComment(); // call the function

if (isset($_GET['clearAll'])) {
    deleteFunction();
  }
?>
</div>


</body>
</html>
