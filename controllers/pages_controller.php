<?php
  interface PageInterface{
      public function home();
      public function error();
  }
  class PagesController implements PageInterface{
    public function home() {
      $first_name = 'Jon';
      $last_name  = 'Snow';
      require_once('views/pages/home.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
  }
?>