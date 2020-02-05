$(document).ready(function () {
	$('.sidenav').sidenav();

	/*
		index.html
			Magic 8 Ball predictions
	*/
	$("#logo").hide();
	$("#getpred").hide();
	$("#pred-header").hide();
	$("#pred-subheader").hide();
	$("#logo").fadeIn(1000);
	$("#pred-header").delay(1000).fadeIn(1000);
	$("#getpred").delay(2000).fadeIn(1000);
	$("#pred-subheader").delay(3000).fadeIn(1000);

	$("#answer").hide();

	var onClick = function () {
		$("#answer").hide();
		$("#logo").attr("src", "img/index/logo.png");
		$("#logo").effect("shake");
		$("#answer").text("answer");
		$("#answer").fadeIn(3000);
		$("#logo").attr("src", "img/index/logoAnswer.png");
	};

	$("#getpred").click(onClick);
	$("#getpred").click(function () {
		$.ajax({
			type: "POST",
			url: "php/getPredict.php",
			timeout: 2000,
			error: function () {
				$("#answer").text("Please try again later.");
			},
			success: function (data) {
				$("#answer").html(data);
			}
		}); // End $.ajax

	});

	/* 
		poster.html
			Poster creation draggables
	*/
	$("#draggable2").draggable({ snap: ".ui-widget-header" });
	$("#draggable3").draggable({ snap: ".ui-widget-header", snapMode: "both" });
	$("#draggable4").draggable({ snap: ".ui-widget-header" });
	$("#draggable5").draggable({ snap: ".ui-widget-header" });
	$("#draggable6").draggable({ snap: ".ui-widget-header" });
	$("#draggable7").draggable({ snap: ".ui-widget-header" });
	$("#draggable8").draggable({ snap: ".ui-widget-header" });


	/*
		Add new prediction comment
	*/
	$("#commentForm").on("submit", function (event) {
		$('input#input_text, textarea#textarea1').characterCounter();
		event.preventDefault();
		var details = $(this).serialize();

		$.ajax({
			type: "POST",
			url: "php/process_form.php",
			data: details,
			timeout: 2000,
			beforeSend: function () {
				$("#loading").text("Loading...");
			},
			complete: function () {
				$("#textarea1").empty();
				$("#loading").empty();
			},
			success: function (data) {
				$("#response").html(data);
			},
			error: function () {
				$("#response").text("I'm sorry, but there seems to have been an error. Please try again later");
			}
		}); // End $.ajax

	}); // End #commentForm submit event



	/* 
		Vote Counter
			In order to demonstrate how the voting system would appear on a live website, the counter values have been assigned
			values at the beginning. Otherwise, they would be set at 0.
	*/
	var magicCounter = 356;
	var raptorCounter = 226;
	var votes = magicCounter + raptorCounter;

	var raptorResult = 0;
	var magicResult = 0;

	$("#magic").click(function () {
		$("#magic").empty;
		votes++;
		magicCounter++;

		raptorCounter = 100 * raptorCounter / votes;
		raptorResult = raptorCounter.toFixed(0);

		magicCounter = 100 * magicCounter / votes;
		magicResult = magicCounter.toFixed(0);
		$("#magicVote").html("<h5>" + magicResult + "%</h5>");
		$("#raptorVote").html("<h5>" + raptorResult + "%</h5>");
	});

	$("#raptors").click(function () {
		$("#raptors").empty;
		votes++;
		raptorCounter++;

		raptorCounter = 100 * raptorCounter / votes;
		raptorResult = raptorCounter.toFixed(0);

		magicCounter = 100 * magicCounter / votes;
		magicResult = magicCounter.toFixed(0);
		$("#magicVote").html("<h5>" + magicResult + "%</h5>");
		$("#raptorVote").html("<h5>" + raptorResult + "%</h5>");
	});

}); // End document.ready