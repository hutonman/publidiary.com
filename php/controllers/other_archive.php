<?php
namespace controller\other_archive;
use db\UserQuery;
use db\DiaryQuery;

use lib\Auth;
use lib\Msg;
use model\UserModel;

function get() {
  
  Auth::requireLogin();

  $user_id = get_param('user_id', null, false);

  $diaries = DiaryQuery::fetchByOtherUserId($user_id);

  $nickname = DiaryQuery::getNickname($diaries[0]);
  
  echo "<h2>{$nickname}さんの日記</h2>";
  \view\my_archive\index($diaries, $user_id);

}


function post() {
  
}

?>