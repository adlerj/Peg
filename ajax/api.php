<?php 

  include 'DB.php';
  $con = mysql_connect($host,$user,$pass);
  $dbs = mysql_select_db($databaseName, $con);


  $result = mysql_query("SELECT * FROM $tableName");         
  $array = mysql_fetch_row($result);                          

  
  echo json_encode($array);

?>