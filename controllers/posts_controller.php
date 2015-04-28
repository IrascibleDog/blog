<?php
  interface PostsInterface{
      public function index();
      public function show();
      public function remove();
      public function append();
  }

  class PostsController implements PostsInterface{
    public function index() {
      $posts = Post::all();
      require_once('views/posts/index.php');
    }

    public function show() {
      if (!isset($_GET['id']))
        return call('pages', 'error');

      $post = Post::find($_GET['id']);
      require_once('views/posts/show.php');
    }

      public function remove() {
      if (!isset($_GET['id']))
        return call('pages', 'error');

      $posts = Post::delete($_GET['id']);
      require_once('views/posts/index_administrator.php');
    }

      public function append_show() {
          require_once('views/posts/append_form.php');
      }

      public function append() {

          $posts = Post::add($_POST['post_author'], $_POST['post_cont']);
          require_once('views/posts/index_administrator.php');
      }

      public function refresh_show() {
          if (!isset($_GET['id']))
              return call('pages', 'error');

          $post = Post::find($_GET['id']);
          require_once('views/posts/refresh_form.php');
      }

      public function refresh() {
          if (!isset($_GET['id']))
              return call('pages', 'error');

          $posts = Post::update($_GET['id'], $_POST['post_author'], $_POST['post_cont']);
          require_once('views/posts/index_administrator.php');
      }
  }
?>