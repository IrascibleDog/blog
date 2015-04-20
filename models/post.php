<?php
  class Post {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
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

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Post($post['id'], $post['author'], $post['content'], $post['date']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new Post($post['id'], $post['author'], $post['content'], $post['date']);
    }

      public static function delete($id)
      {
//      $db = Db::getInstance();
//      // we make sure $id is an integer
//      $id = intval($id);
//      $req2 = $db->prepare('DELETE FROM posts WHERE id = :id');
//      // the query was prepared, now we replace :id with our actual $id value
//      $req2->execute(array('id' => $id));
//      $post = $req2->fetch();
//
//      return new Post($post['id'], $post['author'], $post['content'], $post['date']);

          $list = [];
          $db = Db::getInstance();
          $req = $db->prepare('DELETE FROM posts WHERE id = :id');
          // the query was prepared, now we replace :id with our actual $id value
          $req->execute(array('id' => $id));

          $req = $db->query('SELECT * FROM posts');

          // we create a list of Post objects from the database results
          foreach ($req->fetchAll() as $post) {
              $list[] = new Post($post['id'], $post['author'], $post['content'], $post['date']);
          }

          return $list;
      }
  }
?>