<?php
class fb {
      
    private $id;
    private $name;
    private $first_name;
    private $last_name;
    private $link;
    private $username;
    private $birthday;
    private $hometown = array();
    private $location = array();
    private $bio;
    private $work = array();
    private $education = array();
    private $gender;
    private $interested_in = array();
    private $email;
    private $timezone;
    private $locale;
    private $verified;
    private $updated_time;
    
    function __construct($data){
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->link = $data['link'];
        $this->username = $data['username'];
        $this->birthday = $data['birthday'];
        $this->hometown = $data['hometown'];
        $this->location = $data['location'];
        $this->bio = $data['bio'];
        $this->work = $data['work'];
        $this->education = $data['education'];
        $this->gender = $data['gender'];
        $this->interested_in = $data['interested_in'];
        $this->email = $data['email'];
        $this->timezone = $data['timezone'];
        $this->locale = $data['locale'];
        $this->verified = $data['verified'];
        $this->updated_time = $data['updated_time'];
    }
    public function get_api_data($url) {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
        $data = curl_exec($ch);
        curl_close($ch);
		$data = json_decode($data);

		if (!$data) {
			throw new Exception('get_api_data: No data found. ');
		}
        return $data;
    }   
    public function get_id(){     
        return $this->id;
    }
    
    public function get_name(){     
        return $this->name;
    }
    
    public function get_work(){
        return array( $this->work[0]['position']['name'], $this->work[0]['employer']['name'] );
    }
    
    public function get_education(){
        $num = count($this->education);
        return $this->education[$num - 1]['school']['name'];
    }
    
    public function get_location(){
        return $this->location['name'];
    }
    
    public function get_hometown(){
        return $this->hometown['name'];
    }
    
    public function get_cover_photo(){
        $data = $data = $this->get_api_data('https://graph.facebook.com/'. $this->username .'?fields=cover');
        return $data->cover->source;
    }
    public function get_avatar($height, $width){
        return 'https://graph.facebook.com/'. $this->username .'/picture/?width='. $height .'&height='. $width;
    }
};
?>