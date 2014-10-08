<?php 
    require_once("fb/src/facebook.php");
    $config = array();
    $config['appId'] = '';
    $config['secret'] = '';
    $config['fileUpload'] = true; // optional
    
    $facebook = new Facebook($config);
    
    $fb_key = 'fbsr_'.$facebookConfig['app_id'];
    setcookie($fb_key, '', time()-3600);
    $facebook->destroySession();
        
    $url = 'http://bahbi.net/fb';
    header('Location: '.$url);
?>