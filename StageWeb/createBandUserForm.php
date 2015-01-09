<form id="regexpEmailForm2" class="form-horizontal vertical-center" action="createdUser.php" method="post">
<h3> Are you a band? </h3	>
	    <div class="form-group space">
		<span class="input-group-addon info" id="basic-addon1">Band Name</span>
		<input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" name="user" required minlength="8">
	</div>


	    <div class="form-group space">
	        <span class="input-group-addon info" id="basic-addon1">Band Email</span>
        	<input type="text"  class="form-control" placeholder="Email address" required="" autofocus="" name="email" aria-describedby="basic-addon1">
        </div>

	    <div class="form-group space">
		<span class="input-group-addon info"> Password</span>
		<input type="password" class="form-control" placeholder="Use a good password" aria-label="password" name="password" required minlength="10">
	</div>
	    <div class="form-group space centerContent">
	<button type="submit" class="btn btn-info btn-block">Create Account</button>
	</div>
	<input type="hidden" name="isBand" value="true">

</form>
