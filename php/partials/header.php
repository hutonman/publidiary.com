<?php 
  namespace partials;

  use lib\Msg;
  use lib\Auth;
  use model\UserModel;  

function header() {

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" description="<?php bloginfo('description'); ?>">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	 <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/agenda3.ico">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-169805337-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-169805337-4');
</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6623050044347921"
     crossorigin="anonymous"></script>

    <title><?php echo bloginfo('name'); ?></title>
  </head>
  <body class="bg-light">
    <a href="<?php the_url('create'); ?>" style="position:fixed; bottom: 5%; right: 5%; z-index: 10;"><div style="line-height: 4em; text-align: center; background-color: #007bff; border-radius: 50%; width: 4em; height: 4em;"><img src="<?php echo get_template_directory_uri(); ?>/img/pen-tool.svg" style="" width="30px" alt="pen"></div></a>
    <header class="bg-light d-flex justify-content-between" style="height: 50px;">
      <div class="header-left d-flex">
        <div class="d-inline mx-2" style="line-height: 50px;">
          <img src="<?php echo get_template_directory_uri(); ?>/img/agendas.svg" alt="" width="28px" alt="note">
        </div>
        <a href="<?php echo the_url('/'); ?>" class="text-decoration-none text-dark">
          <h1 class="d-inline fs-2" style="line-height: 50px;">公開日記</h1>
        </a>
      </div>
      <nav style=" z-index: 10;">
        <div class="menu-btn header-right bg-secondary text-light text-center cursor-pointer" style="line-height: 50px;">
          MENU
        </div>
        <div class="hbg-menu bg-secondary">
          <ul>
            <?php if(Auth::isLogin()) : ?>
              <li><a href="<?php the_url('create'); ?>">日記作成</a></li>
              <li><a href="<?php the_url('my_archive'); ?>">マイページ</a></li>
              <li><a href="<?php the_url('comment_archive'); ?>">コメントページ</a></li>
              <li><a href="<?php the_url('setting'); ?>">設定</a></li>
              <li><a href="<?php the_url('logout'); ?>">ログアウト</a></li>
            <?php else: ?>
              <li><a href="<?php the_url('register'); ?>">登録</a></li>
              <li><a href="<?php the_url('diary_login'); ?>">ログイン</a></li>
            <?php endif; ?>
              <li><a href="<?php the_url('contact'); ?>">お問合せ</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="container">
    <?php 
    if(Auth::isLogin()) {
      $user = UserModel::getSession();
      ?>
      <p>
      <?php 
      echo $user->nickname;
    	echo 'さんようこそ';
      if( function_exists( 'aioseo_breadcrumbs' ) ) aioseo_breadcrumbs();
    }
    ?>
    </p>
    
    <?php Msg::flush(); } ?>
