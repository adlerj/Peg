
<html>
  <head>
    <script language="javascript" type="text/javascript" src="../../../js/jquery.js"></script>
  </head>
  <body>

  <h2> Client example </h2>
  <h3>Output: </h3>
  <div id="output">this element will be accessed by Jadler and this text replaced</div>

  <script id="source" language="javascript" type="text/javascript">
  var stringafy = '[{"col":1,"row":1,"size_x":2,"size_y":2},{"col":3,"row":1,"size_x":2,"size_y":2},{"col":1,"row":3,"size_x":2,"size_y":2},{"col":3,"row":3,"size_x":2,"size_y":2}] ';
  var name = "jeff";
  $(function () 
  {
    $.post( "api2.php", { name: stringafy}, "json" );         

                                     
      //dataType: 'json',               
     
  }); 

  </script>
  </body>
</html>