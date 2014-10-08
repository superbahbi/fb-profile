<?php
    $t = microtime(true);

//------------------------------------------------------------------------------
    require_once("fb/src/facebook.php");
    require_once("src/fb.class.php");


        
    // Create our Application instance (replace this with your appId and secret).
    $facebook = new Facebook(array(
      'appId'  => '',
      'secret' => '',
    ));
    
    // Get User ID
    $user = $facebook->getUser();
    $access_token = $facebook->getAccessToken();
    // We may or may not have this data based on whether the user is logged in.
    //
    // If we have a $user id here, it means we know the user is logged into
    // Facebook, but we don't know if the access token is valid. An access
    // token is invalid if the user logged out of Facebook.
    
    if ($user) {
      try {
        // Proceed knowing you have a logged in user who's authenticated.
        $user_profile = $facebook->api('/me');
        $fb = new fb($user_profile);
      } catch (FacebookApiException $e) {
        error_log($e);
        $user = null;
      }
    }
    // Login or logout url will be needed depending on current user state.
    if (!$user) {
        $loginUrl = $facebook->getLoginUrl();
    }
    

    include ("inc/header.php");
    include ("inc/navbar.php");  
	
   
    
	$page = $_GET['page'];
	$action = $_GET['action'];
	$page = strtolower($page);
	if (!$page) { $page="home"; };
	if (!$action) { $action="index"; }
    
	$model_path .= "model/$page/$action.php";
	$controller_path .= "controller/$page/$action.php";	
	$view_path .= "views/$page/$action.php";
    
    
	if (file_exists($view_path) && file_exists($controller_path) && file_exists($model_path)) {
        if ($user) {
            include($model_path);
            include($controller_path);
    		include($view_path); 
        } else {
            echo '<strong><em>You are not Connected.</em></strong>';
        }
	} else  {
        
	    include("views/error/404.php");
	}
	
    include ("inc/footer.php");
//---------------Post and upload a picture--------------------------------------
    if($_POST['text_post']){
      try {
        $ret_obj = $facebook->api('/me/feed', 'POST',
                                    array(
                                      'message' => $_POST['text_post']
                                 ));
        //echo '<pre>Post ID: ' . $ret_obj['id'] . '</pre>';
        unset($_POST['feed']);
      } catch(FacebookApiException $e) {
        error_log($e->getType());
        error_log($e->getMessage());
      }    
    }
    
    if(!empty($_FILES['userfile']['tmp_name'])) {
      try {
        $filename = $_FILES['userfile']['tmp_name'];

		$message = $_POST['message'];
        // Upload to a user's profile. The photo will be in the
        // first album in the profile. You can also upload to
        // a specific album by using /ALBUM_ID as the path 
        $ret_obj = $facebook->api('/me/photos', 'POST', array(
                                         'image' => '@' . realpath($filename),
                                         'message' => $message,
                                         )
                                      );
        //echo '<pre>Photo ID: ' . $ret_obj['id'] . '</pre>';
      } catch(FacebookApiException $e) {
        error_log($e->getType());
        error_log($e->getMessage());
      } 
    }
?>