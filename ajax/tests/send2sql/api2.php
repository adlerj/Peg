<?php 

  include 'DB.php';
  $con = mysql_connect($host,$user,$pass);
  $dbs = mysql_select_db($databaseName, $con);

  $name = $_POST['name']; 
  echo $name;

  //$sql = "INSERT INTO $tableName (username, password, id) VALUES ('$username', '$jason', null)";

  //echo $sql;
  exit();

  mysql_query($sql);
  mysql_close($con);
?>