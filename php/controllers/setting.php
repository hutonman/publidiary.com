<?php
namespace controller\setting;
use db\UserQuery;

use lib\Auth;
use lib\Msg;
use model\UserModel;

function get() {
  
  require_once SOURCE_BASE . 'views/setting.php';

}


function post() {

  Auth::requireLogin();

  $user = UserModel::getSession();

  $nickname = get_param('nickname', null);

  try {
    
    $is_success = UserQuery::changeNickname($user, $nickname);

  } catch (Throwable $e) {

    Msg::push(Msg::DEBUG, $e->getMessage());
    $is_success = false;

  }

  if($is_success) {

    Msg::push(Msg::INFO, 'Successed change nickname. Please login again.');
    redirect('logout');

  } else {

    Msg::push(Msg::ERROR, 'Failed change nickname.');
    redirect(GO_REFERER);

  }
  
}

?>