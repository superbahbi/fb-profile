<!-- notification model -->

<?php
    class notification {
        private $fql_query_obj;
        private $notification_id = array();
        private $sender_id = array();
        private $title_html  = array();
        private $created_time  = array();
        private $updated_time = array();
        private $href  = array();
        public $count;
        
        public function __construct($access_token){
            $fql_query_url = 'https://graph.facebook.com/'
            . 'fql?q=SELECT+notification_id,sender_id,title_html,body_html,created_time,updated_time,href+FROM+notification+WHERE+recipient_id=me()'
            . '&access_token=' . $access_token;
            $fql_query_result = file_get_contents($fql_query_url);
            $this->fql_query_obj = json_decode($fql_query_result, true);
            
            foreach($this->fql_query_obj['data'] as $data){
                array_push($this->notification_id, $data['notification_id']);
                array_push($this->sender_id, $data['sender_id']);
                array_push($this->title_html, $data['title_html']);
                array_push($this->created_time, $data['created_time']);
                array_push($this->updated_time, $data['updated_time']);
                array_push($this->href, $data['href']);
                $this->count++;
            }
        }
        public function get_notification(){
            return $this->fql_query_obj;
        }
        public function get_notification_id($num){
            if($num == -1) {
                return $this->notification_id;
            } else {
                return $this->notification_id[$num]; 
            }
        }
        public function get_title_html($num){
            if($num == -1) {
                return $this->title_html;
            } else {
                return $this->title_html[$num]; 
            }
        }
        public function get_updated_time($num){
            if($num == -1) {
                return $this->updated_time;
            } else {
                return $this->updated_time[$num]; 
            }
        }
    };
?>