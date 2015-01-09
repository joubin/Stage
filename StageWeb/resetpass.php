

<?php
include 'head.php';
include 'nav.php';
?>
<div class="spacer"></div>
<div class="vertical-center"> <!-- 
                      ^--- Added class  -->
  <div class="container vertical-center">

 
 <form class=" form-horizontal control-group login" Action="getcurrentuser.php" method="post" id="regexpEmailForm" validate>
        <h2 class="form-signin-heading">what email</h2>
        <div class="form-group">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text"  class="form-control" placeholder="Email address" required="" autofocus="" name="email">

        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit" value="reset" name="reset">Reset</button>
      </form>
      <br/>

        </div>
</div>



<?php
include 'foot.php';
?>



