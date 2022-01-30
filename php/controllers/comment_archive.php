<?php
namespace controller\comment_archive;

use lib\Auth;
use lib\Msg;
use model\UserModel;
use db\DiaryQuery;
use model\DiaryModel;

function get() {

  Auth::requireLogin();

  $user = UserModel::getSession();

  $diary_ids = DiaryQuery::commentedList($user);

  foreach($diary_ids as $diary_id) {
    $id = $diary_id['diary_id'];
    $diary = DiaryQuery::fetchByDiaryId($id);
    $url = get_url('detail?diary_id=' . $diary->id);

    ?>
    <ul class="list-group" style="list-style: none;">
    <?php
    \partials\diary_list_item($diary, $url, $user);
    ?>
    </ul>
    <?php
  }

  
}

?>