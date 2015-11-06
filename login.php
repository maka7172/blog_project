<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="/classproject/css/semantic.css">
    <script src="/classproject/js/semantic.js"></script>
  </head>

  <body>


<?php
function test_val($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$username = $pass = "" ;
$username_error = $pass_error = "" ;
$show_form = 1 ;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  # code...
  if (isset($_POST["username"]) & isset($_POST["pass"])) {

    # code...
    $server = "127.0.0.1" ;
    $user = "root";
    $passdb = "" ;
    $database = "classproject" ;
    $username = test_val($_POST["username"]) ;
    $pass = md5(test_val($_POST["pass"])) ;
    $conn = new mysqli($server,$user,$passdb,$database) ;
    $query = "select * from user where username='$username' AND pass = '$pass' " ;
    $result = $conn->query($query);
    if ($result->num_rows > 0 ) {
      # code...
      $show_form = 0 ;
      session_start();
      $_SESSION["name"] = $username ;
      $obj = $result->fetch_object();
      $_SESSION["privi"] = $obj->privi ;
       ?>
      <center>
        <div class="ui pink message" style="width:400px; height: 50px;"><h1>HELLO  <?php echo $_SESSION["name"] ; ?> </h1></div>
        <a href='login.php'><input type='button' name='name' value='LOGOUT' </a>
        <div class="ui green message" style="width:400px; height: 50px;">
          <p><a href='manage.php' >you are loin now, visite manage page </a></p></br>
        </div>
        <div class="ui teal message" style="width:400px; height: 50px;">
          <p><a href='main.php' >you are loin now, visite main page </a></p>
        </div>
      </center>
      <?php
          }
        }
    else {
      # code...

    echo "<div class='ui red message'><div class='ui huge message'>your username OR passsword not valid</div></div>" ;
  }
}
  if ($show_form == 1) {
    # code...
  ?>

  <form class="" action="" method="post">
  <div class='ui text container'>
  <div class="ui inverted segment" style="width:400px; height: 400px;">
  <div class="ui inverted form">
    <div class="ui black message">
    <div class="ui massive message">
      <center>
        <label style="color:black;">WELCOME</label></br>
        <label style="color:black;">LOGIN</label>
      </center>
      </div>
    </div>

    <div class="two fields" >
      <div class="field" style="width:200px; height: 100px;">
        <label>User Name</label>
        <input type="text" name="username" value="" placeholder="User Name">
      </div>
      <div class="field" style="width:200px; height: 100px;">
        <label>Password</label>
        <input placeholder="password" type="password" name="pass">
      </div>
    </div>

    <div class="ui submit button">
      <input type="submit" name="submit" value="LOGIN">
    </div>
  </div>
</div>
</div>
 </form>
<?php } ?>
</body>
</html>
