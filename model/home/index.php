<!-- Home Model -->
<!-- Home Model -->
<?php

    //require_once("src/friends.class.php");
    //require_once("src/feeds.class.php");

class photo {
    private $id = array();
    private $picture = array();
    private $source = array();
    private $link = array();
    private $likes = array();
    var $i = 0;
    
    public function __construct($datas){
        foreach($datas['data'] as $data) {
            array_push($this->id, $data['id']);
            array_push($this->picture, $data['picture']);
            array_push($this->source, $data['source']);
            array_push($this->link, $data['link']);
            array_push($this->likes, count($data['likes']['data']));
            if(++$i == 9) break;
        }
    }
    public function get_id($num){
        if($num == -1) {
            return $this->id;
        } else {
            return $this->id[$num]; 
        }
    }
    
    public function get_picture($num){
        if($num == -1) {
            return $this->picture;
        } else {
            return $this->picture[$num]; 
        }
    }
    
    public function get_source($num){
        if($num == -1) {
            return $this->source;
        } else {
            return $this->source[$num]; 
        }
    }
    
    public function get_link($num){
        if($num == -1) {
            return $this->link;
        } else {
            return $this->link[$num]; 
        }
        
    }
    public function get_likes($num){
        if($num == -1) {
            return $this->likes;
        } else {
            return $this->likes[$num]; 
        }
    }
};

?>