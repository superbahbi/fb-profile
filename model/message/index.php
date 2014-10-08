<!-- Message Model -->
<?php
    class message {
        private $message_id = array();
        private $from_id = array();
        private $from_name = array();
        private $comments = array();
        private $msg = array();
        public $count = 0;
        
        
        public function __construct($datas, $id){
            $i = 0;
            foreach($datas['data'] as $data){
                array_push($this->message_id, $data['id']);
                foreach($data['to']['data'] as $to_data) {
                    if($to_data['id'] != $id){
                        array_push($this->from_name, $to_data['name']);
                        array_push($this->from_id, $to_data['id']);
                    } 
                }
                array_push($this->comments, $data['comments']['data']);
                array_push($this->msg, $this->comments[$this->count]);
  
                $this->count++;

            }
        }
        public function get_message_id($num){
            if($num == -1) {
                return $this->message_id;
            } else {
                return $this->message_id[$num]; 
            }
        }
        public function get_from_name($num){
            if($num == -1) {
                return $this->from_name;
            } else {
                return $this->from_name[$num]; 
            }
        }
        public function get_from_id($num){
            if($num == -1) {
                return $this->from_id;
            } else {
                return $this->from_id[$num]; 
            }
        }
        public function get_comments(){
            return $this->comments;
        }
        public function get_msg(){
            return $this->msg;
        }
        
    };
    
    class comment {
        private $name = array();
        private $message = array();
        private $temp = array();
        private $id;
        public function __construct($datas, $id){
            $this->id = $id;
            foreach($datas as $data){
                array_push($this->message, $data);

            }
        }
        public function get_message($num){
            $count = 0;
            $this->temp = array();
            if($num == -1) {
                return $this->message;
            } else { 
                foreach($this->message[$num] as $data){
                    array_push($this->temp, $data['message']);
                }
                return $this->temp;    
            }
        }
        public function get_name($num){

            $this->temp = array();
            if($num == -1) {
                return $this->message;
            } else { 
                foreach($this->message[$num] as $data){
                    if($data['id'] != $this->id ){
                        array_push($this->temp, $data['from']['name']);
                    }
                }
                return $this->temp;    
            }
        }
    }
?>