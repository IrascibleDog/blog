<?php

    interface RegInterface{
        public function login();
        public function create();
    }

    class RegistrationController implements RegInterface{
        public function login_show() {
            require_once('views/registration/login_form.php');
        }

        public function create_show() {
            require_once('views/registration/registration_form.php');
        }

        public function login() {
            if (Registration::validate($_POST['login'], $_POST['password']))
            {
                $posts = Registration::all();
                require_once('views/posts/index_administrator.php');
            }
            else
            {
                require_once('views/registration/error.php');
            }
        }

        public function create() {
            Registration::add($_POST['login'], $_POST['password'], $_POST['email']);
            require_once('views/registration/confirm.php');
        }
    }