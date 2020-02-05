function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

$(document).ready(function(){
		/* Crash Course */
    $('.collapsible').collapsible();


		/* Make The Swap */
		$("#razorDiv").hide("#razorText");
		$("#razorBtn").click(function(){
			$("#razorDiv").toggle("5000", "linear");
  	});

		$("#menstrualDiv").hide("#menstrualText");
		$("#menstrualBtn").click(function(){
			$("#menstrualDiv").toggle("5000", "linear");
  	});

		$("#breadDiv").hide("#breadText");
		$("#breadBtn").click(function(){
			$("#breadDiv").toggle("5000", "linear");
  	});

		$("#bambooDiv").hide("#bambooText");
		$("#bambooBtn").click(function(){
			$("#bambooDiv").toggle("5000", "linear");
  	});

		$("#strawDiv").hide("#strawText");
		$("#strawBtn").click(function(){
			$("#strawDiv").toggle("5000", "linear");
  	});

		$("#cottonDiv").hide("#cottonText");
		$("#cottonBtn").click(function(){
			$("#cottonDiv").toggle("5000", "linear");
  	});
});
