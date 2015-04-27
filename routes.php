<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
      case 'posts':
        require_once('models/post.php');
        $controller = new PostsController();
      break;
        case 'registration' :
            require_once('models/registration.php');
            $controller = new RegistrationController();
    }

    $controller->{ $action }();
  }

  $controllers = array('pages' => ['home', 'error'],
                       'posts' => ['index', 'show', 'remove', 'append_show', 'append', 'refresh_show', 'refresh'],
                        'registration' => ['login', 'login_show', 'create', 'create_show']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>