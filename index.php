<?php
namespace view;
  require_once 'config.php';
  require_once 'wp-blog-header.php';

  //Library
  require_once SOURCE_BASE . 'libs/helper.php';
  require_once SOURCE_BASE . 'libs/auth.php';
  require_once SOURCE_BASE . 'libs/router.php';


  //Model
  require_once SOURCE_BASE . 'models/abstract.model.php';
  require_once SOURCE_BASE . 'models/user.model.php';
  require_once SOURCE_BASE . 'models/diary.model.php';
  require_once SOURCE_BASE . 'models/comment.model.php';

  //Message
  require_once SOURCE_BASE . 'libs/message.php';

  //DB
  require_once SOURCE_BASE . 'db/datasource.php';
  require_once SOURCE_BASE . 'db/user.query.php';
  require_once SOURCE_BASE . 'db/diary.query.php';
  require_once SOURCE_BASE . 'db/comment.query.php';

  //Partials
  require_once SOURCE_BASE . 'partials/header.php';
  require_once SOURCE_BASE . 'partials/footer.php';
  require_once SOURCE_BASE . 'partials/diary_list_item.php';
  require_once SOURCE_BASE . 'partials/comment.php';

  //View
  require_once SOURCE_BASE . 'views/diary_login.php';
  require_once SOURCE_BASE . 'views/register.php';
  require_once SOURCE_BASE . 'views/my_archive.php';
  require_once SOURCE_BASE . 'views/detail.php';
  require_once SOURCE_BASE . 'views/edit.php';
  require_once SOURCE_BASE . 'views/home.php';
  require_once SOURCE_BASE . 'views/privacy.php';
  require_once SOURCE_BASE . 'views/credit.php';
  


  use function lib\route;
  use Throwable;

  session_start();

  try {

    \partials\header();

    $url = parse_url(CURRENT_URI);

    $rpath = str_replace(BASE_CONTEXT_PATH, '', $url['path']);
    $method = strtolower($_SERVER['REQUEST_METHOD']);

    route($rpath, $method);

    \partials\footer();


  } catch(Throwable $e) {
    die('<h1>Something is wrong</h1>');
  }

?>