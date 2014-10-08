<!-- Index Page -->    
    <div class="container">
    <div class="row">
        <div class="cover">
            <div class="span12">
                <div class="span9">
                    <img class="cover" src="<?php echo $fb->get_cover_photo(); ?>">
                    <img class="profile-pic"src="<?php echo $fb->get_avatar(120,120); ?>">
                </div>  
                <div class="span1">
                    <ul class="unstyled timeline">
                        <li>now</li>
                        <li>2013</li>
                        <li>2012</li>
                        <li>2011</li>
                    </ul>
                </div>    
            </div>
        </div>

    </div>
    <hr>
    <div class="row well">
        <div class="span4">
            <div class="span4">
              <h5>About</h5>
              <ul class="unstyled">
                <li><?php if ($fb->get_work()): ?>            <i class="icon-briefcase"></i>    <span class="about">                <? $data = $fb->get_work(); echo $data[0]; ?> at <? echo $data[1] ?> <?php endif ?></span></li>
                <li><?php if ($fb->get_education()): ?>       <i class="icon-book"></i>         <span class="about">studied at      <? echo $fb->get_education(); ?> <?php endif ?></span></li>
                <li><?php if ($fb->get_location()): ?>        <i class="icon-home"></i>         <span class="about">lives in        <? echo $fb->get_location(); ?> <?php endif ?></span></li>
                <li><?php if ($fb->get_hometown()): ?>        <i class="icon-map-marker"></i>   <span class="about">from:           <? echo $fb->get_hometown(); ?> <?php endif ?></span></li>
              <ul>
            </div>
            <div class="span4">
              <h5>Photos</h5>
                <? $counter = 0; ?>
                <table class="photo-table">
                <? for ( $i = 0; $i < 3; $i++ ): ?>
                    <tr>
                    <? for ( $j = 0; $j < 3; $j++ ): ?>
                        <td><a class="fancybox" href="<? echo $photo->get_source($counter); ?>"><img class="photo" src="<? echo $photo->get_picture($counter); ?>" /></a></td>
                        <? $counter++; ?>
                    <? endfor;  ?>
                    </tr>
                <? endfor;  ?>
                </table>
           </div>
            <div class="span4">
              <h5>Friends</h5>
              <p></p>
        	  <p><a class="btn" href="#">View details &raquo;</a></p>
            </div>
        </div>
        <div class="span6 well">
            <ul id="main_tab" class="nav nav-tabs ">
              <li><a href="#status" data-toggle="tab" class="nav-status">Status</a></li>
              <li><a href="#photo" data-toggle="tab" class="nav-status">Photo</a></li>
              <li><a href="#place" data-toggle="tab" class="nav-status">Place</a></li>
              <li><a href="#life_event" data-toggle="tab" class="nav-status">Life Event</a></li>
            </ul>
            <div id="main_tab" class="tab-content">
                <div class="tab-pane fade in active" id="status">
                    <form method="POST" action="" >
                        <textarea name="text_post" rows="2" cols="50">What's in your mind?</textarea><br>
                        <button type="submit" class="btn btn-danger">Post</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="photo">
                    <form enctype="multipart/form-data" method="POST">
        				<input name="message" type="text" value="Message"  maxlength="120" />
        				<input name="userfile" type="file" /><br />
        				<button type="submit" class="btn btn-danger">Upload</button>
    			    </form>
                </div>
                <div class="tab-pane fade" id="place">
                
                </div>
                <div class="tab-pane fade" id="life_event">
                
                </div>
            </div>

        </div> 
        <div class="span6 well">
          <h2>post</h2>
          <p></p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div> 
    </div>

    <!--<h3>Public profile of Bahbi</h3>
    <img src="https://graph.facebook.com/supergenuine/picture">
    <?php //echo $bahbi['name']; ?>  -->
    
   