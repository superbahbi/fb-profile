<!-- Home Controller -->
<?php
    $photos = $facebook->api('/me/photos');
    $photo = new photo($photos);
?>

