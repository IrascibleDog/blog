<?php
  class PostsController {
    public function index() {
      // we store all the posts in a variable
      $posts = Post::all();
      require_once('views/posts/index.php');
    }

    public function show() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $post = Post::find($_GET['id']);
      require_once('views/posts/show.php');
    }

      public function remove() {
      // we expect a url of form ?controller=posts&action=show&id=x
      // without an id we just redirect to the error page as we need the post id to find it in the database
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right post
      $posts = Post::delete($_GET['id']);
      require_once('views/posts/index.php');
    }

      public function append_show() {
          require_once('views/posts/append_form.php');
      }

      public function append() {

          //check login!!

          $posts = Post::add($_POST['post_author'], $_POST['post_cont']);
          require_once('views/posts/index.php');
      }

      public function refresh() {
          if (!isset($_GET['id']))
              return call('pages', 'error');

          $posts = Post::update($_GET['id'], $_POST['post_author'], $_POST['post_cont']);
          require_once('views/posts/index.php');
      }
  }
?>