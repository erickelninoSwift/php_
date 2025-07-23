<?php 
// class User {
    

//     // public
//     public $username;

//     public $email;

//     //private
     

//     // protected


//     public function __construct($name, $email) {
       
//         $this->username = $name;
//         $this->email = $email;
//     }

//     public function setUserName () {
//         echo $this->username;
//     }


//     public function displayUserinfo() {
//         echo " My name is : " . $this->username . " and my email is : " . $this->email . "<br>";
//     }
    
// }


// class AdminUser extends User {

//    public $role;

//    public function __construct($name, $email, $role) {

//     //
//     $this->role = $role;
//     parent::__construct($name,$email);

//    }

//    public function handleNewData() {
//       echo " my new role is : {$this->role}";
//    }

// }


// $user = new User("erick", "erick@yahoo.com");

// $admin = new AdminUser("Jackenson Verdul", "Jackpot@yahoo.com", "Admin");



// $user->displayUserinfo();

// $admin->displayUserinfo();

// $admin->handleNewData();

// echo "my name is : " . $admin->username;


class UserDetails  {

    // public 
    public $username = "Erick";
    //private 
    private $email = "erick@yahoo.com";
    //protected

    protected $password = "#Erickelnino343434";


    public function display_email () {
        echo $this -> email;
    }

    public function display_password () {
        return $this->password;
    }

    
}

class Student extends UserDetails {
   
    public function display_password_student() {
        return $this->password;
    }

    public function display_email() {
        $this->display_email();
    }
    
}


$user_details = new UserDetails();

$student = new Student();


echo 'Play with' .  $user_details->username . "<br>";
echo "From user details : my email address is " . $student->username . "<br>";
// password

echo 'try to display protected variable' . $student->display_password() . "<br>";
echo "My Password : " .$student->display_password_student() . "<br>";

//
//static 