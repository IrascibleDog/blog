<?php
    class Registration{
        public $id;
        public $login;
        public $password;
        public $e_mail;

        public function __construct($id, $login, $password, $e_mail) {
            $this->id      = $id;
            $this->login  = $login;
            $this->password = $password;
            $this->e_mail = $e_mail;
        }


    }