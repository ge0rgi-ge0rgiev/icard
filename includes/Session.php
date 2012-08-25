<?php


class Session {
    
    private $message;
    
    public function __construct() {
        session_start();
        $this->check_message();
    }
    
    private function check_message() {
        if(isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        }
        else {
            $this->message = '';
        }
    }
    
    public function message($message = '') {
        if($message != '') {
            $_SESSION['message'] = $message;
        }
        else {
            return $this->message;
        }
    }
    
}

$session = new Session();
$message = $session->message();