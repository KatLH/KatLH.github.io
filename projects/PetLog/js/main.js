$(function() {
	/* Initialize Materialize JavaScript */
	M.AutoInit();

	/* Resizes the textarea input field. (cats.php) */
	$('#textarea1').val('New Text');

	/* Initialize select option on form */
	$('select').formSelect();
	/* Select methods */
	//$('select').formSelect('methodName');
	//$('select').formSelect('methodName', paramName);

	/* Mobile navbar trigger */
	$('.sidenav').sidenav();
	

	
	/*
		LOGIN FORM (index.php)
			- When the user submits the login form, the page will display an error/success message w/o refreshing the page.
	*/
	$("#login").on("submit", function(event) {
		event.preventDefault();
		var details = $(this).serialize();

		$.ajax({
			type: "POST",
			url: "SQL_users/login.php",
			data: details,
			timeout: 2000,
			beforeSend: function() {
				$("#loading").load("preloader.html");
			},
			complete: function() {
				$("#loading").empty();
			},
			success: function(data) {
				$("#response").html(data);
			},
			error: function(data) {
				$("#response").text("I'm sorry, but there seems to have been an error. Please try again later");
			}
		});

		$.post('SQL_users/login.php', details, function(data) {
			$('#response').html(data);
		});
	});
	/*
		REGISTER FORM (index.php)
			- When the user submits the registration form, the page will display an error/success message w/o refreshing the page.
	*/
	$("#register").on("submit", function(event) {
		event.preventDefault();
		var details = $(this).serialize();

		$.ajax({
			type: "POST",
			url: "SQL_users/register.php",
			data: details,
			timeout: 2000,
			beforeSend: function() {
				$("#loading").load("preloader.html");
			},
			complete: function() {
				$("#loading").empty();
			},
			success: function(data) {
				$("#response").html(data);
			},
			error: function(data) {
				$("#response").text("I'm sorry, but there seems to have been an error. Please try again later");
			}
		});

		$.post('SQL_users/register.php', details, function(data) {
			$('#response').html(data);
		});
	});




	/*
		PAWSTER ANIMAL SORT/FILTER (selectPawster.php)
			- Update div #pawster with active/inactive animals depending on the option the user selects in the form.
	*/
	$("[name='pawsterStatus']").on('change', function () {
		var url = "SQL_pawsters/selectPawster.php";
		$('#pawsterPortal').empty();

		$.ajax({
			type: "POST",
			url: url,
			data: $("#selectPawster").serialize(),
			beforeSend: function () {
				//$("#loading").load("preloader.html");
			},
			complete: function () {
				$("#loading").empty();
			},
			success: function (data) {
				$("#pawsterPortal").html(data)
			},
			error: function (data) {
				$("#response").text("I'm sorry, but there seems to have been an error. Please try again later");
			}
		});
	});
	/*
		CHOOSE FROM SORT/FILTER (chooseForm.php)
			- Update div #form with the form the user chose in the select option.
	*/
	/*$("[name='formChoice']").on('change', function () {
		$('#form').empty();
		var value = $("#formChoice option:selected").val();

		if (value == "add") {
			$("#form").load("forms/addForm.php");
		}
		else if (value == "update") {
			$("#form").load("forms/updateForm.php");
		}
		else if (value == "deactivate") {
			$("#form").load("forms/deactivateForm.php");
		}
		else if (value == "delete") {
			$("#form").load("forms/deleteForm.php");
		}
		else {
			$("#response").text("I'm sorry, but there seems to have been an error. Please try again later");
		}
	});*/



	/*
		ADD PAWSTER ANIMAL FORM (addPawster.php)
			- Inserts the data into the table pawsterAnimals
			- Loads success/error message without refreshing the page
	*/
	$("#addPawster").on("submit", function (event) {
		event.preventDefault();
		var details = $(this).serialize();

		$.ajax({
			type: "POST",
			url: "SQL_pawsters/addPawster.php",
			data: details,
			timeout: 2000,
			beforeSend: function () {
				$("#loading").load("preloader.html");
			},
			complete: function () {
				$("#loading").empty();
			},
			success: function (data) {
				$("#response").html(data);
			},
			error: function (data) {
				$("#response").text("I'm sorry, but there seems to have been an error. Please try again later");
			}
		});

		$.post('SQL_pawsters/addPawster.php', details, function (data) {
			$('#response').html(data);
		});
	});
	/*
		UPDATE PAWSTER ANIMAL FORM (updateForm.php)
			- Update the data fields into the table pawsterAnimals
			- Loads success/error message without refreshing the page
	*/
	$("#updatePawster").on("submit", function(event) {
		event.preventDefault();
		var details = $(this).serialize();

		$.ajax({
			type: "POST",
			url: "SQL_pawsters/updatePawster.php",
			data: details,
			timeout: 2000,
			beforeSend: function() {
				$("#loading").load("preloader.html");
				
			},
			complete: function() {
				$("#loading").empty();
			},
			success: function(data) {
				$("#response").html(data);
			},
			error: function(data) {
				$("#response").text("I'm sorry, but there seems to have been an error. Please try again later");
			}
		});

		$.post('SQL_pawsters/updatePawster.php', details, function(data) {
			$('#response').html(data);
		});
	});
	/*
		DEACTIVATE PAWSTER ANIMAL FORM (deactivatePawster.php)
			- Update the data fields into the table pawsterAnimals
			- Loads success/error message without refreshing the page
	*/
	$("#deactivatePawster").click(function(event) {
		event.preventDefault();
		var details = $(this).serialize();

		$.ajax({
			type: "POST",
			url: "SQL_pawsters/deactivatePawster.php",
			data: details,
			timeout: 2000,
			beforeSend: function() {
				$("#loading").load("preloader.html");
			},
			complete: function() {
				$("#loading").empty();
			},
			success: function(data) {
				$("#response").html(data);
			},
			error: function(data) {
				$("#response").text("I'm sorry, but there seems to have been an error. Please try again later");
			}
		});

		$.post('SQL_pawsters/deactivatePawster.php', details, function(data) {
			$('#response').html(data);
		});
	});
	/*
		DELETE PAWSTER ANIMAL FORM (deletePawster.php)
			- Delete the row coresponding to the Pawster ID number the user entered.
			- Loads success/error message without refreshing the page
	*/
	$("#deletePawster").click(function (event) {
		event.preventDefault();
		var details = $(this).serialize();

		$.ajax({
			type: "POST",
			url: "SQL_pawsters/deletePawster.php",
			data: details,
			timeout: 2000,
			beforeSend: function () {
				$("#loading").load("preloader.html");
			},
			complete: function () {
				$("#loading").empty();
			},
			success: function (data) {
				$("#response").html(data);
			},
			error: function (data) {
				$("#response").text("I'm sorry, but there seems to have been an error. Please try again later");
			}
		});

		$.post('SQL_pawsters/deletePawster.php', details, function (data) {
			$('#response').html(data);
		});
	});
}); // Document.ready function
