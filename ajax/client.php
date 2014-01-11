
<html>
  <head>
    <script language="javascript" type="text/javascript" src="../js/jquery.js"></script>
  </head>
  <body>

  <h2> Client example </h2>
  <h3>Output: </h3>
  <div id="output">this element will be accessed by jquery and this text replaced</div>

  <script id="source" language="javascript" type="text/javascript">

  $(function () 
  {
    $.ajax({                                      
      url: 'api.php',                        
      data: "",                       
                                     
      dataType: 'json',               
      success: function(data)          
      {
        var id = data[0];              
        var vname = data[1];          

        $('#output').html("<b>id: </b>"+id+"<b> name: </b>"+vname); 
      } 
    });
  }); 

  </script>
  </body>
</html>