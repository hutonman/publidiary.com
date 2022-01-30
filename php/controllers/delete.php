<?php
namespace controller\delete;

use db\DiaryQuery;
use db\UserQuery;

use lib\Auth;
use lib\Msg;
use model\DiaryModel;
use model\UserModel;
use Throwable;

function get() {
  Auth::requireLogin();

  $diary = new DiaryModel;
  $diary->id = get_param('diary_id', null, false);

  $result = DiaryQuery::delete($diary);
  
  if($result) {
    Msg::push(Msg::INFO, 'Successed delete diary.');
    redirect('my_archive');
  }


}


function post() {
  
}

?>