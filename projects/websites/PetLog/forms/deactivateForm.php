<!--DEACTIVATE PAWSTER ANIMAL FORM-->
<form id="deactivatePawster" class="grey lighten-5 z-depth-2" action="SQL_pawsters/deactivatePawster.php" method="POST">
	<div class="row">
		<p class="formHeading center flow-text cooper_hewitt-Bold">Deactivate Pawster Animal</p>
		<!--Foster ID-->
		<div class="input-field col s12 m6">
			<input id="pid" type="text" class="validate" name="pid">
			<label for="pid">Pawster ID</label>
		</div>
	</div> <!--End row-->

	<div class="row">
		<!--Submit button-->
		<div class="input-field col s12">
			<button type="submit" name="submit">Save</button>
		</div>
	</div> <!--End row-->
</form>

