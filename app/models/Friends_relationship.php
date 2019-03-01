<?php 

    class Friends_relationship extends Model {

        public function __construct(){
            parent::__construct();      
        }

        public function sendFriendRequest() {
            $this->user_first_id = 6;
            $this->user_second_id = 7;
            $this->relationship_status = 'pending_second_first';

            var_dump($this->save());
            $result = App::debug($this->save(), true);

            if($result === true) {
                return true;
            } else {
                return false;
            }
        }

        public function getFriendStatus() {            
            // $this->user_first_id = session('userId');
            // $this->user_second_id = $id;

            $sql = "SELECT * FROM `friends_relationship` WHERE `user_first_id` = 6 AND `user_second_id` = 7";
            // var_dump($sql);
            $this->db->query($sql);
            
            return $this->db->single();
        }

        public function acceptFriendRequest() {

        }
    }