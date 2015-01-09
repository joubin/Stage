

<?php
include 'head.php';
include 'nav.php';
?>
<script type="text/javascript">
setTimeout(function () {
    $(".informatiemelding").fadeOut('slow');
}, 2000 /* Time to wait in milliseconds */);
</script>
<div class="spacer"></div>
<div class="vertical-center"> <!-- 
                      ^--- Added class  -->
  <div class="container vertical-center">
  <?php 
  if (isset($_GET['timeout'])) {
    echo '<div class="informatiemelding danger alert-danger" style="display">Your session has timed out</div>';
  }
  if (isset($_GET['badpassword'])) {
    echo '<div class="informatiemelding danger alert-danger" style="display">Wrong user and password</div>';
  }
  if (isset($_GET['logout'])) {
    echo '<div class="informatiemelding warning alert-warning" style="display">Logged out!</div>';
  }
  ?>
 
 <form class=" form-horizontal control-group login" Action="loginAction.php" method="post" id="regexpEmailForm" validate>
        <h2 class="form-signin-heading">Please sign in</h2>
        <div class="form-group">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text"  class="form-control" placeholder="Email address" required="" autofocus="" name="email">

        </div>
        <div class="form-group">

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name="password">
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
      <br/>
      <form Action="create.php" method="get">
      	  <button class="btn btn-lg btn-info btn-block" type="submit">Join</button>
      </form>
      <br>
      <form Action="create.php" method="get">
          <button class="btn btn-lg btn-warning btn-block" type="submit" name="resetpass" value="yes">Reset Password</button>
      </form>
        </div>
</div>



<?php
include 'foot.php';
?>



