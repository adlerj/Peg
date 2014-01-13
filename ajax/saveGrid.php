<?php 

  include 'DB.php';
  $con = mysql_connect($host,$user,$pass);
  $dbs = mysql_select_db($databaseName, $con);

echo $_POST;

  exit();
  $results = json_decode();
    echo "json: ".$results;
 

  //var_dump($results);

  
  //$sql = "INSERT INTO $tableName (username, password, id) VALUES ('$username', '$jason', null)";

  //echo $sql;
  //exit();

  $result = mysql_query("SELECT * FROM users WHERE username='joe' LIMIT 1");

  
  $row = mysql_fetch_array($result);
    if( $row !== false){
        echo  "Assigned - ".$row['password'];
      mysql_query('update users set username="jads" where username="joe"');
    }
    else
      echo   "Available";

   exit();



  mysql_query($sql);
  mysql_close($con);
?>

