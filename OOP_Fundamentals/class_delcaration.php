<?php 
class User {
    
    public $username;

    public $email;


    public function __construct($name, $email) {
       
        $this->username = $name;
        $this->email = $email;
    }

    public function setUserName () {
        echo $this->username;
    }


    public function displayUserinfo() {
        echo " My name is : " . $this->username . " and my email is : " . $this->email . "<br>";
    }
    
}


class AdminUser extends User {

   public $role;

   public function __construct($name, $email, $role) {

    //
    $this->role = $role;
    parent::__construct($name,$email);

   }

   public function handleNewData() {
      echo " my new role is : {$this->role}";
   }

}


$user = new User("erick", "erick@yahoo.com");

$admin = new AdminUser("Jackenson Verdul", "Jackpot@yahoo.com", "Admin");



$user->displayUserinfo();

$admin->displayUserinfo();

$admin->handleNewData();

echo "my name is : " . $admin->username;