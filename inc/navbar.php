    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">bahbi/fb</a>
          <div class="nav-collapse collapse">
            <?php if ($user): ?>
            <ul class="nav">
               <li class=""><a href="#">Friends</a></li>
			   <li><a href="?page=message">Message</a></li>
			   <li><a href="?page=notification">Notification</a></li>
            </ul>
            <?php endif ?>
            <ul class="nav pull-right">
                <?php if ($user): ?>
                <li><img src="<?php echo $fb->get_avatar(40,40); ?>"></li>
                <li><a> <?php echo $fb->get_name(); ?></a></li>
                    
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Settings</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
                    
                <?php else: ?>
                   <a href="<?php echo $loginUrl; ?>" class="btn btn-block btn-facebook">
                        <i class="icon-facebook"></i> Sign in with Facebook
                    </a>
                <?php endif ?>
            </ul>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>