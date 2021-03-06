<?php $pageChecker = new PageChecker(); $user = new User(); ?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php echo ($pageChecker->isPage("index.php")) ? "class='active'" : ''; ?>><a href="index.php">Home</a></li>
        <li <?php echo ($pageChecker->isPage("matches.php")) ? "class='active'" : ''; ?>><a href="matches.php">Matches</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
          if($user->account_type=="admin")
          {
        ?>
        <li <?php echo ($pageChecker->isPage("administrator.php")) ? "class='active'" : ''; ?>><a href="administrator.php">Administrative Access</a></li><?php } ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $user->first_name . " " . $user->last_name; ?><span class="caret neon"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="profile.php?id=<?php echo $user->id; ?>">Profile</a></li>
            <li><a href="logout.php">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>