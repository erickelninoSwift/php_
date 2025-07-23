<?php 


class User {

    public $user_email = "Erickelnino";
    public static $user_count = 0;
    protected static $email = "erick@yahoo.com";


    public function __construct() {

    }

    public function email_user() {
        return self::$email;
    }
}

$current_user = new User();
echo "User count: " . User::$user_count . "<br>";
echo "User email : " . $current_user->email_user();