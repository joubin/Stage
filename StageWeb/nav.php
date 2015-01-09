  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <form action="getcurrentuser.php" method="GET" id="logout" name="logout">
          <button type="submit" style="display: <?php echo 'block';?>" class="navbar-toggle collapsed logout" data-toggle="" aria-expanded="false" aria-controls="navbar" name="logout" value="logout">
            <span class="sr-only">Toggle navigation</span>
          <span class="glyphicon glyphicon-lock white" aria-hidden="true"></span>
          </button>
          </form>
        <a class="navbar-brand" href="#">Stage</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="spacer">
    </div>