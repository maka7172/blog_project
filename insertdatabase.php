<?php

$server = "127.0.0.1";
$userdb = "root" ;
$passdb = "" ;
$database = "classproject" ;
$conn = new mysqli($server,$userdb,$passdb,$database );
$usedb = "use $database"   ;
$conn->query($usedb) ;
if (!$conn->connect_error) {
  # code...
  echo "hatman" ;
}
for ($i=0; $i <20 ; $i++) {
$date = date("Y-m-d H:i:s") ;
$query = "insert into post(body_post,owner,create_time) values('it is my post $i','mohammad','$date')" ;
$conn->query($query) ;
}
$query = "select * from post" ;
$result = $conn->query($query) ;
while ($obj = $result->fetch_object()) {
  # code...

  # code...
  echo "<tbody><tr><td>$obj->id</td><td>$obj->body_post</td><td>$obj->owner</td><td>$obj->create_time</td></tr></tbody>";

}
 ?>
