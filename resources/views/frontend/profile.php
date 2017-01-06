<div class="profile_container">
    Profile:<br>
    <div class="block well">
	<form ng-submit="submitComment()">

	    <div class="form-group">
		<label for="name">Name</label>
		<input type="text" class="form-control input-md profile_name_input" name="name" ng-model="profileData.name" placeholder="Name">
	    </div>

	    <div class="form-group">
		<label for="email">Email</label>
		<input name="email" class="form-control input-md profile_name_input" ng-model="profileData.email" type="email" placeholder="Email">
	    </div>

	    <div class="form-group">
		<label for="password">Password</label>
		<input name="password" class="form-control input-md profile_name_input" ng-model="profileData.password" type="password">
	    </div>

	    <div class="form-group text-right">
		<button type="submit" class="btn btn-primary btn-lg pull-left" ng-click="profileUpdate()">Save</button>
	    </div>
	</form>
    </div>
</div>