<!-- notification view -->

    <div class="container">
    <div class="row well">
        <div class="span12">
            <h5><? echo ucfirst($page); ?></h5>
            <div class="span10">
                <? for($i = 0; $i < $notification->count; $i++ ): ?>
                    <p><? echo $notification->get_title_html($i); ?> <? echo gmdate("h:ia", $notification->get_updated_time($i)) ?></p>
                <?endfor; ?>
            </div>   
        </div>   
    </div>