<?php 
  include 'DB.php';

  $con = mysql_connect($host,$user,$pass);
  $dbs = mysql_select_db($databaseName, $con);
  $name = $_GET['user'];

  $sql = "SELECT * FROM users WHERE username='$name' LIMIT 1";
  $result = mysql_query($sql);
  $row = mysql_fetch_array($result);  
  //echo "\n".$row[1];                        

  
  if( $row !== false)
    echo $row[1];
  else
    echo '[{"col":1,"row":1,"size_x":1,"size_y":1},{"col":1,"row":2,"size_x":1,"size_y":2},{"col":4,"row":1,"size_x":1,"size_y":2},{"col":2,"row":1,"size_x":2,"size_y":3}]';

  mysql_close($con);
 ?>