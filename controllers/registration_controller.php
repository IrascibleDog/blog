<?php
    class RegistrationController{
        public function login_show() {
            require_once('views/registration/login_form.php');
        }

        public function create_show() {
            require_once('views/registration/registration_form.php');
        }

        public function login() {

            $posts = Registration::all();
            require_once('views/posts/index_administrator.php');
        }

        public function create() {
            Registration::add($_POST['login'], $_POST['password'], $_POST['email']);

        }
    }