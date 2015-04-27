<?php
    class Registration{
//        public $id;
//        public $login;
//        public $password;
//        public $email;
//
//        public function __construct($id, $login, $password, $email) {
//            $this->id      = $id;
//            $this->login  = $login;
//            $this->password = $password;
//            $this->email = $email;
//        }
    public $id;
    public $author;
    public $content;
    public $date;

    public function __construct($id, $author, $content, $date) {
        $this->id      = $id;
        $this->author  = $author;
        $this->content = $content;
        $this->date = $date;
    }

        public static function all() {
            $list = [];
            $db = Db::getInstance();
            $req = $db->query('SELECT * FROM posts');

            foreach($req->fetchAll() as $post) {
                $list[] = new Registration($post['id'], $post['author'], $post['content'], $post['date']);
            }

            return $list;
        }

        public static function add($login, $password, $email) {
            $db = Db::getInstance();
            $req = $db->prepare('INSERT INTO users(login, password, email) VALUES (:login, :password, :email)');
            $req->bindParam(':login', $login);
            $req->bindParam(':password', $password);
            $req->bindParam(':email', $email);
            $req->execute();
        }
    }