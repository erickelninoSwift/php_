<?php 

class User {


    private $username;
    private $email;

    public function __construct($username,$email){
          
        $this->username = $username;
        $this->email = $email;
    }
  
    // getters
    public function getEmail() {
        return $this->email;
    }


    // setters

    public function setEmail($email) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->email = $email;
        }else {
            echo "data invalid";
        }
    }
    
}


$user = new User("jackenson verdul", "jackpot@yahoo.com");

echo 'Your email is. : ' . $user->getEmail();