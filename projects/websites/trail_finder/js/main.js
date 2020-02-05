$(document).ready(function() {
  /* API keys */
  var ipstackKey = "17a6dba5bb98d2be15eb48bc78c975c5";
  var hikingprojectKey = "200435236-3c53d6224b00e6cfdc3d526c6ac0f627";

  /* When the user clicks the button with id of 'findTrails', this function will execute and return with trail data based on the user's location */
  $("#getTrails").click(function() {
    /* ipstack API returns the user's coordinates and uses them to find trails in the Hiking Project API. */
    $.getJSON(
      "https://api.ipstack.com/check?access_key=" +
        ipstackKey +
        "&output=json&format=1&fields=latitude,longitude,city,region_code,country_code&callback=?",
      function(data) {
        console.log(data.latitude);
        console.log(data.longitude);
        console.log(data.city);
        console.log(data.region_code);
        console.log(data.country_code);

        var lat = data.latitude;
        var lon = data.longitude;

        var maxDistance = $("#maxDistance");
        var maxResults = $("#maxResults");
        var sort = $("input[name='sort']:checked").val();
        var minLength = $("#minLength");
        var stars = $("input[name='stars']:checked").val();

        /* Get trails */
        $.get(
          "https://www.hikingproject.com/data/get-trails?lat=" +
            lat +
            "&lon=" +
            lon +
            "&maxDistance=" +
            maxDistance.val() +
            "&maxResults=" +
            maxResults.val() +
            "&sort=" +
            sort +
            "&minLength=" +
            minLength.val() +
            "&minStars=" +
            stars +
            "&key=" +
            hikingprojectKey,
          function(response) {
            var displayTrails = $("#displayTrails");
            // Empty div #displayTrails each time the 'Filter Results' button is clicked
            displayTrails.empty();

            // Loop through JSON data and display it in div #displayTrails
            $.each(response.trails, function(i, item) {
              // Create div 'trailInfo'
              $("<div/>")
                .attr("class", "trailInfo")
                .appendTo(displayTrails);
              var trailInfo = $(".trailInfo");
              $(trailInfo)
                .attr("class", "col s12 m6 offset-m3 grey lighten-4")
                .appendTo(trailInfo);

              // Display response data inside of 'trailInfo'
              $(trailInfo).append("<h5>" + response.trails[i].name + "</h5>");
              $(trailInfo).append(
                "<img class='responsive-img' src='" +
                  response.trails[i].imgSmallMed +
                  "'>"
              );
              $(trailInfo).append("<p>" + response.trails[i].summary + "</p>");

              // Get trail condition button
              $(trailInfo).append(
                "<button value='" +
                  response.trails[i].id +
                  "' class='getConditions mohave-bold waves-effect waves-light btn'>View Trail Conditions</button>"
              );

              // Completed hike checkbox
              $(trailInfo).append(
                "<form action='process_form.php'><p><label><input class='completedHike' type='checkbox' name='completedHike' value='" +
                  response.trails[i].name +
                  "' /><span class='asap-bold'>I've completed this hike!</span></label></p></form>"
              );

              // Divider
              $(trailInfo).append("<div class='divider'/>");

              // Other trail info
              $(trailInfo).append(
                "<p><span class='asap-bold'>Location: </span>" +
                  response.trails[i].location +
                  "</p>"
              );
              $(trailInfo).append(
                "<p><span class='asap-bold'>Trail Length: </span>" +
                  response.trails[i].length +
                  " miles</p>"
              );
              $(trailInfo).append(
                "<p><span class='asap-bold'>Trail Type: </span>" +
                  response.trails[i].type +
                  "</p>"
              );
              $(trailInfo).append(
                "<p><span class='asap-bold'>Difficulty Level: </span>" +
                  response.trails[i].difficulty +
                  "</p>"
              );
              $(trailInfo).append(
                "<p><span class='asap-bold'>Star rating: </span>" +
                  response.trails[i].stars +
                  "</p>"
              );
              $(trailInfo).append(
                "<p><span class='asap-bold'>Ascent: </span>" +
                  response.trails[i].ascent +
                  "</p>"
              );
              $(trailInfo).append(
                "<p><span class='asap-bold'>Descent: </span>" +
                  response.trails[i].descent +
                  "</p>"
              );
              $(trailInfo).append(
                "<p><span class='asap-bold'>Condition Status: </span>" +
                  response.trails[i].conditionStatus +
                  "</p>"
              );
              $(trailInfo).append(
                "<p><span class='asap-bold'>Condition Details: </span>" +
                  response.trails[i].conditionDetails +
                  "</p>"
              );
              $(trailInfo).append(
                "<p><span class='asap-bold'>Last Updated: </span>" +
                  response.trails[i].conditionDate +
                  "</p>"
              );

              // Divider
              $(trailInfo).append("<div class='divider'/>");
            }); // End $.each

            // Completed hike counter
            $("#hike").empty;
            $("input[type=checkbox]").click(function() {
              var n = $("input[type=checkbox]:checked").length;
              var v = $("input[type=checkbox]:checked").val();
              $("#hike").text(
                n === 0
                  ? "You haven't hiked any trails yet. Time for an adventure!"
                  : "Awesome! You have successfully hiked " +
                      n +
                      (n === 1 ? " trail!" : " trails!")
              );

              $("#hike").text(
                n === 0
                  ? "You haven't hiked any trails yet. Time for an adventure!"
                  : "Congratulations, you hiked " +
                      v +
                      "! You have successfully hiked " +
                      n +
                      (n === 1 ? " trail! " : " trails! ")
              );
            });
          }
        ); // End $.get
      }
    ); // End $.getJSON
  }); // End $("#getTrails").click
}); // End document ready function
