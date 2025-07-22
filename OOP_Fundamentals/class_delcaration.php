<?php 
class User {
    
    public $username;

    public function setUserName () {
        return $this->username = "cholo";
    }
    
}


$curren_user = new User();

echo $curren_user->setUserName();