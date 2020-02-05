$(document).ready(function () {
	/*
		API Data
	*/
	var apikey_token = "179bc92f-50d2-46b0-87d4-143e63";
	const password = "MYSPORTSFEEDS";
	var result = $(this).serialize();

	$.ajax({
		type: "GET",
		url: "https://api.mysportsfeeds.com/v2.1/pull/nba/2018-2019-regular/standings.json?team=orlando-magic",
		dataType: 'json',
		async: true,
		headers: {
			"Authorization": "Basic " + btoa(apikey_token + ":" + password),
			//"Accept-Encoding": "gzip"
		},
		data: result,
		beforeSend: function () {
			$("#loading").text("Loading...");
		},
		complete: function () {
			$("#loading").empty();
		},
		success: function (result) {
			var teamName = ("#teamName");
			var rank = ("#rank");
			var standings = ("#standings");
			var off = ("#off");
			var def = ("#def");
			var reb = ("#reb");
			var ft = ("#ft");
			var foul = ("#foul");

			$.each(result.teams, function (i, item) {
				/* Standings */
				$(rank).append("<thead><tr><th>Wins</th><th>Losses</th></tr></thead><tbody><tr><td>" + result.teams[i].stats.standings.wins + "</td><td>" + result.teams[i].stats.standings.losses + "</td></tr></tbody>");

				/* Rankings */
				$(rank).append("<thead><tr><th>Team Rankings</th><th>Rank</th></tr></thead><tbody><tr><td>" + result.teams[i].conferenceRank.conferenceName + " Conference</td><td>" + result.teams[i].conferenceRank.rank + "</td></tr><tr><td>" + result.teams[i].divisionRank.divisionName + " Division</td><td>" + result.teams[i].divisionRank.rank + "</td></tr><tr><td>" + result.teams[i].playoffRank.appliesTo + " Playoff</td><td>" + result.teams[i].playoffRank.rank + "</td></tr><tr><td>Overall Rank</td><td>" + result.teams[i].overallRank.rank + "</td></tr></tbody>");

				/* Offense */
				$(off).append("<thead><tr><th>Offense</th><th>Per Game</th><th>Totals</th></tr></thead><tbody><tr><td>Assists</td><td>" + result.teams[i].stats.offense.astPerGame + "</td><td>" + result.teams[i].stats.offense.ast + "</td></tr><tr><td>Points</td><td>" + result.teams[i].stats.offense.ptsPerGame + "</td>><td>" + result.teams[i].stats.offense.pts + "</td></tr></tbody>");

				/* Defense */
				$(def).append("<thead><tr><th>Defense</th><th>Per Game</th><th>Totals</th></tr></thead><tbody><tr><td>Turnovers</td><td>" + result.teams[i].stats.defense.tovPerGame + "</td><td>" + result.teams[i].stats.defense.tov + "</td></tr><tr><td>Steals</td><td>" + result.teams[i].stats.defense.stlPerGame + "</td><td>" + result.teams[i].stats.defense.stl + "</td></tr><tr><td>Blocks</td><td>" + result.teams[i].stats.defense.blkPerGame + "</td><td>" + result.teams[i].stats.defense.blk + "</td></tr><tr><td>Blocks Against</td><td>" + result.teams[i].stats.defense.blkAgainstPerGame + "</td><td>" + result.teams[i].stats.defense.blkAgainst + "</td></tr><tr><td>Points Against</td><td>" + result.teams[i].stats.defense.ptsAgainstPerGame + "</td><td>" + result.teams[i].stats.defense.ptsAgainst + "</td></tr></tbody>");

				/* Rebounds */
				$(reb).append("<thead><tr><th>Rebounds</th><th>Per Game</th><th>Totals</th></tr></thead><tbody><tr><td>Offense</td><td>" + result.teams[i].stats.rebounds.offRebPerGame + "</td><td>" + result.teams[i].stats.rebounds.offReb + "</td></tr><tr><td>Defense</td><td>" + result.teams[i].stats.rebounds.defRebPerGame + "</td><td>" + result.teams[i].stats.rebounds.defReb + "</td></tr><tr><td>Totals</td><td>" + result.teams[i].stats.rebounds.rebPerGame + "</td><td>" + result.teams[i].stats.rebounds.reb + "</td></tr></tbody>");

				/* Free Throws */
				$(ft).append("<thead><tr><th>Free Throws</th><th>Per Game</th><th>Totals</th></tr></thead><tbody><tr><td>Attempted</td><td>" + result.teams[i].stats.freeThrows.ftAttPerGame + "</td><td>" + result.teams[i].stats.freeThrows.ftAtt + "</td></tr> <tr><td>Successful</td><td>" + result.teams[i].stats.freeThrows.ftMadePerGame + "</td><td>" + result.teams[i].stats.freeThrows.ftMade + "</td></tr></tbody>");

				/* Fouls */
				$(foul).append("<thead><tr><th></th><th>Total Fouls</th><th>Total Fouls Drawn</th><th>Personal Fouls</th><th>Personal Fouls Drawn</th><th>Technical Fouls</th><th>Technical Fouls Drawn</th></tr></thead><tbody><tr><td>Per Game</td><td>" + result.teams[i].stats.miscellaneous.foulsPerGame + "</td><td>" + result.teams[i].stats.miscellaneous.foulsDrawnPerGame + "</td><td>" + result.teams[i].stats.miscellaneous.foulPersPerGame + "</td><td>" + result.teams[i].stats.miscellaneous.foulPersDrawnPerGame + "</td><td>" + result.teams[i].stats.miscellaneous.foulTechPerGame + "</td><td>" + result.teams[i].stats.miscellaneous.foulTechDrawnPerGame + "</td></tr><tr><td>Totals</td><td>" + result.teams[i].stats.miscellaneous.fouls + "</td><td>" + result.teams[i].stats.miscellaneous.foulsDrawn + "</td><td>" + result.teams[i].stats.miscellaneous.foulPers + "</td><td>" + result.teams[i].stats.miscellaneous.foulPersDrawn + "</td><td>" + result.teams[i].stats.miscellaneous.foulTech + "</td><td>" + result.teams[i].stats.miscellaneous.foulTechDrawn + "</td></tr></tbody>");

			}); // End $.each

		} // End success: function

	}); // End $.ajax

}); // End document.ready