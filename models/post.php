<?php
  class Post {
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
        $list[] = new Post($post['id'], $post['author'], $post['content'], $post['date']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new Post($post['id'], $post['author'], $post['content'], $post['date']);
    }

      public static function delete($id)
      {
        $list = [];
        $db = Db::getInstance();
        $req = $db->prepare('DELETE FROM posts WHERE id = :id');
        $req->execute(array('id' => $id));

        $req = $db->query('SELECT * FROM posts');

        foreach ($req->fetchAll() as $post) {
          $list[] = new Post($post['id'], $post['author'], $post['content'], $post['date']);
        }

        return $list;
      }

      public static function add($post_author, $post_cont) {
          $list = [];
          $db = Db::getInstance();
          $req = $db->prepare('INSERT INTO posts(author, content) VALUES (:post_author, :post_cont)');
          $req->bindParam(':post_author', $post_author);
          $req->bindParam(':post_cont', $post_cont);
          $req->execute();

          $req = $db->query('SELECT * FROM posts');

          foreach ($req->fetchAll() as $post) {
              $list[] = new Post($post['id'], $post['author'], $post['content'], $post['date']);
          }

          return $list;
      }

      public static function update($id, $post_author, $post_cont) {
          $list = [];
          $db = Db::getInstance();
          $req = $db->prepare('UPDATE posts SET author = :post_author, content = :post_cont WHERE id = :id');
          $req->execute(array('id' => $id, 'post_author' => $post_author, 'post_cont' => $post_cont));

          $req = $db->query('SELECT * FROM posts');

          foreach ($req->fetchAll() as $post) {
              $list[] = new Post($post['id'], $post['author'], $post['content'], $post['date']);
          }

          return $list;
      }
  }
?>