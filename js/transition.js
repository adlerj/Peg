$(document).ready(function() {
	
	$("body").css("display", "none");

    $("body").fadeIn(2000);
    
	$("#transition").on('submit', function(event){
		event.preventDefault();
		//linkLocation = this.href;
		var data = $("#transition :input").serializeArray();
		var user = data[0].value;
		if(user == "")
			toastr.error("", "Must enter a username!!");
		else{
			linkLocation = "pb.php?user=" + user;
			$("body").fadeOut(1000, redirectPage);	
		}	
	});
		
	function redirectPage() {
		window.location = linkLocation;
	}
	
});


//