<?php 

  include 'DB.php';
  $con = mysql_connect($host,$user,$pass);
  $dbs = mysql_select_db($databaseName, $con);

  $name       = $_POST['name'];
  $jsonString = $_POST['stuff'];
  echo "string: ".$jsonString."\n";
  $json = json_decode($jsonString);
  printGrid($json);
  updateTable($name, $jsonString);

  mysql_close($con);
/////////////Helpers//////////////////
function printGrid($json){
  $arrayLength = count($json);
  for($x = 0; $x < $arrayLength; $x++){
    echo "Element(".$x."):  col :".$json[$x]->col." row: ".$json[$x]->row." size_x: ".$json[$x]->size_x." size_y: ".$json[$x]->size_y."\n";
  }
}

function updateTable($name, $json){
  $result = mysql_query("SELECT * FROM users WHERE username='$name' LIMIT 1");
  $row = mysql_fetch_array($result);

  if( $row !== false){//already assigned, update table
      echo  "Already in DB... updating table entry";
      $sql = "update users set data='$json' where username='$name'";
      echo "\n".$sql;
      mysql_query($sql);
    }
    else{
      echo "New Entree! Adding row";
      $sql = "INSERT INTO users (username, data, id) VALUES ('$name', '$json', null)";
      echo "\n".$sql;
      mysql_query($sql);
    }
  } 

?>

