<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="/classproject/css/semantic.css">
    <script src="/classproject/js/semantic.js"></script>
  </head>
  <body>
    <div class="ui violet message">
    <div class="ui vertical pointing menu" style="">
     <a class="active item" href="main.php">
       main
     </a>
    </div>

<?php
 session_start();

if (!isset($_SESSION["name"])) {
  # code...
  echo "your not access this page please <a href='login.php'> login </a> ";

}
else {
  echo "<center>";
  echo "<div class='ui text container'>" ;
  echo "<h1>HELLO  " . "" . $_SESSION['name'] . "</h1>";
  $_SESSION["page"] = "manage" ;
  include 'class.php' ;
  $user = new User() ;
  echo "<p><span style='text-align: center;'>SHOW ANY CATEGORY POST</span></p> " ;
  $manage_list_where = " order by id desc limit 10" ;
  $user->list_post($manage_list_where) ;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  # code...
  if (isset($_POST["post"])) {
    # code...
  $body_post = $_POST["post"] ;
  $owner = $_SESSION["name"] ;
  $time = date("Y-m-d H:i:s") ;
  $category = $_POST["category"] ;
  $array = array($body_post,$owner,$time,$category);
  $user->create_post($array) ;
}
  if (isset($_POST["delete"])) {
    # code...

    $num = $_POST["delete"] ;
    $user->delete_post($num) ;
  }
  }

 ?>
 </div>
<div class="ui black message">
  <div class="ui blue message" style="width:400px; height: 80px;text-align:center;">
 <p> <h1 style="text-align:center">
   insert your post
 </h1> </p>
</div>
<div class=""  style="width:400px; height: 200px">


<form class="" action="" method="post">
  <textarea rows="4" cols="50" name="post" style="color:black"></textarea></br>
  CATEGORY :<select class="" name="category">
    <optgroup label="news" style="color:black">
      <option value="sportnews" style="color:black">Sport</option>
      <option value="academic" style="color:black">Academic</option>
    </optgroup>
    <optgroup label="article" style="color:black">
      <option value="computer" style="color:black">Computer</option>
      <option value="domestic" style="color:black">Domestic</option>
    </optgroup>

  </select>
  <input type="submit" name="submit" value="add post"style="color:red">

</form>
</div>
</div>
<?php
//end of else
}


 ?>
 </div> </center>
</div>
</body>
</html>
