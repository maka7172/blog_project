<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register Page</title>
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

$name = $lastname = $email = $age = $username = $pass =$repass = "" ;
$name_flag = $lastname_flag = $email_flag = $age_flag = $username_flag = $pass_flag = "" ;
$name_error = $lastname_error = $email_error = $age_error = $username_error = $pass_error =$repass_error = "" ;
$show_form = 1 ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  # code...
  if ($_POST["name"] != "") {
    # code...
    $name = test_val($_POST["name"]) ;
    $name_flag = 1 ;
  }
  else {
    # code...
    $name_error = "please insert valid name" ;
  }
  //lastname
  if ($_POST["lastname"] != "") {
    # code...
    $lastname = test_val($_POST["lastname"]) ;
    $lastname_flag = 1 ;
  }
  else {
    # code...
    $lastname_error = "please insert valid lastname" ;
  }

  //username
  if ($_POST["username"] != "") {
    # code...
    $username = test_val($_POST["username"]) ;
    $username_flag = 1 ;
  }
  else {
    # code...
    $username_error = "please insert valid username" ;
  }

  //age
  if ($_POST["age"] != "" & is_numeric($_POST["age"])) {
    # code...

      $age = test_val($_POST["age"]) ;
      $age_flag = 1 ;
    }
  else {
    # code...
    $age_error = "please insert valid age" ;
  }
  //email
  if ($_POST["email"] != "") {
    # code...
    $email = test_val($_POST["email"]) ;
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
      # code...
      $email_error = "your input email not valid" ;
    }
    else {
            $email_flag = 1 ;
    }
  }
  else {
    # code...
    $email_error = "please insert valid email" ;
  }

  //pass
  if ($_POST["pass"] != "") {
    # code...
    $pass = md5(test_val($_POST["pass"])) ;
  }
  else {
    # code...
    $pass_error = "please insert valid pass" ;
  }
  //repass
  if ($_POST["repass"] != "") {
    # code...
    $repass = md5(test_val($_POST["repass"])) ;
    if ($pass != ($repass) ) {
      # code...
      $repass_error = "your password not match" ;
    }
    else {
      $pass_flag = 1 ;
    }
  }
  else {
    # code...
    $repass_error = "please insert password" ;
  }
}
if ($name_flag == 1 & $lastname_flag == 1 & $email_flag == 1 & $age_flag == 1 & $username_flag == 1 & $pass_flag == 1) {
  # code...
  $show_form = 0 ;
  $server = "127.0.0.1" ;
  $user = "root";
  $passdb = "" ;
  $database = "classproject" ;
  $conn = new mysqli($server,$user,$passdb,$database) ;
  if ($conn->connect_error) {
    # code...
  echo "your connection failed";}
  else {

  $usedb = "use $database"   ;
  $conn->query($usedb) ;
  $query = "insert into user values('$name','$lastname','$username','$email','$age','$pass','user')" ;
  if ($conn->query($query) === TRUE) {
    echo "your accuont created successfully";
    echo "<a href='login.php'>GO TO LIGIN PAGE</a>" ;
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

}
$conn->close() ;
}


 if ($show_form == 1) {
   # code...
 ?>

 <form class="" action="" method="POST">
  NAME :      <input type="text" name="name" value=""><span><?php echo "$name_error"; ?></span></br>
   LASTNAME : <input type="text" name="lastname" value=""><span><?php echo "$lastname_error"; ?></span></br>
   AGE :      <input type="text" name="age" value=""><span><?php echo "$age_error"; ?></span></br>
   USER NAME :<input type="test" name="username" value=""><span><?php echo "$username_error"; ?></span></br>
   EMAIL :    <input type="text" name="email" value=""><span><?php echo "$email_error"; ?></span></br>
   PASSWORD : <input type="password" name="pass" value=""><span><?php echo "$pass_error"; ?></span></br>
   REPASSWORD:<input type="password" name="repass" value=""><span><?php echo "$repass_error"; ?></span></br>
   <input type="submit" name="submit" value="submit">


 </form>

 <?php  } ?>
</body>
</html>
