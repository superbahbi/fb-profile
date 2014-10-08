<!-- Message Page -->
 
    <div class="container">
    <div class="row well">
        <div class="span12">
            <h5><? echo ucfirst($page); ?></h5>
             <div class="tabbable tabs-left">
                  <ul class="nav nav-tabs">
                    <? for($i = 0; $i < $message->count - 1; $i++): ?>
                        <li><a href="#tab<? echo $i; ?>" data-toggle="tab"><? echo $message->get_from_name($i); ?></a></li>
                    <? endfor; ?>
                  </ul>
              <div class="tab-content">
                
                <? for($i = 0; $i < $message->count - 1; $i++): ?>
                    <? $k = $comment->get_message($i); ?>
                    <? $l = $comment->get_name($i); ?>
                    <div class="tab-pane" id="tab<? echo $i;  ?>">
                        <? for($j = 0; $j < count($k); $j++): ?>   
                            <p><strong><? echo $l[$j]; ?></strong>: <? echo $k[$j]; ?></p>
                        <? endfor; ?>
                    </div>
                <? endfor; ?>
              </div>
            </div>
        </div>   
    </div>
