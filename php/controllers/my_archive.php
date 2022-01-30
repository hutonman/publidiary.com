<?php
namespace controller\my_archive;

use lib\Auth;
use lib\Msg;
use model\UserModel;
use db\DiaryQuery;

function get() {

  Auth::requireLogin();

  $user = UserModel::getSession();

  $diaries = DiaryQuery::fetchByUserId($user);

  if($diaries === false) {
    Msg::push(Msg::ERROR, 'Please Login.');
    redirect('diary_login');
  }

  if(count($diaries) > 0) {
    \view\my_archive\index($diaries, $user);
  } else {
    echo '<div class="alert alert-primary" style="z-index: -1;">Let\'s create diary.</div><div class="d-flex justify-content-end">
    <a href="';
    the_url("create");
    echo '"><div class="btn btn-primary mt-4">日記作成</div></a>
  </div>';
  }

  
}

?>