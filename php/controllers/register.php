<?php
namespace controller\register;

use lib\Auth;
use model\UserModel;
use lib\Msg;

function get() {
  
  \view\register\index();

}

function post() {

  $user = new UserModel;
  $user->id = get_param('id', '');
  $user->pwd = get_param('pwd', '');
  $user->nickname = get_param('nickname', '');

  if(Auth::regist($user)) {
    Msg::push(Msg::INFO, "Welcome {$user->nickname}.");
    redirect(GO_HOME);
  } else {
    redirect(GO_REFERER);
  }
}

?>