<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>main page</title>
    <link rel="stylesheet" href="/classproject/css/semantic.css">
    <script src="/classproject/js/semantic.js"></script>
  </head>
  <body>
    <div class="ui violet message">
    <div class="ui vertical pointing menu" style="">
     <a class="active item" href="manage.php">
       manage
     </a>
    </div>
    <center>
    <div class='ui text container'>

<?php
session_start();
if (!isset($_SESSION["name"])) {
  # code...
  echo "your not access this page please <a href='login.php'> login </a> ";

}
else {
  echo "<h1>HELLO  " . "" . $_SESSION['name'] . "</h1> ";
  echo "<a href='login.php'><input type='submit' name='name' value='LOGOUT' action=<?php session_unset(); ?></a>";
  $_SESSION["page"] = "main" ;
  include 'class.php' ;
$user = new User ;
$category = array("sport","academic","computer","domestic");
foreach ($category as  $value) {
  # code...
  $condition = " where category='$value' order by id limit 10" ;
  echo "<div class='ui purple message'><h1>list of category $value </h1></div></br> "  ;
  $user->list_post($condition) ;
  echo "</br></br></br>" ;
}


}
 ?>
 </div>
 </center>
 </div>
</body>
</html>
