<?php
    require_once 'Model/User.php';
    class HomeController{
        public function user() {
            $users = User::all();
        }
    }
?>