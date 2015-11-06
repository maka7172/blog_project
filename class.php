<?php

class User {
  private function conect_db($type,$query){
   $server = "127.0.0.1";
   $userdb = "root" ;
   $passdb = "" ;
   $database = "classproject" ;
   $conn = new mysqli($server,$userdb,$passdb,$database );
  switch ($type) {
    case 'select':
      # code...
      $result = $conn->query($query) ;
      return $result ;
      break;
      case 'insert':
        # code...
        $conn->query($query) ;

       break;
      case 'delete':
          # code...
        $conn->query($query) ;
        break;

    default:
      # code...
      break;
  }
  $conn->close() ;

}

public function create_post($array){
   $type = "insert" ;
        # code...
   $query = "insert into post(body_post,owner,create_time,category) values('$array[0]','$array[1]','$array[2]','$array[3]')" ;

    $this->conect_db($type,$query) ;

  }

public function delete_post($num) {
  $type = "delete" ;
  $query = "delete from post where id='$num' " ;
  $this->conect_db($type,$query) ;

}
public function list_post($condition) {
  $type = "select" ;
  $query = "select * from post" . $condition  ;
  $result = $this->conect_db($type,$query) ;

  if (($result->num_rows) > 0) {
    # code...
    echo "<div class='ui purple message' style='width:800px; height: 535px;'><table class='ui celled table'><thead><tr><td>postnum</td><td>post_body</td><td>owner</td><td>create date</td><td>category</td>" ;
    if ($_SESSION["privi"] == "admin" & $_SESSION["page"] == "manage")  {
      # code...
      echo "<td>select</td>";
    }
    echo "</tr></thead>" ;
    while ($obj =$result->fetch_object()) {

      echo "<tbody><tr><td><div class='ui ribbon label'>$obj->id</div></td><td>$obj->body_post</td><td>$obj->owner</td><td>$obj->create_time</td><td>$obj->category</td>" ;
      if ($_SESSION["privi"] == "admin" & $_SESSION["page"] == "manage") {
        # code...
      echo  "<td><form class='' action='manage.php' method='post'><input type='checkbox' name='delete' value=$obj->id><input type='submit' name='' value='delete'></form></td>" ;
    }
      echo  "</tr></tbody></div>" ;

    }
    echo "<table>" ;
  }


}
}
//end class User

 ?>
