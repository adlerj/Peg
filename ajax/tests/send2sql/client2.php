
<html>
  <head>
    <script language="javascript" type="text/javascript" src="../js/jquery.js"></script>
  </head>
  <body>

  <h2> Client example </h2>
  <h3>Output: </h3>
  <div id="output">this element will be accessed by Jadler and this text replaced</div>

  <script id="source" language="javascript" type="text/javascript">
  var dataString = 'Jadler';
  $(function () 
  {
    $.post( "api2.php", { name: "John", json : "mynameisjason"} );                     
                                     
      //dataType: 'json',               
     
  }); 

  </script>
  </body>
</html>