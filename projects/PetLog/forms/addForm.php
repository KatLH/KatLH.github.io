<!--ADD PAWSTER ANIMAL FORM SQL_pawsters/addFoster.php-->
<form id="addPawster" class="grey lighten-5 z-depth-2" action="" method="POST">
	<div class="row">
		<p class="formHeading center flow-text cooper_hewitt-Bold">Add Pawster Animal</p>
		<!--Foster Name-->
		<div class="input-field col s12 m5">
			<input id="name" type="text" class="validate" name="name">
			<label for="name">Name</label>
		</div>
		<!--Gender-->
		<div class="input-field col s12 m4">
			<input id="gender" type="text" class="validate" name="gender">
			<label for="gender">Gender</label>
		</div>
		<!--Age-->
		<div class="input-field col s12 m3">
			<input id="age" type="text" class="validate" name="age">
			<label for="age">Age</label>
		</div>
	</div> <!--End row-->

	<div class="row">
		<!--Species-->
		<div class="input-field col s12 m4">
			<input id="species" type="text" name="species">
			<label for="species">Species</label>
		</div>
		<!--Breed-->
		<div class="input-field col s12 m4">
			<input id="breed" type="text" class="validate" name="breed">
			<label for="breed">Breed</label>
		</div>
		<!--Color-->
		<div class="input-field col s12 m4">
			<input id="color" type="text" class="validate" name="color">
			<label for="color">Color</label>
		</div>
	</div> <!--End row-->

	<div class="row">
		<!--Notes-->
		<div class="input-field col s12">
			<textarea id="notes" class="materialize-textarea" name="notes"></textarea>
			<label for="notes">Notes</label>
		</div>
	</div> <!--End row-->

	<div class="row">
		<!--Submit button-->
		<div class="input-field col s12 m4">
			<button type="submit" name="submit">Save</button>
		</div>
	</div> <!--End row-->
</form>