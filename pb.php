
<!doctype html>
<html>
<head>
  <title>Demo &raquo; Add widgets dynamically &raquo; gridster.js</title>
  <link rel="stylesheet" type="text/css" href='js/gridster/dist/jquery.gridster.css'>
  <link rel="stylesheet" type="text/css" href='theme/style.css'>
  <link rel="stylesheet" type="text/css" href='js/toastr/toastr.min.css'>
  
</head>

<body>

    <h1>Version 0.005</h1>
    <p>Implemented AJAX for Asynchronous saving of serialized JSON from grid to database</p>
    <p>Implemented css/javascript transitions between pages</p>
    <p>Implemented JQuery form submit</p>
    <p>Implemented personalized dashboards</p>

    <p>Look into a socket driven protocol for faster response during shared instances</p>

    <p>-jadler 1/13/2014 1458</p>
   

    <div class ="container">
        <div class ="controls">
          <button id = "add"> Add A Peg </button>
          <textarea id = "site" cols = "20" rows = "1">http://m.8tracks.com/</textarea>
          <button id = "delete"> delete </button>
        </div>
        <div class="gridster">
          <ul></ul>
        </div>
    </div>
   


    <script type="text/javascript" src='js/jquery.js'></script>
    <script type="text/javascript" src="js/transition.js"></script>
    <script src='js/gridster/dist/jquery.gridster.js' type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src='js/toastr/toastr.min.js'></script>

    <script type="text/javascript" id="code">
    var gridster;
    var last = null;
    var count = 3;

    $(function(){



    //Options
      gridster = $(".gridster > ul").gridster({
          widget_margins: [5, 5],
          widget_base_dimensions: [100, 55],
          resize: {
            enabled: true
          }
      }).data('gridster');


      toastr.options = {
		  "closeButton": false,
		  "debug": false,
		  "positionClass": "toast-top-right",
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}

     /* var widgets = [
         ['<li><iframe width=90% height =90% src="http://weather.mobi/"></iframe><input type="checkbox" name="options[]" value="0" /></li>', 2, 5],
          ['<li><iframe width=90% height=90% src="https://www.youtube.com/embed/eIInySnQe4I" frameborder="0" allowfullscreen></iframe><input type="checkbox" name="options[]" value="1" /></li>', 4, 3],
          ['<li><iframe width=90% height=90% frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/?ie=UTF8&amp;ll=40.85968,-74.157769&amp;spn=0.21318,0.308647&amp;t=h&amp;z=12&amp;output=embed"></iframe><br /><input type="checkbox" name="options[]" value="2" /></li>', 4, 4]
      ];*/

         ///////LOAD GRID????????????????
      var user = $.urlParam('user');
      console.log(user);

      $.post("ajax/loadGrid.php?user=" + user, function(data) {
     
        console.log(data);

        $.each(data, function() {
          gridster.add_widget('<li />', this.size_x, this.size_y, this.col, this.row);});
          
        toastr.success(" ", "Successfully loaded " + user + "'s last save!");
        
      }, "json");

      $("#add").click( function() {
        var wid = ['<li><iframe src=' + $("#site").val() + ' style="width:100%; height:90%;"></iframe><input type="checkbox" name="options[]" value="' + count + '" /></li>', 3, 6];
        count++;
        gridster.add_widget.apply(gridster, wid);
        toastr.success(" ", "Peg Successfully Added");
      })

      $("#delete").on('click', function() {
          $("input[name='options[]']:checked").each(function ()
          {
               gridster.remove_widget( $('.gridster li').eq(parseInt($(this).val())));
          });
      });


      /////AUTO SAVE//////////
      var lastString = null;
      setInterval(function() {
        var gridJ = gridster.serialize();
        //console.log("Serialized: " + gridJ);
        var gridS = JSON.stringify(gridJ);
        //console.log("Stringafied: " + gridS);
        if (lastString == null)lastString = gridS;//init

        if (gridS == lastString)
          console.log("No Changes");
        else{
          lastString = gridS;
          console.log("New change made!");
          $.post( "ajax/saveGrid.php", { name: user, stuff: gridS}, "json" );
          toastr.success(" ", "New Changes Saved!");
        }
      }, 5000);
    });


    $.urlParam = function(name){
      var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
      if (results==null){
        return null;
      }
      else{
        return results[1] || 0;
      }
    }

    </script>
</body>
</html>
