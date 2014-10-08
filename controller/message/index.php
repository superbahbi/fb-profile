<!-- Message Controller -->
<?
    $messages = $facebook->api('/me/inbox');
    $message = new message($messages, $fb->get_id());
    $comment = new comment($message->get_msg(), $fb->get_id());
?>